@extends('adminlte.master')

@section('content')

    <div class="container-fluid">

        <h1 class="mb-4">Admin Dashboard</h1>

        <div class="row">

            <div class="col-md-6">
                <div class="card text-bg-primary mb-3 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <h2 class="mt-3">{{ $categoryCount }}</h2>

                        <a href="{{ route('admin.category.index') }}"
                           class="btn btn-light btn-sm mt-2">
                            View Categories
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-bg-success mb-3 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <h2 class="mt-3">{{ $productCount }}</h2>

                        <a href="{{ route('admin.product.index') }}"
                           class="btn btn-light btn-sm mt-2">
                            View Products
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-bg-warning mb-3 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Orders</h5>
                        <h2 class="mt-3">{{ $orderCount }}</h2>

                        <a href="{{ route('admin.order.index') }}"
                           class="btn btn-light btn-sm mt-2">
                            View Orders
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-bg-danger mb-3 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Pending Orders</h5>
                        <h2 class="mt-3">{{ $pendingOrders }}</h2>

                        <a href="{{ route('admin.order.index') }}"
                           class="btn btn-light btn-sm mt-2">
                            Manage Orders
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-bg-info mb-3 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Completed Orders</h5>
                        <h2 class="mt-3">{{ $completedOrders }}</h2>

                        <a href="{{ route('admin.order.index') }}"
                           class="btn btn-light btn-sm mt-2">
                            View Completed
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-bg-dark mb-3 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Revenue</h5>
                        <h2 class="mt-3">${{ $totalRevenue ?? 0 }}</h2>

                        <a href="{{ route('admin.order.index') }}"
                           class="btn btn-light btn-sm mt-2">
                            View Revenue
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
