<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Product
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="content-card">
                    <div class="section-header mb-4">
                        <h2 class="section-title">Add Product</h2>
                        <p class="section-subtitle">Create a new product for your storefront.</p>
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

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="Enter product name"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input
                                type="text"
                                id="price"
                                name="price"
                                class="form-control"
                                value="{{ old('price') }}"
                                placeholder="Enter product price"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea
                                id="description"
                                name="description"
                                class="form-control"
                                rows="4"
                                placeholder="Write a short product description"
                            >{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label">Image URL</label>
                            <input
                                type="text"
                                id="image"
                                name="image"
                                class="form-control"
                                value="{{ old('image') }}"
                                placeholder="Paste image URL"
                            >
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
