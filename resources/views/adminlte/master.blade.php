<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.css') }}">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

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
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <p>Homepage</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link">
                            <p>Categories</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.product.index') }}" class="nav-link">
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.order.index') }}" class="nav-link">
                            <p>Orders</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.review.index') }}" class="nav-link">
                            <p>Reviews</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.contact-message.index') }}" class="nav-link">
                            <p>Contact Messages</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.faq.index') }}" class="nav-link">
                            <p>FAQ</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.setting.index') }}" class="nav-link">
                            <p>Settings</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.customer.index') }}" class="nav-link">
                            <p>Customers</p>
                        </a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf

                                <button type="submit" class="nav-link btn btn-link text-start w-100">
                                    <p>Logout</p>
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
