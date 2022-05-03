@extends('pages.layouts.main')

@section('content')
<!-- ========================  Main header ======================== -->

<section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
    <header>
        <div class="container text-center">
            <h2 class="h2 title">Checkout</h2>
            <ol class="breadcrumb breadcrumb-inverted">
                <li><a href="{{ route('home.index') }}"><span class="icon icon-home"></span></a></li>
                <li><a href="{{ route('checkouts.cart_items') }}">Cart items</a></li>
                <li><a class="active" href="{{ route('checkouts.delivery') }}">Delivery</a></li>
                <li><a href="">Receipt</a></li>
            </ol>
        </div>
    </header>
</section>

<!-- ========================  Step wrapper ======================== -->

<div class="step-wrapper">
    <div class="container">

        <div class="stepper">
            <ul class="row">
                <li class="col-md-4 active">
                    <span data-text="Cart items"></span>
                </li>
                <li class="col-md-4 active">
                    <span data-text="Delivery"></span>
                </li>
                <li class="col-md-4">
                    <span data-text="Receipt"></span>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- ========================  Checkout ======================== -->

<section class="checkout">
    <form action="{{ route('checkouts.order') }}" method="POST">
        @csrf
    <div class="container">

        <header class="hidden">
            <h3 class="h3 title">Checkout - Step 2</h3>
        </header>

        <!-- ========================  Cart navigation ======================== -->

        <div class="clearfix">
            <div class="row">
                <div class="col-xs-6">
                    <a href="checkout-1.html" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Back to cart</a>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="checkout-3.html" class="btn btn-main"><span class="icon icon-cart"></span> Go to payment</a>
                </div>
            </div>
        </div>

        <!-- ========================  Delivery ======================== -->

        <div class="cart-wrapper">

            <div class="note-block">
                    <div class="col-md-6">
                        <div class="white-block">
                            <div class="h4">Thông tin vận chuyển</div>
                            <hr />
                            <?php
                                $user = Auth::user();
                            ?>
                            <div class="row">
                                <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Tên khách hàng: *">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="SĐT: *">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email:">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="address" value="{{ $user->address }}" class="form-control" placeholder="Địa chỉ: *">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="note" class="form-control" placeholder="Ghi chú: *"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!--/col-md-6-->
                    <!-- === right content === -->

                    <div class="col-md-6">

                        <div class="white-block">

                            <div class="h4">Hình thức thanh toán</div>

                            <hr />

                            <span class="checkbox">
                                <input type="radio" id="delivery" checked>
                                <label for="delivery">Thanh toán khi giao hàng</label>
                            </span>

                            <hr />
                        </div>

                    </div>
            </div>
        </div>

        <!-- ========================  Cart wrapper ======================== -->

        <div class="cart-wrapper">
            <!--cart header -->

            <div class="cart-block cart-block-header clearfix">
                <div>
                    <span>Product</span>
                </div>
                <div>
                    <span>&nbsp;</span>
                </div>
                <div>
                    <span>Quantity</span>
                </div>
                <div class="text-right">
                    <span>Price</span>
                </div>
            </div>

            <!--cart items-->

            <div class="clearfix">
                <!--cart item-->
                @foreach ($carts as $cart)
                    <div class="cart-block cart-block-item clearfix">
                        <div class="image">
                            <a href="{{ route('pages.product_detail', $cart->id) }}"><img src="{{ asset('images/products/' . $cart->options->image) }}" alt="" /></a>
                        </div>
                        <div class="title">
                            <div><a href="{{ route('pages.product_detail', $cart->id) }}">{{ $cart->name }}</a></div>
                        </div>
                        <div class="quantity">
                            <strong>{{ $cart->qty }}</strong>
                        </div>
                        <div class="price">
                            <span class="final">{{ number_format($cart->options->final_price) }} ₫</span>
                            <span class="discount">{{ number_format($cart->options->sale_price) }} ₫</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <?php
                $total = 0;
                $quantity = 0;
                foreach($carts as $cart) {
                    $total += $cart->price;
                    $quantity += $cart->qty;
                }
            ?>
            <div class="clearfix">
                <div class="cart-block cart-block-footer clearfix">
                    <div>
                        <strong>Tổng tiền</strong>
                    </div>
                    <div>
                        <div class="h4 title">{{ number_format($total) }} ₫</div>
                        <input name="price" type="text" value="$total" hidden>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================  Cart navigation ======================== -->

        <div class="clearfix">
            <div class="row">
                <div class="col-xs-6">
                    <a href="{{ route('checkouts.cart_items') }}" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Quay lại giỏ hàng</a>
                </div>
                <div class="col-xs-6 text-right">
                    <button type="submit" class="btn btn-main"><span class="icon icon-cart"></span> Đặt hàng</button>
                </div>
            </div>
        </div>
    </div> <!--/container-->
    </form>
</section>
@endsection
