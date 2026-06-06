<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link"
                       data-lte-toggle="sidebar"
                       href="#"
                       role="button">
                        ☰
                    </a>
                </li>
            </ul>

        </div>
    </nav>

    <aside class="app-sidebar bg-body-secondary shadow">

        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <span class="brand-text fw-light">
                    Laravel Admin
                </span>
            </a>
        </div>

        <div class="sidebar-wrapper">
            <nav>
                <ul class="nav sidebar-menu flex-column">

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <p><i class="fa-solid fa-gauge me-2"></i> Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <p><i class="fa-solid fa-house me-2"></i> Homepage</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link">
                            <p><i class="fa-solid fa-tags me-2"></i> Categories</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.product.index') }}" class="nav-link">
                            <p><i class="fa-solid fa-box me-2"></i> Products</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.order.index') }}" class="nav-link">
                            <p><i class="fa-solid fa-cart-shopping me-2"></i> Orders</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.review.index') }}" class="nav-link">
                            <p><i class="fa-solid fa-star me-2"></i> Reviews</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.contact-message.index') }}" class="nav-link">
                            <p><i class="fa-solid fa-envelope me-2"></i> Contact Messages</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.faq.index') }}" class="nav-link">
                            <p><i class="fa-solid fa-circle-question me-2"></i> FAQ</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.setting.index') }}" class="nav-link">
                            <p><i class="fa-solid fa-gear me-2"></i> Settings</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.customer.index') }}" class="nav-link">
                            <p><i class="fa-solid fa-users me-2"></i> Customers</p>
                        </a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf

                                <button type="submit" class="nav-link btn btn-link text-start w-100">
                                    <p><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</p>
                                </button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">
                                <p>Login</p>
                            </a>
                        </li>
                    @endguest

                </ul>
            </nav>
        </div>

    </aside>

    <main class="app-main p-4">

        @yield('content')

    </main>

</div>

<script src="{{ asset('admin/js/adminlte.js') }}"></script>

</body>
</html>
