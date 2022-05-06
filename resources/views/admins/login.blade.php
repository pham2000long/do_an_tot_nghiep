@include('admins.layouts.auth.header')
<!-- Content Body Start -->
<div class="content-body m-0 p-0">

    <div class="login-register-wrap">
        <div class="row">

            <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">

                <div class="login-register-form-wrap">
                    @if (session('error'))
                        <div class="alert alert-outline-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="content">
                        <h1>Login</h1>
                        <p>Welcome to admin ChungHiep</p>
                    </div>
                    @include('admins.layouts.auth.alert')
                    <div class="login-register-form">
                        <form method="POST" action="{{ route('auth.login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-20"><input name="email" class="form-control" type="text" placeholder="Email"></div>
                                <div class="col-12 mb-20"><input name="password" class="form-control" type="password" placeholder="Password"></div>
                                <div class="col-12 mb-20">
                                    <label for="remember" class="adomx-checkbox-2">
                                        <input name="remember" id="remember" type="checkbox"><i class="icon"></i>Remember.
                                    </label>
                                </div>
                                <div class="col-12">
                                    <div class="row justify-content-between">
                                        <div class="col-auto mb-15"><a href="{{ route('auth.forgot_pass') }}">Forgot Password?</a></div>
                                        {{-- <div class="col-auto mb-15">Dont have account? <a href="register.html">Create Now.</a></div> --}}
                                    </div>
                                </div>
                                <div class="col-12 mt-10"><button class="button button-primary button-outline">sign in</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="login-register-bg order-1 order-lg-2 col-lg-7 col-12">
                <div class="content">
                    <h1>Sign in</h1>
                </div>
            </div>

        </div>
    </div>
</div><!-- Content Body End -->
@include('admins.layouts.auth.footer')
