<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()
            ->with('success', 'Product added to cart successfully.');
    }

    public function remove($id)
    {
        $cartItem = Cart::where('user_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->delete();

        return redirect()->back()
            ->with('success', 'Item removed from cart.');
    }
}
