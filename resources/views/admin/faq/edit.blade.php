@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1>Edit FAQ</h1>

        <form action="{{ route('admin.faq.update', $faq->id) }}"
              method="POST">

            @csrf

            <div class="mb-3">
                <label>Question</label>
                <input type="text"
                       name="question"
                       value="{{ $faq->question }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Answer</label>
                <textarea name="answer"
                          class="form-control"
                          rows="5">{{ $faq->answer }}</textarea>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

        </form>

    </div>

@endsection
