<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Medicine App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login_custom.css') }}">
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <h1>Forgot Password?</h1>
            <p>No worries, we'll send you reset instructions.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success" style="border-left: 4px solid #2ecc71; background: #f0fff4; color: #27ae60; border-radius: 12px; font-size: 0.9rem; font-weight: 500; padding: 1rem 1.25rem; margin-bottom: 2rem; border: none;">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control w-100 @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">Send Reset Instructions</button>
        </form>

        <div class="signup-footer">
            Remember your password? <a href="{{ route('login') }}">Back to login</a>
        </div>
    </div>
</body>
</html>
