@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-3">Edit Product</h1>

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Product Form</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.product.update', $data->id) }}" method="post">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Category</label>

                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if($category->id == $data->category_id) selected @endif>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $data->title }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keywords</label>
                        <input type="text" name="keywords" value="{{ $data->keywords }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ $data->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" value="{{ $data->price }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" value="{{ $data->quantity }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <input type="number" name="status" value="{{ $data->status }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">
                        Update Product
                    </button>

                    <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">
                        Back
                    </a>

                </form>

            </div>

        </div>

    </div>

@endsection
