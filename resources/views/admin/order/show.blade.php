@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-4">Order Details</h1>

        <div class="card mb-4">
            <div class="card-header">
                <h3>Customer Info</h3>
            </div>

            <div class="card-body">
                <p><strong>Name:</strong> {{ $order->name }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Address:</strong> {{ $order->address }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
            </div>
        </div>

        @php
            $total = 0;
        @endphp

        <div class="card mb-4">
            <div class="card-header">
                <h3>Order Items</h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($items as $item)

                        @php
                            $subtotal = $item->price * $item->quantity;
                            $total += $subtotal;
                            $product = \App\Models\Product::find($item->product_id);
                        @endphp

                        <tr>
                            <td width="120">
                                @if($product && $product->image)
                                    <img src="{{ asset('uploads/'.$product->image) }}" width="80">
                                @else
                                    No Image
                                @endif
                            </td>

                            <td>
                                @if($product)
                                    {{ $product->title }}
                                @else
                                    Product deleted
                                @endif
                            </td>

                            <td>${{ $item->price }}</td>

                            <td>{{ $item->quantity }}</td>

                            <td>${{ $subtotal }}</td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>

                <div class="text-end">
                    <h3>Total: ${{ $total }}</h3>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Update Status</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.order.status', $order->id) }}" method="post">

                    @csrf

                    <select name="status" class="form-control mb-3">
                        <option value="Pending" @if($order->status == 'Pending') selected @endif>Pending</option>
                        <option value="Approved" @if($order->status == 'Approved') selected @endif>Approved</option>
                        <option value="Shipped" @if($order->status == 'Shipped') selected @endif>Shipped</option>
                        <option value="Completed" @if($order->status == 'Completed') selected @endif>Completed</option>
                        <option value="Cancelled" @if($order->status == 'Cancelled') selected @endif>Cancelled</option>
                    </select>

                    <button type="submit" class="btn btn-success">
                        Update Status
                    </button>

                    <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">
                        Back
                    </a>

                </form>

            </div>
        </div>

    </div>

@endsection
