<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();

        return view('admin.product.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Product::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.product.index');
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);

        $categories = Category::all();

        return view('admin.product.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.product.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
