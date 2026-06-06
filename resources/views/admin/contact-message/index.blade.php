@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-4">Contact Messages</h1>

        <a href="{{ route('admin.contact-message.markAllRead') }}"
           class="btn btn-success mb-3">
            Mark All As Read
        </a>

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
                        <th>Status</th>
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

                                @if($message->status == 'Unread')
                                    <span class="badge bg-danger">Unread</span>
                                @else
                                    <span class="badge bg-success">Read</span>
                                @endif

                            </td>

                            <td>

                                <a href="{{ route('admin.contact-message.show', $message->id) }}"
                                   class="btn btn-info btn-sm">
                                    View
                                </a>

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
