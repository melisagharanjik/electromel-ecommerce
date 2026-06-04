@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-4">Reviews</h1>

        <div class="card">

            <div class="card-body">

                <table class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($reviews as $review)

                        <tr>

                            <td>{{ $review->id }}</td>

                            <td>
                                {{ $review->user->name ?? 'Unknown' }}
                            </td>

                            <td>
                                {{ $review->product->title ?? 'Deleted Product' }}
                            </td>

                            <td>
                                {{ $review->rating }}/5
                            </td>

                            <td>
                                {{ $review->comment }}
                            </td>

                            <td>
                                {{ $review->status }}
                            </td>

                            <td>

                                <a href="{{ route('admin.review.approve', $review->id) }}"
                                   class="btn btn-success btn-sm">
                                    Approve
                                </a>

                                <a href="{{ route('admin.review.reject', $review->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Reject
                                </a>

                                <a href="{{ route('admin.review.delete', $review->id) }}"
                                   class="btn btn-danger btn-sm">
                                    Delete
                                </a>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
