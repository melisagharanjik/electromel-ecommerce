<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

<div class="container mt-5">

    <h1 class="mb-4">Checkout</h1>

    <a href="{{ route('cart.index') }}" class="btn btn-secondary mb-3">
        Back to Cart
    </a>

    <form action="{{ route('checkout.store') }}" method="post">

        @csrf

        <div class="mb-3">
            <label class="form-label">Customer Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Place Order
        </button>

    </form>

</div>

</body>
</html>
