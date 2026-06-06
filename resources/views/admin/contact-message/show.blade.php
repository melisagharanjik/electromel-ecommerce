@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-4">Message Details</h1>

        <div class="card">

            <div class="card-body">

                <h5>Name</h5>
                <p>{{ $message->name }}</p>

                <h5>Email</h5>
                <p>{{ $message->email }}</p>

                <h5>Subject</h5>
                <p>{{ $message->subject }}</p>

                <h5>Message</h5>

                <div class="border rounded p-3 bg-light">
                    {{ $message->message }}
                </div>

                <br>

                <a href="{{ route('admin.contact-message.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </div>

        </div>

    </div>

@endsection
