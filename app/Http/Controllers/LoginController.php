<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        $throttleKey = strtolower($request->input('email')) . '|' . $request->ip();
        
        // Manual rate limiting using cache
        $attempts = Cache::store('database')->get($throttleKey, 0);
        $lockoutKey = $throttleKey . ':lockout';
        
        // Check if currently locked out
        if (Cache::store('database')->get($lockoutKey)) {
            $seconds = Cache::store('database')->get($lockoutKey) - time();
            return back()
                ->withErrors(['email' => "Too many login attempts. Please try again in {$seconds} seconds."])
                ->withInput($request->except('password'));
        }
        
        // Check if too many attempts
        if ($attempts >= 5) {
            // Lock out for 1 minute (60 seconds)
            Cache::store('database')->put($lockoutKey, time() + 60, 60);
            return back()
                ->withErrors(['email' => "Too many login attempts. Please try again in 60 seconds."])
                ->withInput($request->except('password'));
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Clear rate limiting on successful login
            Cache::store('database')->forget($throttleKey);
            Cache::store('database')->forget($lockoutKey);
            $request->session()->regenerate();
            
            return redirect()->intended('/admin/dashboard')
                ->with('success', 'Welcome back! You have successfully logged in.');
        }

        // Increment failed attempts
        Cache::store('database')->put($throttleKey, $attempts + 1, 60);

        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput($request->except('password'));
    }

    /**
     * Handle a logout request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')
            ->with('success', 'You have been logged out successfully.');
    }

    /**
     * Show the forgot password form.
     *
     * @return \Illuminate\View\View
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle the forgot password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendPasswordResetLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors(['email' => 'We cannot find a user with that email address.'])
                ->withInput();
        }

        // Generate password reset token
        $token = Str::random(60);
        
        // Delete any existing tokens for this email
        DB::table('password_resets')->where('email', $request->email)->delete();
        
        // Insert new token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // For now, we'll just show success (in production, you'd send an email)
        return back()
            ->with('success', 'Password reset link has been sent to your email.');
    }

    /**
     * Show the password reset form.
     *
     * @param  string  $token
     * @return \Illuminate\View\View
     */
    public function showResetForm($token = null)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Handle the password reset request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Find the password reset record
        $reset = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$reset) {
            return back()
                ->withErrors(['email' => 'Invalid password reset token.'])
                ->withInput();
        }

        // Check if token is not expired (24 hours)
        if (now()->diffInHours($reset->created_at) > 24) {
            DB::table('password_resets')->where('email', $request->email)->delete();
            return back()
                ->withErrors(['email' => 'Password reset token has expired.'])
                ->withInput();
        }

        // Reset the password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the password reset record
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')
            ->with('success', 'Your password has been reset successfully!');
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                \Illuminate\Validation\Rules\Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed'
            ],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Note: Assuming a User model exists and is properly set up
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended('/admin/dashboard')
            ->with('success', 'Registration successful! Welcome to the app.');
    }
}
