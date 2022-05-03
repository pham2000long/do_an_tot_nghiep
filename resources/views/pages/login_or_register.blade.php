@extends('pages.layouts.main')
@section('css')
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
@endsection
@section('content')
     <!-- ========================  Main header ======================== -->

     <section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
        <header>
            <div class="container text-center">
                <h2 class="h2 title">Trang người dùng</h2>
                <ol class="breadcrumb breadcrumb-inverted">
                    <li><a href="{{ route('home.index') }}"><span class="icon icon-home"></span></a></li>
                    <li><a class="active" href="login.html">Login & Register</a></li>
                </ol>
            </div>
        </header>
    </section>

    <!-- ========================  Login & register ======================== -->

    <section class="login-wrapper login-wrapper-page">
        <div class="container">

            <header class="hidden">
                <h3 class="h3 title">Sign in</h3>
            </header>

            <div class="row">

                <!-- === left content === -->

                <div class="col-md-6 col-md-offset-3">

                    <!-- === login-wrapper === -->

                    <div class="login-wrapper">

                        <div class="white-block">

                            <!--signin-->

                            <div class="login-block login-block-signin">

                                <div class="h4">Sign in <a href="javascript:void(0);" class="btn btn-main btn-xs btn-register pull-right">create an account</a></div>

                                <hr />
                                <form action="{{ route('users.login') }}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="email" value="" class="form-control" placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" name="password" value="" class="form-control" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="col-xs-6">
                                            {{-- <span class="checkbox">
                                                <input type="checkbox" id="checkBoxId3">
                                                <label for="checkBoxId3">Remember me</label>
                                            </span> --}}
                                        </div>

                                        <div class="col-xs-6 text-right">
                                            <button type="submit" class="btn btn-main">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!--/signin-->
                            <!--signup-->

                            <div class="login-block login-block-signup">

                                <div class="h4">Register now <a href="javascript:void(0);" class="btn btn-main btn-xs btn-login pull-right">Log in</a></div>

                                <hr />
                                <form action="{{ route('users.register') }}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="name" value="" class="form-control" placeholder="Họ tên: *">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="email" value="" class="form-control" placeholder="Email: *">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="phone" value="" class="form-control" placeholder="SĐT: *">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="address" value="" class="form-control" placeholder="Địa chỉ: *">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="clearfix">
                                                <p>Radio button line</p>
                                                <span class="checkbox checkbox-inline">
                                                    <input type="radio" id="radioIDb1" name="radioName2" checked="checked">
                                                    <label for="radioIDb1">
                                                        <strong>Radio option 1</strong>
                                                    </label>
                                                </span>

                                                <span class="checkbox checkbox-inline">
                                                    <input type="radio" id="radioIDb2" name="radioName2">
                                                    <label for="radioIDb2">
                                                        <strong>Radio option 2</strong>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" value="" class="form-control" placeholder="City: *">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" value="" class="form-control" placeholder="Email: *">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" value="" class="form-control" placeholder="Phone: *">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="#" class="btn btn-main btn-block">Create account</a>
                                        </div>

                                    </div>
                                </form>
                            </div> <!--/signup-->
                        </div>
                    </div> <!--/login-wrapper-->
                </div> <!--/col-md-6-->

            </div>

        </div>
    </section>
@endsection
@section('js')
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
@endsection
