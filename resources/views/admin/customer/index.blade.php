@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-4">Users / Customers</h1>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Customer List</h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Orders Count</th>
                        <th>Total Spent</th>
                        <th>VIP Status</th>
                        <th>Created At</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($customers as $customer)

                        @php
                            $ordersCount = $customer->orders->count();

                            $totalSpent = 0;

                            foreach ($customer->orders as $order) {
                                foreach ($order->items as $item) {
                                    $totalSpent += $item->price * $item->quantity;
                                }
                            }
                        @endphp

                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->role }}</td>
                            <td>{{ $ordersCount }}</td>
                            <td>${{ $totalSpent }}</td>

                            <td>
                                @if($ordersCount >= 5 || $totalSpent >= 5000)
                                    <span class="badge text-bg-warning">
                                        VIP Customer
                                    </span>
                                @else
                                    <span class="badge text-bg-secondary">
                                        Normal
                                    </span>
                                @endif
                            </td>

                            <td>{{ $customer->created_at }}</td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>
        </div>

    </div>

@endsection
