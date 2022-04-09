@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="content-card">
            <div class="section-header">
                <h2 class="section-title">Edit Product</h2>
                <p class="section-subtitle">Update the selected product information.</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $product->name) }}"
                    >
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input
                        type="text"
                        id="price"
                        name="price"
                        class="form-control"
                        value="{{ old('price', $product->price) }}"
                    >
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        rows="4"
                    >{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Image URL</label>
                    <input
                        type="text"
                        id="image"
                        name="image"
                        class="form-control"
                        value="{{ old('image', $product->image) }}"
                    >
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-warning">Update Product</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
