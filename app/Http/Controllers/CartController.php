<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::findOrFail($id);

        if ($product->quantity <= 0) {
            return redirect()->route('home');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            if ($cart[$id]['quantity'] < $product->quantity) {
                $cart[$id]['quantity']++;
            }

        } else {
            $cart[$id] = [
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $cart = session()->get('cart', []);

        return view('front.cart', compact('cart'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $product = Product::find($id);

            if ($product && $cart[$id]['quantity'] < $product->quantity) {
                $cart[$id]['quantity']++;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        return view('front.checkout', compact('cart'));
    }

    public function checkoutStore(Request $request)
    {
        $cart = session()->get('cart', []);

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if (count($cart) == 0) {
            return redirect()->route('cart.index');
        }

        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if (!$product || $product->quantity < $item['quantity']) {
                return redirect()->route('cart.index');
            }
        }

        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'Pending',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            $product = Product::find($item['id']);

            if ($product) {
                $product->quantity = $product->quantity - $item['quantity'];

                if ($product->quantity < 0) {
                    $product->quantity = 0;
                }

                $product->save();
            }
        }

        session()->forget('cart');

        return redirect()->route('home')
            ->with('success', 'Your order has been placed successfully.');
    }
}
