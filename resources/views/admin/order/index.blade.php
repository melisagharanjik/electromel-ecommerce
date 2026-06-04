@extends('adminlte.master')

@section('title', 'Orders')

@section('content')

    <div class="card">

        <div class="card-header">

            <h3>Orders</h3>

            <br>

            <a href="{{ route('admin.order.index') }}"
               class="btn btn-secondary btn-sm">
                All Orders
            </a>

            <a href="{{ route('admin.order.index', ['status' => 'Pending']) }}"
               class="btn btn-warning btn-sm">
                Pending
            </a>

            <a href="{{ route('admin.order.index', ['status' => 'Approved']) }}"
               class="btn btn-primary btn-sm">
                Approved
            </a>

            <a href="{{ route('admin.order.index', ['status' => 'Completed']) }}"
               class="btn btn-success btn-sm">
                Completed
            </a>

            <a href="{{ route('admin.order.index', ['status' => 'Cancelled']) }}"
               class="btn btn-danger btn-sm">
                Cancelled
            </a>

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
