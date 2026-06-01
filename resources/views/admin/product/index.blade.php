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

            </div>

        </div>

    </div>

@endsection
