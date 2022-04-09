<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('products.index') }}">Mini Shop</a>

        <div class="d-flex gap-2">
            <a href="{{ route('products.index') }}" class="btn btn-outline-light btn-sm">Products</a>
            <a href="{{ route('cart.index') }}" class="btn btn-success btn-sm">Cart</a>
        </div>
    </div>
</nav>

<div class="container pb-5">
    <div class="hero-section">
        <h1 class="hero-title">Mini E-Commerce Store</h1>
        <p class="hero-text">
            A Laravel 9 storefront for managing products and cart operations.
        </p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
