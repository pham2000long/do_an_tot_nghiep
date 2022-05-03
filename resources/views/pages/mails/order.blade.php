<!DOCTYPE html>
<html>
<head>
    <title>Chung Hiep Shop</title>
</head>
<body>
<h4>Cảm ơn quý khách {{ $user->name }} đã đặt hàng!</h4>
<br>
Mã đơn hàng: {{ $order->order_code }}
<br>
<table>
    <!-- Table Head Start -->
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
        </tr>
    </thead><!-- Table Head End -->

    <!-- Table Body Start -->
    <tbody>
        @foreach ($carts as $key => $cart)
        <tr>
            <td>{{ $cart->name }}</td>
            <td>{{ $cart->qty }}</td>
            <td>{{ $cart->price }}</td>
        </tr>
        @endforeach
    </tbody><!-- Table Body End -->
</table>
<br>
<?php
    $total = 0;
    foreach($carts as $cart) {
        $total += $cart->price;
    }
?>
Tổng tiền: {{ $total }}

</body>
</html>
