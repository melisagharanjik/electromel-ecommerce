@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1>Add FAQ</h1>

        <form action="{{ route('admin.faq.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Question</label>
                <input type="text"
                       name="question"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Answer</label>
                <textarea name="answer"
                          class="form-control"
                          rows="5"></textarea>
            </div>

            <button class="btn btn-success">
                Save
            </button>

        </form>

    </div>

@endsection
