<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('front.home', compact('products'));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);

        return view('front.product_detail', compact('product'));
    }
}
