<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function index()
    {
        $cartItems = Cart::with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        }

        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Product removed from cart.');
    }
}
