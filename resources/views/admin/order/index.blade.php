@extends('adminlte.master')

@section('title', 'Orders')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Orders</h3>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($orders as $order)

                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->status }}</td>

                        <td>
                            <a href="{{ route('admin.order.show', $order->id) }}"
                               class="btn btn-info btn-sm">
                                Details
                            </a>
                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>
    </div>

@endsection
