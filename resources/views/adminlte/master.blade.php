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
            <a href="#" class="brand-link">
                <span class="brand-text fw-light">
                    Laravel Admin
                </span>
            </a>
        </div>

        <div class="sidebar-wrapper">
            <nav>
                <ul class="nav sidebar-menu flex-column">

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
