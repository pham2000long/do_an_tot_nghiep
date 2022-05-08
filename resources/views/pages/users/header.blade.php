<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/adomx-preview/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Dec 2021 08:43:00 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ isset($title) ? $title : 'Admin' }}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendor/bootstrap.min.css') }}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendor/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendor/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendor/cryptocurrency-icons.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/plugins/plugins.css') }}">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/helper.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

    <!-- Custom Style CSS Only For Demo Purpose -->
    <link id="cus-style" rel="stylesheet" href="{{ asset('backend/assets/css/style-primary.css') }}">

    @yield('css')

</head>

<body>
    <div class="main-wrapper">
        <!-- Header Section Start -->
        <div class="header-section">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo (Header Left) Start -->
                    <div class="header-logo col-auto">
                        <a href="{{ route('admin.dashboard') }}">
                            <img src="{{ asset('backend/assets/images/logo/logo.png') }}" alt="">
                            <img src="{{ asset('backend/assets/images/logo/logo-light.png') }}" class="logo-light" alt="">
                        </a>
                    </div><!-- Header Logo (Header Left) End -->

                    <!-- Header Right Start -->
                    <div class="header-right flex-grow-1 col-auto">
                        <div class="row justify-content-between align-items-center">

                            <!-- Side Header Toggle & Search Start -->
                            <div class="col-auto">
                                <div class="row align-items-center">

                                    <!--Side Header Toggle-->
                                    <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>
                                </div>
                            </div><!-- Side Header Toggle & Search End -->

                            <!-- Header Notifications Area Start -->
                            <div class="col-auto">

                                <ul class="header-notification-area">
                                    <!--User-->
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle" href="#">
                                            <span class="user">
                                        <span class="avatar">
                                            @if (Auth::user()->avatar)
                                                <img src="{{ asset('images/avatars/' . Auth::user()->avatar) }}" alt="">
                                            @else
                                                <img src="{{ asset('images/avatars/user.jpg') }}" alt="">
                                            @endif
                                            <span class="status"></span>
                                            </span>
                                            <span class="name">{{ Auth::user()->name }}</span>
                                            </span>
                                        </a>

                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-user">
                                            <div class="head">
                                                <h5 class="name"><a href="#">{{ Auth::user()->name }}</a></h5>
                                                <a class="mail" href="#">{{ Auth::user()->email }}</a>
                                            </div>
                                            <div class="body">
                                                <ul>
                                                    <li><a href="{{ route('pages.users.profile', Auth::user()->id) }}"><i class="zmdi zmdi-account"></i>Trang cá nhân</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="{{ route('users.logout') }}"><i class="zmdi zmdi-lock-open"></i>Đăng xuất</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </li>

                                </ul>

                            </div><!-- Header Notifications Area End -->

                        </div>
                    </div><!-- Header Right End -->

                </div>
            </div>
        </div><!-- Header Section End -->
