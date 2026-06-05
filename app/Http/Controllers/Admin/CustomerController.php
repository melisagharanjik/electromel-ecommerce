<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::with('orders.items')->get();

        return view('admin.customer.index', compact('users'));
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'role' => 'admin',
        ]);

        return redirect()->route('admin.customer.index');
    }

    public function makeCustomer($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'role' => 'customer',
        ]);

        return redirect()->route('admin.customer.index');
    }
}
