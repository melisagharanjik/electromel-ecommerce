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

    <table class="table table-bordered">

        <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        </thead>

        <tbody>

        @foreach($cart as $item)

            <tr>

                <td width="120">

                    @if($item['image'])
                        <img src="{{ asset('uploads/'.$item['image']) }}"
                             width="100">
                    @endif

                </td>

                <td>{{ $item['title'] }}</td>

                <td>${{ $item['price'] }}</td>

                <td>{{ $item['quantity'] }}</td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>
