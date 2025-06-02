<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart
    public function index()
    {
        $cart = session()->get('cart', []);
        // dd($cart); // Dump the cart data to check its structure
        return view('customer.cart.index', compact('cart'));
    }

    // Add product to cart
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += (int) ($request->quantity ?? 1); // Cast to integer
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float) $product->price, // Cast to float
                'quantity' => (int) ($request->quantity ?? 1), // Cast to integer
            ];
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Update cart item quantity
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $quantities = $request->quantity; // Array: [product_id => quantity]

        foreach ($quantities as $productId => $quantity) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = is_array($quantity) ? 1 : (int) $quantity; // Ensure quantity is an integer
            }
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    // Remove item from cart
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}
