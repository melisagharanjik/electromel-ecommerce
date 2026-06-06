<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::latest()->paginate(10);

        return view('admin.product.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        Product::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imageName,
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

        $imageName = $product->image;

        if ($request->hasFile('image')) {

            if ($product->image && File::exists(public_path('uploads/' . $product->image))) {
                File::delete(public_path('uploads/' . $product->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        $product->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.product.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && File::exists(public_path('uploads/' . $product->image))) {
            File::delete(public_path('uploads/' . $product->image));
        }

        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
