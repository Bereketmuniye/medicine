<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Too Many Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-danger mb-3">Too Many Requests</h3>
                        <p class="mb-3">{{ $message ?? 'You have made too many requests. Please try again later.' }}</p>
                        @if(isset($retryAfter))
                            <p class="text-muted">Please wait {{ $retryAfter }} seconds before trying again.</p>
                        @endif
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
