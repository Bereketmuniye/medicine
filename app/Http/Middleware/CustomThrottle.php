<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CustomThrottle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $maxAttempts, string $decayMinutes): Response
    {
        $key = $this->resolveRequestSignature($request);
        
        if ($this->hasTooManyAttempts($key, $maxAttempts, $decayMinutes)) {
            return $this->buildResponse($key, $maxAttempts, $decayMinutes);
        }
        
        $this->hit($key, $decayMinutes);
        
        $response = $next($request);
        
        $response->headers->set('X-RateLimit-Limit', $maxAttempts);
        $response->headers->set('X-RateLimit-Remaining', max(0, $maxAttempts - $this->attempts($key)));
        
        return $response;
    }
    
    /**
     * Resolve request signature.
     */
    protected function resolveRequestSignature(Request $request): string
    {
        return sha1(
            $request->method() . '|' . $request->server('SERVER_NAME') . '|' . $request->ip() . '|' . $request->path()
        );
    }
    
    /**
     * Determine if the given key has been accessed too many times.
     */
    protected function hasTooManyAttempts(string $key, string $maxAttempts, string $decayMinutes): bool
    {
        if (Cache::store('database')->get($key . ':lockout')) {
            return true;
        }
        
        return $this->attempts($key) >= $maxAttempts;
    }
    
    /**
     * Increment the counter for a given key.
     */
    protected function hit(string $key, string $decayMinutes): void
    {
        Cache::store('database')->add($key, 0, $decayMinutes * 60);
        Cache::store('database')->increment($key);
    }
    
    /**
     * Get the number of attempts for the given key.
     */
    protected function attempts(string $key): int
    {
        return Cache::store('database')->get($key, 0);
    }
    
    /**
     * Create a 'too many attempts' response.
     */
    protected function buildResponse(string $key, string $maxAttempts, string $decayMinutes): Response
    {
        $seconds = Cache::store('database')->get($key . ':lockout', 0);
        
        return response()->view('errors.429', [
            'message' => 'Too many attempts. Please try again in ' . $seconds . ' seconds.',
            'retryAfter' => $seconds
        ], 429);
    }
}
