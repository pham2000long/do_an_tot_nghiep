@extends('admins.layouts.main')

@section('css')
    <style>
        .content {
            box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
            border-radius: 3px;
            border: 1px solid #ddd;
        }
        .timeline-list li .icon::before {
            bottom: 20px !important;
        }
    </style>
@endsection

@section('content')
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Thông tin cá nhân</h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-50">

        <div class="col-12 mb-50">
            <div class="author-top">
                <div class="inner">
                    <div class="author-profile">
                        <div class="image">
                            <img src="{{ !empty($user->avatar) ? asset('images/avatars/'.$user->avatar) : asset('images/avatars/user.jpg') }}"
                                 class=""
                                 alt="{{ $user->name }}"
                            >
                        </div>
                        <div class="info">
                            <h5>{{ $user->name }}</h5>
                            <span>{{ $user->email }}</span>
{{--                            <a href="#" class="edit">--}}
{{--                                <i class="zmdi zmdi-edit"></i>--}}
{{--                            </a>--}}
{{--                            <a href="" class="edit" data-toggle="modal" data-target="#exampleModal3"><i class="zmdi zmdi-edit"></i></a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Timeline / Activities Start-->
        <div class="col-xlg-12 col-12 mb-50">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Lịch sử mua hàng</h3>
                </div>

                @if ($purchaseHistory->isNotEmpty())
                    <div class="box-body">
                        <div class="timeline-wrap row mbn-50">
                            @foreach($purchaseHistory as $order)

                                @php
                                    $qty = 0;
                                    $price = 0;
                                    foreach($order->orderDetails as $order_detail) {
                                      $qty = $qty + $order_detail->quantity;
                                      $price = $price + $order_detail->price * $order_detail->quantity;
                                    }
                                @endphp

                                <div class="col-12 mb-50"><span class="timeline-date">{{ date_format($order->created_at, 'H:i:s d/m/Y') }}</span></div>

                                <div class="col-12 mb-50">
                                    <ul class="timeline-list">

                                        <li>
                                            <span class="icon"><i class="zmdi zmdi-receipt"></i></span>
                                            <div class="details">
                                                <h5 class="title"><a href="#"><a style="color: #3c8dbc !important;">{{ $user->name }}</a> đã mua <span style="color: #f30;">{{ $qty }}</span> sản phẩm với giá trị <span style="color: #f30;">{{ number_format($price,0,',','.') }}</span> VNĐ</a></h5>
                                                <div class="content" style="max-width: 100%;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped" style="width: 100%; margin-bottom: 0; background-color: #fff;">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center" style="vertical-align: middle;">STT</th>
                                                                <th class="text-center" style="vertical-align: middle;">Mã<br>Sản Phẩm</th>
                                                                <th class="text-center" style="vertical-align: middle;">Tên<br>Sản Phẩm</th>
                                                                <th class="text-center" style="vertical-align: middle;">Mầu Sắc</th>
                                                                <th class="text-center" style="vertical-align: middle;">Số Lượng</th>
                                                                <th class="text-center" style="vertical-align: middle;">Đơn Giá</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($order->orderDetails as $key => $order_detail)
                                                                <tr>
                                                                    <td class="text-center" style="vertical-align: middle;">{{ $key + 1 }}</td>
                                                                    <td class="text-center" style="vertical-align: middle;"><a title="{{ $order_detail->productDetail->product->name }}">{{ $order_detail->productDetail->product->sku_code }}</a></td>
                                                                    <td class="text-center" style="vertical-align: middle;">{{ $order_detail->productDetail->product->name }}</td>
                                                                    <td class="text-center" style="vertical-align: middle;">{{ $order_detail->productDetail->color }}</td>
                                                                    <td class="text-center" style="vertical-align: middle;">{{ $order_detail->quantity }}</td>
                                                                    <td class="text-center" style="color: #f30; vertical-align: middle;">{{ number_format($order_detail->price,0,',','.') }}₫</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

{{--                                        <li>--}}
{{--                                            <span class="icon"><i class="zmdi zmdi-receipt"></i></span>--}}
{{--                                            <div class="details">--}}
{{--                                                <h5 class="title"><a href="#">Create New Task for New Marketing</a></h5>--}}
{{--                                                <div class="gallery">--}}
{{--                                                    <div class="row mbn-30">--}}

{{--                                                        <div class="col-md-4 col-sm-6 col-12 mb-30"><a href="#"><img src="assets/images/gallery/profile-gallery-1.jpg" alt=""></a></div>--}}
{{--                                                        <div class="col-md-4 col-sm-6 col-12 mb-30"><a href="#"><img src="assets/images/gallery/profile-gallery-2.jpg" alt=""></a></div>--}}
{{--                                                        <div class="col-md-4 col-sm-6 col-12 mb-30"><a href="#"><img src="assets/images/gallery/profile-gallery-3.jpg" alt=""></a></div>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <span class="time">65 min ago</span>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}

{{--                                        <li>--}}
{{--                                            <span class="icon"><i class="zmdi zmdi-receipt"></i></span>--}}
{{--                                            <div class="details">--}}
{{--                                                <h5 class="title"><a href="#">Create New Task for New Marketing</a></h5>--}}
{{--                                                <div class="video">--}}
{{--                                                    <a href="#"><i class="zmdi zmdi-play"></i></a>--}}
{{--                                                </div>--}}
{{--                                                <span class="time">3 hour ago</span>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}

{{--                                        <li>--}}
{{--                                            <span class="icon"><i class="zmdi zmdi-receipt"></i></span>--}}
{{--                                            <div class="details">--}}
{{--                                                <h5 class="title"><a href="#">Create New Task for New Marketing</a></h5>--}}
{{--                                                <div class="content">--}}
{{--                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id dolores, assumenda quaerat inventore atque dolore sapiente doloribus iusto quisquam ullam autem labore, laborum beatae repudiandae! Recusandae ullam cumque, non temporibus?</p>--}}
{{--                                                </div>--}}
{{--                                                <span class="time">17 hour ago</span>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}

                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!--Timeline / Activities End-->
    </div>
@endsection
