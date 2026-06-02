<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">


</head>
<body>

<div class="container mt-5">


    <h1 class="mb-4">Shopping Cart</h1>

    <a href="{{ route('home') }}" class="btn btn-primary mb-3">
        Continue Shopping
    </a>

    @php
        $total = 0;
    @endphp

    <table class="table table-bordered">

        <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>

        @foreach($cart as $item)

            @php
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            @endphp

            <tr>

                <td width="120">
                    @if($item['image'])
                        <img src="{{ asset('uploads/'.$item['image']) }}" width="100">
                    @endif
                </td>

                <td>{{ $item['title'] }}</td>

                <td>${{ $item['price'] }}</td>

                <td>

                    <a href="{{ route('cart.decrease', $item['id']) }}"
                       class="btn btn-warning btn-sm">
                        -
                    </a>

                    <strong class="mx-2">
                        {{ $item['quantity'] }}
                    </strong>

                    <a href="{{ route('cart.increase', $item['id']) }}"
                       class="btn btn-success btn-sm">
                        +
                    </a>

                </td>

                <td>${{ $subtotal }}</td>

                <td>
                    <a href="{{ route('cart.remove', $item['id']) }}"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Remove this product?')">
                        Remove
                    </a>
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    <div class="text-end">
        <h3>Total: ${{ $total }}</h3>
    </div>

    <div class="text-end mt-3">
        <a href="{{ route('checkout.index') }}" class="btn btn-success">
            Checkout
        </a>
    </div>

</div>

</body>
</html>
