<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'product'])
            ->latest()
            ->get();

        return view('admin.review.index', compact('reviews'));
    }

    public function approve($id)
    {
        $review = Review::findOrFail($id);

        $review->update([
            'status' => 'Approved',
        ]);

        return redirect()->route('admin.review.index');
    }

    public function reject($id)
    {
        $review = Review::findOrFail($id);

        $review->update([
            'status' => 'Rejected',
        ]);

        return redirect()->route('admin.review.index');
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect()->route('admin.review.index');
    }
}
