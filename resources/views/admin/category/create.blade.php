@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-3">Add Category</h1>

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Category Form</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.category.store') }}" method="post">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keywords</label>
                        <input type="text" name="keywords" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <input type="number" name="status" value="1" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">
                        Save Category
                    </button>

                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">
                        Back
                    </a>

                </form>

            </div>

        </div>

    </div>

@endsection
