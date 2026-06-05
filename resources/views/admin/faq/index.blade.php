@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-4">FAQ List</h1>

        <a href="{{ route('admin.faq.create') }}"
           class="btn btn-primary mb-3">
            Add FAQ
        </a>

        <table class="table table-bordered">

            <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>

            @foreach($faqs as $faq)

                <tr>

                    <td>{{ $faq->id }}</td>

                    <td>{{ $faq->question }}</td>

                    <td>

                        <a href="{{ route('admin.faq.edit', $faq->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="{{ route('admin.faq.delete', $faq->id) }}"
                           class="btn btn-danger btn-sm">
                            Delete
                        </a>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

@endsection
