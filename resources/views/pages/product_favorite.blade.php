@extends('pages.layouts.main')

@section('content')
<!-- ======================== Main header ======================== -->

<section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
    <header class="hidden">
        <div class="container">
            <h1 class="h2 title">Sản phẩm yêu thích</h1>
        </div>
    </header>
</section>

<!-- ========================  Icons slider ======================== -->

<section class="owl-icons-wrapper">

    <!-- === header === -->

    <header class="hidden">
        <h2>Product categories</h2>
    </header>

    <div class="container">

        <div class="owl-icons">

            <!-- === icon item === -->
            @if($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <a href="{{ route('categories.detail', $category->id) }}">
                        <figure>
                            <i class="{{ $category->icon }}"></i>
                            <figcaption>{{ $category->name }}</figcaption>
                        </figure>
                    </a>
                @endforeach
            @endif

        </div> <!--/owl-icons-->
    </div> <!--/container-->
</section>

<!-- ======================== Products ======================== -->

<section class="products">
    <div class="container">
        <?php
            $user = Auth::user();
        ?>
        <header class="hidden">
            <h3 class="h3 title">Product category grid</h3>
        </header>

        <div class="row">

            <!--product items-->

            <div class="col-md-9 col-xs-12">

                <div id="products" class="row">

                    <!-- === product-item === -->

                    @if($user->favorites)
                        @foreach ($user->favorites as $favorite)
                            <div class="col-md-4 col-xs-6">
                                <article>
                                    <div class="info">
                                        <span>
                                            <a href="#productid{{ $favorite->product->id }}" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                        </span>
                                    </div>
                                        <div class="btn btn-add" data-url="{{ route('carts.addCart') }}" data-product="{{ $favorite->product }}">
                                            <i class="icon icon-cart"></i>
                                        </div>
                                    <div class="figure-grid">
                                        <div class="image">
                                            <a href="#productid{{ $favorite->product->id }}" class="mfp-open">
                                                <img src="{{ asset('images/products/' . $favorite->product->image) }}" alt="" width="360" height="360"/>
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h2 class="title h4"><a href="{{ route('pages.product_detail', $favorite->product->id) }}">{{ $favorite->product->name }}</a></h2>
                                            @if (isset($favorite->product->promotion) && now()->gte($favorite->product->promotion->started_at) && now()->lte($favorite->product->promotion->ended_at) && $favorite->product->promotion->status)
                                                <sub>{{ number_format($favorite->product->sale_price) }} VND</sub>
                                                @if ($favorite->product->promotion->promotion_method)
                                                    <sup>{{ number_format($favorite->product->sale_price - ($favorite->product->sale_price * $favorite->product->promotion->price) / 100) }} VND</sup>
                                                @else
                                                    <sup>{{ number_format(($favorite->product->sale_price - $favorite->product->promotion->price)) }} VND</sup>
                                                @endif
                                            @else
                                                <sup>{{ number_format($favorite->product->sale_price) }} VND</sup>
                                            @endif

                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif

                </div><!--/row-->

            </div> <!--/product items-->

        </div><!--/row-->
        <!-- ========================  Product info popup - quick view ======================== -->
        @if($user->favorites)
        @foreach ($user->favorites as $favorite)
            <div class="popup-main mfp-hide" id="productid{{ $favorite->product->id }}">

                <!-- === product popup === -->

                <div class="product">

                    <!-- === popup-title === -->

                    <div class="popup-title">
                        <div class="h1 title">{{ $favorite->product->name }} <small>{{ $favorite->product->category->name }}</small></div>
                    </div>

                    <!-- === product gallery === -->

                    <div class="owl-product-gallery">
                        @if ($favorite->product->productImages->count())
                            @foreach ($favorite->product->productImages as $image)
                                <img src="{{ asset('images/product_images/' . $image->name) }}" alt="" width="640" />
                            @endforeach
                        @endif
                    </div>

                    <!-- === product-popup-info === -->

                    <div class="popup-content">
                        <div class="product-info-wrapper">
                            <div class="row">

                                <!-- === left-column === -->

                                <div class="col-sm-6">
                                    <div class="info-box">
                                        <strong>Thương hiệu</strong>
                                        <span>{{ $favorite->product->supplier->name }}</span>
                                    </div>
                                    <div class="info-box">
                                        <strong>Tình trạng</strong>
                                        <span>
                                            {{
                                                $favorite->product->productDetails->filter(function ($productDetail) {
                                                    return $productDetail->quantity > 0;
                                                }) ? 'Còn hàng' : 'Hết hàng'
                                            }}
                                        </span>
                                    </div>
                                </div>

                                <!-- === right-column === -->

                                <div class="col-sm-6">
                                    <div class="info-box">
                                        <strong>Màu sắc</strong>
                                        @if ($favorite->product->productDetails->count())
                                                <div class="clearfix">
                                                    @foreach ($favorite->product->productDetails as $productDetail)
                                                    <span class="checkbox checkbox-inline checkbox-color">
                                                        <input type="radio" id="product_detail_{{ $productDetail->id }}" name="product_detail" value="{{ $productDetail->id }}" checked="checked">
                                                        <label for="product_detail_{{ $productDetail->id }}">
                                                            <strong>{{ $productDetail->color }}</strong>
                                                        </label>
                                                    </span>
                                                    @endforeach
                                                </div>
                                        @endif
                                    </div>
                                </div>

                            </div> <!--/row-->
                        </div> <!--/product-info-wrapper-->
                    </div> <!--/popup-content-->
                    <!-- === product-popup-footer === -->

                    <div class="popup-table">
                        <div class="popup-cell">
                            <div class="price">
                                {{-- <span class="h3">{{ $favorite->product->sale_price }} <small>{{ $favorite->product->import_price }}</small></span> --}}

                                @if (isset($favorite->product->promotion) && now()->gte($favorite->product->promotion->started_at) && now()->lte($favorite->product->promotion->ended_at) && $favorite->product->promotion->status)
                                    @if ($favorite->product->promotion->promotion_method)
                                        <span class="h3">{{ number_format($favorite->product->sale_price - ($favorite->product->sale_price * $favorite->product->promotion->price) / 100) }} VND<small>{{ number_format($favorite->product->sale_price) }} VND</small></span>
                                    @else
                                    <span class="h3">{{ number_format($favorite->product->sale_price - $favorite->product->promotion->price) }} VND<small>{{ number_format($favorite->product->sale_price) }} VND</small></span>
                                    @endif
                                @else
                                    <span>{{ number_format($favorite->product->sale_price) }} VND</span>
                                @endif
                            </div>
                        </div>
                        <div class="popup-cell">
                            <div class="popup-buttons">
                                <a href="{{ route('pages.product_detail', $favorite->product->id) }}"><span class="icon icon-eye"></span> <span class="hidden-xs">View more</span></a>
                                <a href="javascript:void(0);" class="btn-add" data-url="{{ route('carts.addCart') }}" data-product="{{ $favorite->product }}"><span class="icon icon-cart"></span> <span class="hidden-xs">Buy</span></a>
                            </div>
                        </div>
                    </div>

                </div> <!--/product-->
            </div> <!--popup-main-->
        @endforeach
    @endif
    </div><!--/container-->
</section>
@endsection
