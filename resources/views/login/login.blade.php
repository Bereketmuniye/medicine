<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Medicine App</title>
    <!-- Bootstrap 5 for layout utilities -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/login_custom.css') }}">
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Please enter your details to sign in.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success" style="border-left: 4px solid #2ecc71; background: #f0fff4; color: #27ae60; border-radius: 12px; font-size: 0.9rem; font-weight: 500; padding: 1rem 1.25rem; margin-bottom: 2rem; border: none;">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control w-100 @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control w-100 @error('password') is-invalid @enderror" placeholder="Enter your password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember"> Keep me signed in
                </label>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-login">Sign In</button>
        </form>

        <div class="social-login">
            <div class="social-divider">
                <span>Or continue with</span>
            </div>
            <div class="social-buttons">
                <a href="#" class="social-btn"><i class="fab fa-apple"></i></a>
                <a href="#" class="social-btn"><i class="fab fa-google"></i></a>
                <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>

        <div class="signup-footer">
            Don't have an account? <a href="{{ route('register') }}">Create an account</a>
        </div>
    </div>

</body>
</html>