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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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

    <hr class="mt-5">

    <h3>Write a Review</h3>

    @auth

        <form action="{{ route('review.store', $product->id) }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Rating (1-5)</label>

                <select name="rating" class="form-control">
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Comment</label>

                <textarea name="comment"
                          class="form-control"
                          rows="4"
                          required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Submit Review
            </button>

        </form>

    @else

        <div class="alert alert-info">
            Please login to submit a review.
        </div>

    @endauth

    <hr class="mt-5">

    <h3>Customer Reviews</h3>

    @php
        $approvedReviews = \App\Models\Review::where('product_id', $product->id)
            ->where('status', 'Approved')
            ->latest()
            ->get();
    @endphp

    @php
        $colors = [
            '#FFE5EC',
            '#FFF1D6',
            '#E8F8E1',
            '#E3F2FD',
            '#F3E8FF',
            '#FFFACD',
        ];
    @endphp

    @forelse($approvedReviews as $index => $review)

        <div class="card mb-3 border-0 shadow-sm"
             style="background: {{ $colors[$index % count($colors)] }}; border-radius: 15px;">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">
                        {{ $review->user->name ?? 'Customer' }}
                    </h5>

                    <div>
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->rating)
                                <span style="color: #f5b301; font-size: 18px;">★</span>
                            @else
                                <span style="color: #ccc; font-size: 18px;">★</span>
                            @endif
                        @endfor
                    </div>
                </div>

                <p class="mb-2">
                    {{ $review->comment }}
                </p>

                <small class="text-muted">
                    {{ $review->created_at->format('d M Y') }}
                </small>

            </div>
        </div>

    @empty

        <p>No approved reviews yet.</p>

    @endforelse

</div>

</body>
</html>
