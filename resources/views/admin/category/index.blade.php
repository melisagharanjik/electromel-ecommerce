@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Category List</h1>

            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                Add Category
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Keywords</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->keywords }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', ['id' => $row->id]) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="{{ route('admin.category.delete', ['id' => $row->id]) }}"
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
