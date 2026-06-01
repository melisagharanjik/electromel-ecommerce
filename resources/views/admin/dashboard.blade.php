@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-4">Admin Dashboard</h1>

        <div class="row">

            <div class="col-md-6">
                <div class="card text-bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <h2>{{ $categoryCount }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <h2>{{ $productCount }}</h2>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
