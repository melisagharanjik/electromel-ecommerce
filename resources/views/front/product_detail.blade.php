<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->title }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

<div class="container mt-5">

    <a href="{{ route('home') }}" class="btn btn-secondary mb-4">
        Back to Home
    </a>

    <div class="row">

        <div class="col-md-6">

            @if($product->image)
                <img src="{{ asset('uploads/'.$product->image) }}"
                     class="img-fluid">
            @else
                <img src="{{ asset('img/product01.png') }}"
                     class="img-fluid">
            @endif

        </div>

        <div class="col-md-6">

            <h1>{{ $product->title }}</h1>

            <h3 class="text-success">
                ${{ $product->price }}
            </h3>

            <p>
                <strong>Category:</strong>
                {{ $product->category->title }}
            </p>

            <p>
                <strong>Quantity:</strong>
                {{ $product->quantity }}
            </p>

            <p>
                <strong>Description:</strong>
            </p>

            <p>
                {{ $product->description }}
            </p>

            @if($product->quantity > 0)

                <a href="{{ route('cart.add', $product->id) }}"
                   class="btn btn-success">
                    Add To Cart
                </a>

            @else

                <button class="btn btn-danger" disabled>
                    Out Of Stock
                </button>

            @endif

        </div>

    </div>

</div>

</body>
</html>
