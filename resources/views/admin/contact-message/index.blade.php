@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-4">Contact Messages</h1>

        <div class="card">

            <div class="card-body">

                <table class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($messages as $message)

                        <tr>

                            <td>{{ $message->id }}</td>

                            <td>{{ $message->name }}</td>

                            <td>{{ $message->email }}</td>

                            <td>{{ $message->subject }}</td>

                            <td>{{ $message->message }}</td>

                            <td>{{ $message->created_at }}</td>

                            <td>
                                <a href="{{ route('admin.contact-message.delete', $message->id) }}"
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
