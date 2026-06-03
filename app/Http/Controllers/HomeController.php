<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('keywords', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category_id') && $request->category_id != 0) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(6)->appends($request->query());

        $categories = Category::all();

        return view('front.home', compact('products', 'categories'));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);

        return view('front.product_detail', compact('product'));
    }
}
