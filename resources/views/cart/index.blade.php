<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Shopping Cart
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="section-header mb-4">
            <h2 class="section-title">Shopping Cart</h2>
            <p class="section-subtitle">Review selected products and total cost.</p>
        </div>

        <div class="table-wrapper">
            @if($cartItems->count())
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $grandTotal = 0; @endphp

                            @foreach($cartItems as $item)
                                @php
                                    $total = $item->product->price * $item->quantity;
                                    $grandTotal += $total;
                                @endphp
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>${{ number_format($item->product->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($total, 2) }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                        Continue Shopping
                    </a>
                    <div class="cart-total">
                        Grand Total: ${{ number_format($grandTotal, 2) }}
                    </div>
                </div>
            @else
                <div class="empty-state">
                    Your cart is empty.
                </div>

                <div class="mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        Browse Products
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
