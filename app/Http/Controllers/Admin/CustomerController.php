<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'customer')
            ->with('orders.items')
            ->get();

        return view('admin.customer.index', compact('customers'));
    }
}
