@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Product List</h1>

            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                Add Product
            </a>
        </div>

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Products</h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Stock Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($data as $rs)

                        <tr>

                            <td>{{ $rs->id }}</td>

                            <td>
                                @if($rs->image)
                                    <img src="{{ asset('uploads/'.$rs->image) }}" width="80">
                                @endif
                            </td>

                            <td>{{ $rs->title }}</td>

                            <td>{{ $rs->category->title }}</td>

                            <td>{{ $rs->price }}</td>

                            <td>{{ $rs->quantity }}</td>

                            <td>
                                @if($rs->quantity > 0)
                                    <span class="badge text-bg-success">In Stock</span>
                                @else
                                    <span class="badge text-bg-danger">Out Of Stock</span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('admin.product.edit', ['id' => $rs->id]) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="{{ route('admin.product.delete', ['id' => $rs->id]) }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure?')">
                                    Delete
                                </a>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

                <div class="mt-3">
                    @if($data->previousPageUrl())
                        <a href="{{ $data->previousPageUrl() }}" class="btn btn-secondary btn-sm">
                            Previous
                        </a>
                    @endif

                    <span style="margin: 0 10px;">
                        Page {{ $data->currentPage() }} of {{ $data->lastPage() }}
                    </span>

                    @if($data->nextPageUrl())
                        <a href="{{ $data->nextPageUrl() }}" class="btn btn-primary btn-sm">
                            Next
                        </a>
                    @endif
                </div>

            </div>

        </div>

    </div>

@endsection
