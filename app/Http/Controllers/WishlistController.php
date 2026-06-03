<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session()->get('wishlist', []);

        return view('front.wishlist', compact('wishlist'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$id])) {
            unset($wishlist[$id]);
        } else {
            $wishlist[$id] = [
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }

        session()->put('wishlist', $wishlist);

        return redirect()->back();
    }

    public function remove($id)
    {
        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$id])) {
            unset($wishlist[$id]);
        }

        session()->put('wishlist', $wishlist);

        return redirect()->route('wishlist.index');
    }
}
