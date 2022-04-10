<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Details
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="content-card">
            <div class="row g-4 align-items-start">
                <div class="col-md-5">
                    @if($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded">
                    @else
                        <div class="product-image-placeholder rounded">
                            No Image Available
                        </div>
                    @endif
                </div>

                <div class="col-md-7">
                    <h2 class="section-title">{{ $product->name }}</h2>

                    <p class="text-muted">
                        {{ $product->description ?: 'No description available for this product.' }}
                    </p>

                    <p class="product-price">${{ number_format($product->price, 2) }}</p>

                   <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            Back
                        </a>

                        @auth
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                                    Edit
                                </a>
                            @else
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        Add to Cart
                                    </button>
                                </form>
                            @endif
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                Login to buy
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
