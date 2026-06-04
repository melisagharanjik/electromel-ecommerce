<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        $items = OrderItem::where('order_id', $id)->get();

        return view('admin.order.show', compact('order', 'items'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.order.show', $id);
    }
    public function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('front.my-orders', compact('orders'));
    }
}
