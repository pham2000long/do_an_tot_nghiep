@extends('pages.users.main')

@section('content')
<!--Order Details Head Start-->
<div class="col-12 mb-30">
    <div class="row mbn-15">
        <div class="col-12 col-md-4 mb-15">
            <h4 class="text-primary fw-600 m-0">Order ID# {{ $order->order_code }}</h4>
        </div>
        <div class="text-left text-md-center col-12 col-md-4 mb-15">
            <span>Trạng thái:
                @switch($order->status)
                    @case(0)
                        <span class="badge badge-warning">Chờ xác nhận</span>
                        @break

                    @case(1)
                        <span class="badge badge-secondary">Chờ lấy hàng</span>
                        @break

                    @case(2)
                    <span class="badge badge-primary">Đang giao</span>
                        @break
                    @case(3)
                    <span class="badge badge-success">Đã giao</span>
                        @break
                    @case(4)
                    <span class="badge badge-danger">Đã hủy</span>
                        @break
                @endswitch
            </span>
        </div>
        <div class="text-left text-md-right col-12 col-md-4 mb-15">
            Khoảng thời gian giao hàng: <p>{{ ($order->created_at->addDays(7))->format('d/m/Y') }}</p>
        </div>
    </div>
</div>
<!--Order Details Head End-->

<!--Order Details Customer Information Start-->
<div class="col-12 mb-30">
    <div class="order-details-customer-info row mbn-20">

        <!--Billing Info Start-->
        <div class="col-lg-4 col-md-6 col-12 mb-20">
            <h4 class="mb-25">Thông tin đơn hàng</h4>
            <ul>
                <li> <span>Tên khách</span> <span>{{ $order->name }}</span> </li>
                <li> <span>Địa chỉ</span> <span>{{ $order->address }}</span> </li>
                <li> <span>Email</span> <span>{{ $order->email }}</span> </li>
                <li> <span>SĐT</span> <span>{{ $order->phone }}</span> </li>
            </ul>
        </div>
        <!--Billing Info End-->

        <!--Shipping Info Start-->
        <div class="col-lg-4 col-md-6 col-12 mb-20">
            <h4 class="mb-25">Thông tin giao hàng</h4>
            <ul>
                <li> <span>Tên khách</span> <span>{{ $order->name }}</span> </li>
                <li> <span>Địa chỉ</span> <span>{{ $order->address }}</span> </li>
                <li> <span>Email</span> <span>{{ $order->email }}</span> </li>
                <li> <span>SĐT</span> <span>{{ $order->phone }}</span> </li>
            </ul>
        </div>
        <!--Shipping Info End-->
        <!--Purchase Info Start-->
        <div class="col-lg-4 col-md-6 col-12 mb-20">
            <h4 class="mb-25">Thông tin đơn hàng</h4>
            <ul>
                <?php
                    $count = 0;
                    $total = 0;
                    foreach ($order->orderDetails as $orderDetail) {
                        $count += $orderDetail->quantity;
                        $total += $orderDetail->price * $orderDetail->quantity;
                    }
                ?>
                <li> <span>Số mặt hàng</span> <span>{{ $order->orderDetails->count() }}</span> </li>
                <li> <span>Tổng số lượng</span> <span>{{ $count }}</span> </li>
                <li> <span>Tổng tiền</span> <span>{{ $total }} VND</span> </li>
            </ul>
        </div>
        <!--Purchase Info End-->
    </div>
</div>
<!--Order Details Customer Information Start-->

<!--Order Details List Start-->
<div class="col-12 mb-30">
    <div class="table-responsive">
        <table class="table table-bordered table-vertical-middle">
            <thead>
                <tr>
                    <th>Tên hàng</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $orderDetail->productDetail->product->name }}</td>
                        <td>{{ $orderDetail->price }}</td>
                        <td>{{ $orderDetail->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--Order Details List End-->
@endsection
