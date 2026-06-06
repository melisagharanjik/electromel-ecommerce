@extends('adminlte.master')

@section('content')

    <style>
        .dashboard-card {
            border: none;
            border-radius: 18px;
            color: white;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            transition: 0.3s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .dashboard-card h5 {
            font-size: 18px;
            font-weight: 600;
        }

        .dashboard-card h2 {
            font-size: 42px;
            font-weight: bold;
            margin: 15px 0;
        }

        .card-blue { background: linear-gradient(135deg, #4facfe, #00f2fe); }
        .card-purple { background: linear-gradient(135deg, #667eea, #764ba2); }
        .card-green { background: linear-gradient(135deg, #43e97b, #38f9d7); }
        .card-yellow { background: linear-gradient(135deg, #f6d365, #fda085); }
        .card-red { background: linear-gradient(135deg, #ff758c, #ff7eb3); }
        .card-orange { background: linear-gradient(135deg, #f7971e, #ffd200); }
        .card-pink { background: linear-gradient(135deg, #f093fb, #f5576c); }
        .card-dark { background: linear-gradient(135deg, #232526, #414345); }
    </style>

    <div class="container-fluid">

        <h1 class="mb-4">Admin Dashboard</h1>

        <div class="row">

            <div class="col-md-6">
                <div class="dashboard-card card-blue">
                    <h5>Categories</h5>
                    <h2>{{ $categoryCount }}</h2>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-light btn-sm">View Categories</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-purple">
                    <h5>Products</h5>
                    <h2>{{ $productCount }}</h2>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-light btn-sm">View Products</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-green">
                    <h5>Orders</h5>
                    <h2>{{ $orderCount }}</h2>
                    <a href="{{ route('admin.order.index') }}" class="btn btn-light btn-sm">View Orders</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-yellow">
                    <h5>Pending Orders</h5>
                    <h2>{{ $pendingOrders }}</h2>
                    <a href="{{ route('admin.order.index') }}" class="btn btn-light btn-sm">Manage Orders</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-orange">
                    <h5>Completed Orders</h5>
                    <h2>{{ $completedOrders }}</h2>
                    <a href="{{ route('admin.order.index') }}" class="btn btn-light btn-sm">View Completed</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-red">
                    <h5>Cancelled Orders</h5>
                    <h2>{{ $cancelledOrders }}</h2>
                    <a href="{{ route('admin.order.index', ['status' => 'Cancelled']) }}" class="btn btn-light btn-sm">View Cancelled</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-pink">
                    <h5>Total Revenue</h5>
                    <h2>${{ $totalRevenue ?? 0 }}</h2>
                    <a href="{{ route('admin.order.index') }}" class="btn btn-light btn-sm">View Revenue</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-dark">
                    <h5>Total Users</h5>
                    <h2>{{ $userCount }}</h2>
                    <a href="{{ route('admin.customer.index') }}" class="btn btn-light btn-sm">View Users</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-blue">
                    <h5>Customers</h5>
                    <h2>{{ $customerCount }}</h2>
                    <a href="{{ route('admin.customer.index') }}" class="btn btn-light btn-sm">View Customers</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-purple">
                    <h5>Admins</h5>
                    <h2>{{ $adminCount }}</h2>
                    <a href="{{ route('admin.customer.index') }}" class="btn btn-light btn-sm">View Admins</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-green">
                    <h5>Reviews</h5>
                    <h2>{{ $reviewCount }}</h2>
                    <a href="{{ route('admin.review.index') }}" class="btn btn-light btn-sm">View Reviews</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-yellow">
                    <h5>Pending Reviews</h5>
                    <h2>{{ $pendingReviews }}</h2>
                    <a href="{{ route('admin.review.index') }}" class="btn btn-light btn-sm">Manage Reviews</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-orange">
                    <h5>Contact Messages</h5>
                    <h2>{{ $contactMessageCount }}</h2>
                    <a href="{{ route('admin.contact-message.index') }}" class="btn btn-light btn-sm">View Messages</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dashboard-card card-red">
                    <h5>FAQ Items</h5>
                    <h2>{{ $faqCount }}</h2>
                    <a href="{{ route('admin.faq.index') }}" class="btn btn-light btn-sm">View FAQ</a>
                </div>
            </div>

        </div>

    </div>

@endsection
