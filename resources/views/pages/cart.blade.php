<?php
    $carts = Cart::content();
?>
@if($carts->isNotEmpty())
{{-- <!--cart item-->
<div class="row"> --}}
    <!--cart item-->
    @foreach ($carts as $cart)
        <div class="cart-block cart-block-item clearfix">
            <div class="image">
                <a href="{{ route('pages.product_detail', $cart->id) }}"><img src="{{ asset('images/products/' . $cart->options->image) }}" alt="" /></a>
            </div>
            <div class="title">
                <div><a href="{{ route('pages.product_detail', $cart->id) }}">{{ $cart->name }}</a></div>
                <small>Green corner</small>
            </div>
            <div class="quantity">
                <input type="number" data-url="{{ route('carts.update_quantity') }}" data-id="{{ $cart->rowId }}" value="{{ $cart->qty }}" class="form-control form-quantity item-quantity" min="1" max="9"/>
            </div>
            <div class="price">
                <span class="final">{{ number_format($cart->options->final_price) }} ₫</span>
                <span class="discount">{{ number_format($cart->options->sale_price) }} ₫</span>
            </div>
            <!--delete-this-item-->
            <span class="icon icon-cross icon-delete delete-cart-item" data-url="{{ route('carts.delete_cart_item', $cart->id) }}"></span>
        </div>
    @endforeach
{{-- </div>

<hr /> --}}

<!--cart final price -->
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
<input id="quantity-cart" type="number" value="{{ Cart::count() ? $quantity : 0 }}" hidden>

<script>
    $('.delete-cart-item').on('click', function () {
        var urlRequest = $(this).data('url');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: urlRequest,
            type: "GET",
            // success: function(data) {
            //     alert(data.message)
            // },
            // error: function(data) {
            //     console.log(data);
            // }
        }).done(function (response) {
            $('#change-item-cart').empty();
            $('#change-cart').empty();
            $('#change-item-cart').html(response);
            $('#change-cart').html(response);
            $('#total-quantity-show').text($('#quantity-cart').val());
            alertify.success('Xóa thành công!');
        })
    });

    $('.item-quantity').on('change', function () {
        var urlRequest = $(this).data('url');
        var rowId = $(this).data('id');
        var quantity = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: urlRequest,
            type: "GET",
            data: {
                'rowId': rowId,
                'quantity': quantity
            }
        }).done(function (response) {
            $('#change-item-cart').empty();
            $('#change-cart').empty();
            $('#change-item-cart').html(response);
            $('#change-cart').html(response);
            $('#total-quantity-show').text($('#quantity-cart').val());
            alertify.success('Cập nhật thành công!');
        })
    });
</script>
