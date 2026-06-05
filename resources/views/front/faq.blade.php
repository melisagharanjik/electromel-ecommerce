@extends('layout.home')

@section('content')

    <div class="section">
        <div class="container">

            <h2 class="mb-4">Frequently Asked Questions</h2>

            @forelse($faqs as $faq)

                <div class="card mb-3">

                    <div class="card-header">
                        <strong>{{ $faq->question }}</strong>
                    </div>

                    <div class="card-body">
                        {{ $faq->answer }}
                    </div>

                </div>

            @empty

                <div class="alert alert-info">
                    No FAQs available.
                </div>

            @endforelse

        </div>
    </div>

@endsection
