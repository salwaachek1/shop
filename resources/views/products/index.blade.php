@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center section-header">
    <div>
        <h2 class="section-title">Products</h2>
        <p class="section-subtitle">Browse and manage the available store inventory.</p>
    </div>

    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
</div>

<div class="row g-4">
    @forelse($products as $product)
        <div class="col-md-6 col-lg-4">
            <div class="product-card">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                @else
                    <div class="product-image-placeholder">
                        No Image Available
                    </div>
                @endif

                <div class="p-3 d-flex flex-column h-100">
                    <h3 class="product-title">{{ $product->name }}</h3>

                    <p class="product-description">
                        {{ \Illuminate\Support\Str::limit($product->description, 100) }}
                    </p>

                    <p class="product-price mb-3">${{ number_format($product->price, 2) }}</p>

                    <div class="mt-auto d-flex flex-wrap gap-2">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="empty-state">
                No products available yet. Start by adding your first product.
            </div>
        </div>
    @endforelse
</div>
@endsection
