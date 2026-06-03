<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

<div class="container mt-5">

    <h1 class="mb-4">Wishlist</h1>

    <a href="{{ route('home') }}" class="btn btn-primary mb-3">
        Continue Shopping
    </a>

    <table class="table table-bordered">

        <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>

        @foreach($wishlist as $item)

            <tr>

                <td width="120">
                    @if($item['image'])
                        <img src="{{ asset('uploads/'.$item['image']) }}" width="100">
                    @endif
                </td>

                <td>{{ $item['title'] }}</td>

                <td>${{ $item['price'] }}</td>

                <td>
                    <a href="{{ route('wishlist.remove', $item['id']) }}"
                       class="btn btn-danger btn-sm">
                        Remove
                    </a>
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>
