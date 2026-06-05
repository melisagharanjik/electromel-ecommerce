
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
@if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">

                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>

                @auth

                    @if(auth()->user()->role == 'admin')

                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-dashboard"></i> Admin Panel
                            </a>
                        </li>

                    @else

                        <li>
                            <a href="{{ route('my.orders') }}">
                                <i class="fa fa-user-o"></i> My Orders
                            </a>
                        </li>

                    @endif

                    <li>
                        <form action="{{ route('logout') }}" method="post" style="display:inline;">
                            @csrf

                            <button type="submit" style="background:none; border:none; color:#FFF;">
                                <i class="fa fa-sign-out"></i> Logout
                            </button>
                        </form>
                    </li>

                @endauth

                @guest

                    <li>
                        <a href="{{ route('login') }}">
                            <i class="fa fa-user-o"></i> Login
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}">
                            <i class="fa fa-user-plus"></i> Register
                        </a>
                    </li>

                @endguest

            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{ route('home') }}" method="get">

                            <select class="input-select" name="category_id">
                                <option value="0">All Categories</option>

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if(request('category_id') == $category->id) selected @endif>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>

                            <input class="input"
                                   name="search"
                                   placeholder="Search here"
                                   value="{{ request('search') }}">

                            <input class="input"
                                   type="number"
                                   name="min_price"
                                   placeholder="Min Price"
                                   value="{{ request('min_price') }}">

                            <input class="input"
                                   type="number"
                                   name="max_price"
                                   placeholder="Max Price"
                                   value="{{ request('max_price') }}">

                            <select class="input" name="sort">
                                <option value="">Sort By</option>

                                <option value="newest"
                                    {{ request('sort') == 'newest' ? 'selected' : '' }}>
                                    Newest
                                </option>

                                <option value="price_low"
                                    {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                                    Price Low to High
                                </option>

                                <option value="price_high"
                                    {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                                    Price High to Low
                                </option>

                            </select>

                            <button class="search-btn">Search</button>

                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="{{ route('wishlist.index') }}">

                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>

                                @php
                                    $wishlist = session()->get('wishlist', []);
                                @endphp

                                <div class="qty">{{ count($wishlist) }}</div>

                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                @php
                                    $cart = session()->get('cart', []);
                                @endphp

                                <div class="qty">{{ collect($cart)->sum('quantity') }}</div>
                            </a>
                            <div class="cart-dropdown">

                                @php
                                    $cart = session()->get('cart', []);
                                    $total = 0;
                                @endphp

                                <div class="cart-list">

                                    @foreach($cart as $item)

                                        @php
                                            $total += $item['price'] * $item['quantity'];
                                        @endphp

                                        <div class="product-widget">

                                            <div class="product-img">

                                                @if($item['image'])
                                                    <img src="{{ asset('uploads/'.$item['image']) }}" alt="">
                                                @endif

                                            </div>

                                            <div class="product-body">
                                                <h3 class="product-name">
                                                    {{ $item['title'] }}
                                                </h3>

                                                <h4 class="product-price">
                        <span class="qty">
                            {{ $item['quantity'] }}x
                        </span>
                                                    ${{ $item['price'] }}
                                                </h4>
                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                                <div class="cart-summary">
                                    <small>{{ count($cart) }} Item(s) selected</small>
                                    <h5>SUBTOTAL: ${{ $total }}</h5>
                                </div>

                                <div class="cart-btns">
                                    <a href="{{ route('cart.index') }}">View Cart</a>
                                    <a href="{{ route('checkout.index') }}">
                                        Checkout
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>

                            </div>
                            </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">

                <li class="active">
                    <a href="{{ route('home') }}">Home</a>
                </li>


                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('home', ['category_id' => $category->id]) }}">
                            {{ $category->title }}
                        </a>
                    </li>
                @endforeach

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop01.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Collection</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop03.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Accessories<br>Collection</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop02.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Cameras<br>Collection</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                @if($products->count() > 0)
                                @foreach($products as $product)

                                    <div class="product">

                                        <div class="product-img">

                                            @if($product->image)
                                                <img src="{{ asset('uploads/'.$product->image) }}" alt="">
                                            @else
                                                <img src="{{ asset('img/product01.png') }}" alt="">
                                            @endif

                                        </div>

                                        <div class="product-body">

                                            <p class="product-category">
                                                {{ $product->category->title }}
                                            </p>

                                            <h3 class="product-name">
                                                <a href="{{ route('product.detail', $product->id) }}">
                                                    {{ $product->title }}
                                                </a>
                                            </h3>

                                            <h4 class="product-price">
                                                ${{ $product->price }}
                                            </h4>

                                            <div class="product-btns">

                                                @php
                                                    $wishlist = session()->get('wishlist', []);
                                                @endphp

                                                <a href="{{ route('wishlist.add', $product->id) }}" class="add-to-wishlist">
                                                    @if(isset($wishlist[$product->id]))
                                                        <i class="fa fa-heart" style="color: red;"></i>
                                                        <span class="tooltipp">added to wishlist</span>
                                                    @else
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="tooltipp">add to wishlist</span>
                                                    @endif
                                                </a>

                                            </div>

                                        </div>

                                        <div class="add-to-cart">
                                            @if($product->quantity > 0)

                                                <a href="{{ route('cart.add', $product->id) }}" class="add-to-cart-btn">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to Cart
                                                </a>

                                            @else

                                                <button class="add-to-cart-btn" disabled>
                                                    Out Of Stock
                                                </button>

                                            @endif
                                        </div>

                                    </div>

                                @endforeach

                                @else

                                    <div class="col-md-12 text-center">
                                        <h3>No products found</h3>
                                        <p>Try another search or price range.</p>
                                    </div>

                                @endif

                                    <div id="slick-nav-1" class="products-slick-nav"></div>

                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

    @if($products->hasPages())
        <div class="section" style="position: relative; z-index: 9999;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">

                        @if($products->currentPage() > 1)
                            <a href="{{ route('home', array_merge(request()->query(), ['page' => $products->currentPage() - 1])) }}"
                               class="btn btn-danger">
                                Previous
                            </a>
                        @endif

                        <span style="margin:0 15px;">
                        Page {{ $products->currentPage() }} of {{ $products->lastPage() }}
                    </span>

                        @if($products->currentPage() < $products->lastPage())
                            <a href="{{ route('home', array_merge(request()->query(), ['page' => $products->currentPage() + 1])) }}"
                               class="btn btn-danger">
                                Next
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endif

<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="#">Hot deals</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Cameras</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="{{ route('cart.index') }}">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>ّ
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

