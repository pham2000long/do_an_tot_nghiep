<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Mobile Web-app fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Meta tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.ico">

    <!--Title-->
    <title>Mobel - Furniture Website Template</title>

    <!--CSS styles-->
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/animate.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/font-awesome.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/furniture-icons.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/linear-icons.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/magnific-popup.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/owl.carousel.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/ion-range-slider.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/theme.css') }}" />

    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>

    <![endif]-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    @yield('css')
</head>

<body>

    <div class="page-loader"></div>

    <div class="wrapper">

        <!--Use class "navbar-fixed" or "navbar-default" -->
        <!--If you use "navbar-fixed" it will be sticky menu on scroll (only for large screens)-->

        <!-- ======================== Navigation ======================== -->

        <nav class="navbar-fixed">

            <div class="container">

                <!-- ==========  Top navigation ========== -->
                <?php
                    $quantity = 0;
                    if (Cart::count()) {
                        foreach (Cart::content() as $cart) {
                            $quantity += $cart->qty;
                        }
                    }
                ?>
                <div class="navigation navigation-top clearfix">
                    <ul>
                        <!--add active class for current page-->
                        <li><a href="javascript:void(0);" class="open-login"><i class="icon icon-user"></i></a></li>

                        <li><a href="javascript:void(0);" class="open-search"><i class="icon icon-magnifier"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="open-cart"><i class="icon icon-cart"></i>
                                <span id="total-quantity-show">{{ $quantity }}</span></a></li>
                    </ul>
                </div>
                <!--/navigation-top-->

                <!-- ==========  Main navigation ========== -->

                <div class="navigation navigation-main">

                    <!-- Setup your logo here-->

                    <a href="index.html" class="logo"><img src="{{ asset('frontend/assets/images/logo.png') }}"
                            alt="" /></a>

                    <!-- Mobile toggle menu -->

                    <a href="#" class="open-menu"><i class="icon icon-menu"></i></a>

                    <!-- Convertible menu (mobile/desktop)-->

                    <div class="floating-menu">

                        <!-- Mobile toggle menu trigger-->

                        <div class="close-menu-wrapper">
                            <span class="close-menu"><i class="icon icon-cross"></i></span>
                        </div>

                        <ul>
                            <li><a href="index.html">Home</a></li>

                            <!-- Single dropdown-->

                            <li>
                                <a href="#">Shop <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                                <div class="navbar-dropdown navbar-dropdown-single">
                                    <div class="navbar-box">

                                        <!-- box-2 (without 'box-1', box-2 will be displayed as full width)-->

                                        <div class="box-2">
                                            <div class="box clearfix">
                                                <ul>
                                                    <li class="label">Shop</li>
                                                    <li><a href="products-grid.html">Products grid</a></li>
                                                    <li><a href="products-list.html">Products list</a></li>
                                                    <li><a href="category.html">Products intro</a></li>
                                                    <li><a href="products-topbar.html">Products topbar</a></li>
                                                    <li><a href="product.html">Product overview</a></li>
                                                </ul>
                                            </div>
                                            <!--/box-->
                                        </div>
                                        <!--/box-2-->
                                    </div>
                                    <!--/navbar-box-->
                                </div>
                                <!--/navbar-dropdown-->
                            </li>

                            <!-- Simple menu link-->

                            <li><a href="shortcodes.html">Shortcodes</a></li>
                        </ul>
                    </div>
                    <!--/floating-menu-->
                </div>
                <!--/navigation-main-->

                <!-- ==========  Search wrapper ========== -->

                <div class="search-wrapper">

                    <!-- Search form -->
                    <input class="form-control" placeholder="Search..." />
                    <button class="btn btn-main btn-search">Go!</button>
                    <!--/search-results-->
                </div>

                <!-- ==========  Login wrapper ========== -->

                <div class="login-wrapper">
                    @if (!Auth::check())
                        <form action="{{ route('users.login') }}" method="POST">
                            @csrf
                            <div class="h4">Sign in</div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <a href="" class="open-popup">Forgot password?</a>
                                <a href="{{ route('users.login_index') }}" class="open-popup">Don't have an account?</a>
                            </div>
                            <button type="submit" class="btn btn-block btn-main">Submit</button>
                        </form>
                    @else
                        <div class="form-group">
                            <div class="box">
                                <a href="" class="open-popup" style="font-size: 20px">Profile</a>
                                <hr>
                                <a href="{{ route('users.logout') }}" class="open-popup" style="font-size: 20px">Sing out</a>
                            </div>
                        </div>
                    @endif

                </div>

                <!-- ==========  Cart wrapper ========== -->

                <div class="cart-wrapper">
                    <div class="checkout">
                        <div class="clearfix">
                            <?php
                                $carts = Cart::content();
                            ?>
                            <div id="change-item-cart">
                                @if($carts->isNotEmpty())
                                <!--cart item-->
                                <div class="row">
                                    <!--cart item-->
                                    @foreach ($carts as $cart)
                                    <div class="cart-block cart-block-item clearfix">
                                        <div class="image">
                                            <a href="{{ route('pages.product_detail', $cart->id) }}"><img
                                                    src="{{ asset('images/products/' . $cart->options->image) }}"
                                                    alt="" /></a>
                                        </div>
                                        <div class="title">
                                            <div><a href="{{ route('pages.product_detail', $cart->id) }}">{{ $cart->name }}</a></div>
                                            {{-- <small>Green corner</small> --}}
                                        </div>
                                        <div class="quantity">
                                            <input type="number" data-url="{{ route('carts.update_quantity') }}" data-id="{{ $cart->rowId }}" value="{{ $cart->qty }}" class="form-control form-quantity item-quantity" min="1"/>
                                        </div>
                                        <div class="price">
                                            <span class="final">{{ number_format($cart->options->final_price) }} ₫</span>
                                            <span class="discount">{{ number_format($cart->options->sale_price) }} ₫</span>
                                        </div>
                                        <!--delete-this-item-->
                                        <span class="icon icon-cross icon-delete delete-cart-item"
                                            data-url="{{ route('carts.delete_cart_item', $cart->id) }}"></span>
                                    </div>
                                    @endforeach
                                </div>

                                <hr />

                                <!--cart final price -->
                                <?php
                                    $total = 0;
                                    foreach($carts as $cart) {
                                        $total += $cart->price;
                                    }
                                ?>
                                <div class="clearfix">
                                    <div class="cart-block cart-block-footer clearfix">
                                        <div>
                                            <strong>Total</strong>
                                        </div>
                                        <div>
                                            <div class="h4 title">{{ number_format($total) }} ₫</div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    Không có sản phẩm nào trong giỏ hàng!
                                    <hr>
                                @endif
                            </div>


                            <!--cart navigation -->

                            <div class="cart-block-buttons clearfix">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="{{ route('home.index') }}" class="btn btn-clean-dark">Tiếp tục mua sắm</a>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <a href="{{ route('checkouts.cart_items') }}" class="btn btn-main"><span
                                                class="icon icon-cart"></span> Checkout</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/checkout-->
                </div>
                <!--/cart-wrapper-->
            </div>
            <!--/container-->
        </nav>
