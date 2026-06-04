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
                    <th>Action</th>
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
                        <td>
                            @if($order->status == 'Pending')
                                <a href="{{ route('my.orders.cancel', $order->id) }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to cancel this order?')">
                                    Cancel
                                </a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No Orders Found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>
    </div>

@endsection
