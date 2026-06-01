<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();

        return view('admin.category.index', compact('data'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'title' => $request->title,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.category.index');
    }
}
