@extends('pages.layouts.main')
@section('content')
    <!-- ========================  Header content ======================== -->

    <section class="header-content">

        <div class="owl-slider">
            @if($slides->isNotEmpty())
                @foreach ($slides as $slide)
                    <!-- === slide item === -->
                    @if ($slide->status)
                        <div class="item" style="background-image:url({{ asset('images/slides/' . $slide->image) }})">
                            <div class="box">
                                <div class="container">
                                    <h2 class="title animated h1" data-animation="fadeInDown">{{ $slide->name }}</h2>
                                    <div class="animated" data-animation="fadeInUp">
                                        {{ $slide->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif

        </div> <!--/owl-slider-->
    </section>

    <!-- ========================  Icons slider ======================== -->

    <section class="owl-icons-wrapper owl-icons-frontpage">

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

    <!-- ========================  Products widget ======================== -->

    <section class="products">

        <div class="container">

            <!-- === header title === -->

            <header>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h2 class="title">Sản phẩm mới nhất</h2>
                        <div class="text">
                            <p>Mẫu mã đa dạng</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="row">

                <!-- === product-item === -->
                @if($products->count())
                    @foreach ($products as $product)
                        <div class="col-md-4 col-xs-6">
                            <article>
                                <div class="info">
                                    @if(Auth::user())
                                        <span class="add-favorite {{ $product->favorite ? 'added' : '' }}" data-url="{{ route('product.update_favorite') }}" data-id="{{ $product->id }}">
                                            <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                        </span>
                                    @endif
                                    <span>
                                        <a href="#productid{{ $product->id }}" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                    </span>
                                </div>
                                    <div class="btn btn-add" data-url="{{ route('carts.addCart') }}" data-product="{{ $product }}">
                                        <i class="icon icon-cart"></i>
                                    </div>
                                <div class="figure-grid">
                                    <div class="image">
                                        <a href="#productid{{ $product->id }}" class="mfp-open">
                                            <img src="{{ asset('images/products/' . $product->image) }}" alt="" width="360" height="360"/>
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h2 class="title h4"><a href="{{ route('pages.product_detail', $product->id) }}">{{ $product->name }}</a></h2>
                                        @if (isset($product->promotion) && now()->gte($product->promotion->started_at) && now()->lte($product->promotion->ended_at) && $product->promotion->status)
                                            <sub>{{ number_format($product->sale_price) }} VND</sub>
                                            @if ($product->promotion->promotion_method)
                                                <sup>{{ number_format($product->sale_price - ($product->sale_price * $product->promotion->price) / 100) }} VND</sup>
                                            @else
                                                <sup>{{ number_format(($product->sale_price - $product->promotion->price)) }} VND</sup>
                                            @endif
                                        @else
                                            <sup>{{ number_format($product->sale_price) }} VND</sup>
                                        @endif

                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @endif
            </div> <!--/row-->
            <!-- === button more === -->

            <div class="wrapper-more">
                <a href="{{ route('pages.shop') }}" class="btn btn-main">View store</a>
            </div>

            <!-- ========================  Product info popup - quick view ======================== -->
            @if($products->count())
                @foreach ($products as $product)
                    <div class="popup-main mfp-hide" id="productid{{ $product->id }}">

                        <!-- === product popup === -->

                        <div class="product">

                            <!-- === popup-title === -->

                            <div class="popup-title">
                                <div class="h1 title">{{ $product->name }} <small>{{ $product->category->name }}</small></div>
                            </div>

                            <!-- === product gallery === -->

                            <div class="owl-product-gallery">
                                @if ($product->productImages->count())
                                    @foreach ($product->productImages as $image)
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
                                                <span>{{ $product->supplier->name }}</span>
                                            </div>
                                            {{-- <div class="info-box">
                                                <strong>Materials</strong>
                                                <span>Wood, Leather, Acrylic</span>
                                            </div> --}}
                                            <div class="info-box">
                                                <strong>Tình trạng</strong>
                                                <span>
                                                    {{
                                                        $product->productDetails->filter(function ($productDetail) {
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
                                                @if ($product->productDetails->count())
                                                        <div class="clearfix">
                                                            @foreach ($product->productDetails as $productDetail)
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
                                        {{-- <span class="h3">{{ $product->sale_price }} <small>{{ $product->import_price }}</small></span> --}}

                                        @if (isset($product->promotion) && now()->gte($product->promotion->started_at) && now()->lte($product->promotion->ended_at) && $product->promotion->status)
                                            @if ($product->promotion->promotion_method)
                                                <span class="h3">{{ number_format($product->sale_price - ($product->sale_price * $product->promotion->price) / 100) }} VND<small>{{ number_format($product->sale_price) }} VND</small></span>
                                            @else
                                            <span class="h3">{{ number_format($product->sale_price - $product->promotion->price) }} VND<small>{{ number_format($product->sale_price) }} VND</small></span>
                                            @endif
                                        @else
                                            <span>{{ number_format($product->sale_price) }} VND</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="popup-cell">
                                    <div class="popup-buttons">
                                        <a href="{{ route('pages.product_detail', $product->id) }}"><span class="icon icon-eye"></span> <span class="hidden-xs">View more</span></a>
                                        <a href="javascript:void(0);" class="btn-add" data-url="{{ route('carts.addCart') }}" data-product="{{ $product }}"><span class="icon icon-cart"></span> <span class="hidden-xs">Buy</span></a>
                                    </div>
                                </div>
                            </div>

                        </div> <!--/product-->
                    </div> <!--popup-main-->
                @endforeach
            @endif

        </div> <!--/container-->
    </section>

    <!-- ========================  Stretcher widget ======================== -->

    <section class="stretcher-wrapper">

        <!-- === stretcher header === -->

        <header class="">
            <!--remove class 'hidden'' to show section header -->
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h1 class="h2 title">CÁC DANH MỤC PHỔ BIẾN</h1>
                        <div class="text">
                            <p>
                                Cho dù bạn đang thay đổi ngôi nhà của mình, hay chuyển đến một nơi ở mới, bạn sẽ tìm thấy vô số lựa chọn về đồ nội thất phòng khách, nội thất phòng ngủ, nội thất phòng ăn chất lượng và có giá trị tốt nhất tại xưởng nội thất.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- === stretcher === -->

        <ul class="stretcher">

            <!-- === stretcher item === -->
            <?php
                $chunks = $categories->chunk(4);
                $categoryChunks = $chunks[0];
            ?>
            @foreach ($categoryChunks as $category)
                <li class="stretcher-item" style="background-image:url(assets/images/gallery-1.jpg);">
                    <!--logo-item-->
                    <div class="stretcher-logo">
                        <div class="text">
                            <span class="{{ $category->icon }}"></span>
                            <span class="text-intro">{{ $category->name }}</span>
                        </div>
                    </div>
                    <!--main text-->
                    <figure>
                        <h4>{{ $category->description }}</h4>
                        {{-- <figcaption>New furnishing ideas</figcaption> --}}
                    </figure>
                    <!--anchor-->
                    <a href="{{ route('categories.detail', $category->id) }}">Anchor link</a>
                </li>
            @endforeach
        </ul>
    </section>

    <!-- ========================  Blog ======================== -->

    <section class="blog">

        <div class="container">

            <!-- === blog header === -->

            <header>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h1 class="h2 title">Blog</h1>
                        <div class="text">
                            <p>Tin tức mới nhất từ blog</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="row">

                <!-- === blog item === -->

                <div class="col-sm-4">
                    <article>
                        <a href="article.html">
                            <div class="image" style="background-image:url(assets/images/blog-1.jpg)">
                                <img src="assets/images/blog-1.jpg" alt="" />
                            </div>
                            <div class="entry entry-table">
                                <div class="date-wrapper">
                                    <div class="date">
                                        <span>MAR</span>
                                        <strong>08</strong>
                                        <span>2017</span>
                                    </div>
                                </div>
                                <div class="title">
                                    <h2 class="h5">The 3 Tricks that Quickly Became Rules</h2>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-main btn-block">Read more</span>
                            </div>
                        </a>
                    </article>
                </div>

            </div> <!--/row-->
            <!-- === button more === -->

            <div class="wrapper-more">
                <a href="blog-grid.html" class="btn btn-main">View all posts</a>
            </div>

        </div> <!--/container-->
    </section>
@endsection
