@extends('layout.home')

@section('content')

    <div class="section">
        <div class="container">

            <h2 class="mb-4">My Orders</h2>

            <table class="table table-bordered">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
                </thead>

                <tbody>

                @forelse($orders as $order)

                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            No Orders Found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>
    </div>

@endsection
