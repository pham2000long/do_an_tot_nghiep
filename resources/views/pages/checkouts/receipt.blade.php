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
                <li><a href="{{ route('checkouts.delivery') }}">Delivery</a></li>
                <li><a class="active" href="">Receipt</a></li>
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
                <li class="col-md-4 active">
                    <span data-text="Receipt"></span>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- ========================  Checkout ======================== -->

<section class="checkout">
    <div class="container">

        <header class="hidden">
            <h3 class="h3 title">Checkout - Step 4</h3>
        </header>

        <!-- ========================  Cart navigation ======================== -->

        <div class="clearfix">
            <div class="row">
                <div class="col-xs-6">
                    <span class="h2 title">Cảm ơn quý khách đã đặt hàng! Vui long kiểm tra email xem thông tin đặt hàng!</span>
                </div>
                <div class="col-xs-6 text-right">
                    <a onclick="window.print()" class="btn btn-main"><span class="icon icon-printer"></span> Print</a>
                </div>
            </div>
        </div>

        <!-- ========================  Payment ======================== -->

        <div class="cart-wrapper">

            <div class="note-block">

                <div class="row">
                    <!-- === left content === -->

                    <div class="col-md-6">

                        <div class="white-block">

                            <div class="h4">Thông tin giao hàng</div>

                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Tên người nhận</strong> <br />
                                        <span>{{ Auth::user()->name }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Email</strong><br />
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Phone</strong><br />
                                        <span>{{ Auth::user()->phone }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Address</strong><br />
                                        <span>{{ Auth::user()->address }}</span>
                                    </div>
                                </div>

                            </div>

                        </div> <!--/col-md-6-->

                    </div>

                    <!-- === right content === -->

                    <div class="col-md-6">
                        <div class="white-block">

                            <div class="h4">Chi tiết đặt hàng</div>

                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Mã đơn hàng</strong> <br />
                                        <span>{{ $order->order_code }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Địa chỉ giao hàng</strong> <br />
                                        <span>{{ $order->address }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Thời gian đặt hàng</strong> <br />
                                        <span>{{ ($order->created_at)->format('d/m/Y') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Thời gian giao hàng dự tính</strong> <br />
                                        <span>{{ ($order->created_at->addDays(7))->format('d/m/Y') }}</span>
                                    </div>
                                </div>

                            </div>

                        </div>
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
            @if($carts->isNotEmpty())
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
                            <small>Green corner</small>
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
                            <strong>Tổng tiền</strong>
                        </div>
                        <div>
                            <div class="h4 title">{{ number_format($total) }} ₫</div>
                        </div>
                    </div>
                </div>
                @endif
        </div>

        <!-- ========================  Cart navigation ======================== -->

        <div class="clearfix">
            <div class="row">
                <div class="col-xs-6">
                    <span class="h2 title">Cảm ơn quý khách đã đặt hàng! Vui long kiểm tra email xem thông tin đặt hàng!</span>
                </div>
                <div class="col-xs-6 text-right">
                    <a onclick="window.print()" class="btn btn-main"><span class="icon icon-printer"></span> Print</a>
                </div>
            </div>
        </div>

    </div> <!--/container-->

</section>
@endsection
