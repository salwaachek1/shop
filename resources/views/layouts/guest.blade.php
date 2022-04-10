<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mini Shop') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="auth-page">
    <div class="min-vh-100 d-flex align-items-center justify-content-center auth-wrapper">
        <div class="auth-card">
            <div class="text-center mb-4">
                <a href="{{ route('products.index') }}" class="auth-brand text-decoration-none">
                    Mini Shop
                </a>
                <p class="text-muted mb-0 mt-2">Sign in to manage products and your cart.</p>
            </div>

            {{ $slot }}
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
