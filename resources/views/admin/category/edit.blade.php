@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-3">Edit Category</h1>

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Category Form</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.category.update', $data->id) }}" method="post">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text"
                               name="title"
                               value="{{ $data->title }}"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keywords</label>
                        <input type="text"
                               name="keywords"
                               value="{{ $data->keywords }}"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description"
                                  class="form-control">{{ $data->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <input type="number"
                               name="status"
                               value="{{ $data->status }}"
                               class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">
                        Update Category
                    </button>

                    <a href="{{ route('admin.category.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>

                </form>

            </div>

        </div>

    </div>

@endsection
