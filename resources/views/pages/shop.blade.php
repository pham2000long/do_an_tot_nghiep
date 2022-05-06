@extends('pages.layouts.main')

@section('content')
        <!-- ======================== Main header ======================== -->

        <section class="main-header" style="background-image:url({{ asset('images/slides/slides_hwkHRZOeAYll8Di9bxG0ss.jpg') }})">
            <header>
                <div class="container">
                    <h1 class="h2 title">Shop</h1>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href="{{ route('home.index') }}"><span class="icon icon-home"></span></a></li>
                        <li><a href="{{ route('pages.shop') }}">Tất cả sản phẩm</a></li>
                    </ol>
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
                            <a href="#">
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

                <header class="hidden">
                    <h3 class="h3 title">Product category grid</h3>
                </header>

                <div class="row">

                    <!-- === product-filters === -->

                    <div class="col-md-3 col-xs-12">

                        <div id="filters" class="filters">
                            <!--Price-->
                            <div class="filter-box active">
                                <div class="title">Price</div>
                                <div class="filter-content">
                                    <div class="price-filter">
                                        <input type="text" id="range-price-slider" value="" name="range" />
                                    </div>
                                </div>
                            </div>
                            <!--Discount-->
                            <div class="filter-box active">
                                <div class="title">
                                    Discount
                                </div>
                                <div class="filter-content">
                                    <span class="checkbox">
                                        <input type="radio" id="price-all" name="group-dicount" value="" checked="checked">
                                        <label for="price-all">All</label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" id="price-discount" name="group-dicount" value=".price-discount">
                                        <label for="price-discount">Discount price</label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" id="price-discounts" name="group-dicount" value=".price-x">
                                        <label for="price-discounts">Discount price</label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" id="price-regular" name="group-dicount" value=".price-regular">
                                        <label for="price-regular">Regular price</label>
                                    </span>
                                </div>
                            </div> <!--/filter-box-->
                            <!--Type-->
                            <div class="filter-box active">
                                <div class="title">
                                    Type
                                </div>
                                <div class="filter-content">
                                    <span class="checkbox">
                                        <input type="radio" name="group-type" id="category-all" value="" checked="checked">
                                        <label for="category-all">All <i>(1200)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="group-type" id="category-sofa" value=".category-sofa">
                                        <label for="category-sofa">Sofa <i>(1200)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="group-type" id="category-armchair" value=".category-armchair">
                                        <label for="category-armchair">Armchairs <i>(12)</i></label>
                                    </span>
                                </div>
                            </div> <!--/filter-box-->
                            <!--Material-->
                            <div class="filter-box active">
                                <div class="title">
                                    Material
                                </div>
                                <div class="filter-content">
                                    <span class="checkbox">
                                        <input type="radio" id="material-all" name="group-material" value="" checked="checked">
                                        <label for="material-all">All <i>(12)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" id="material-leather" name="group-material" value=".material-leather">
                                        <label for="material-leather">Leather <i>(12)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" id="material-wood" name="group-material" value=".material-wood">
                                        <label for="material-wood">Wood <i>(80)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" id="material-metal" name="group-material" value=".material-metal">
                                        <label for="material-metal">Metal <i>(80)</i></label>
                                    </span>
                                </div>
                            </div> <!--/filter-box-->
                            <!--close filters on mobile / update filters-->
                            <div class="toggle-filters-close btn btn-main visible-xs visible-sm">
                                Close window
                            </div>

                        </div> <!--/filters-->
                    </div>

                    <!--product items-->

                    <div class="col-md-9 col-xs-12">

                        <div id="products" class="row">

                            <!-- === product-item === -->

                            @if($products->count())
                    @foreach ($products as $product)
                        <div class="col-md-4 col-xs-6">
                            <article>
                                <div class="info">
                                    <span class="add-favorite added">
                                        <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                    </span>
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



                        </div><!--/row-->

                    </div> <!--/product items-->

                </div><!--/row-->
                <!-- ========================  Product info popup - quick view ======================== -->

                <div class="popup-main mfp-hide" id="productid1">

                    <!-- === product popup === -->

                    <div class="product">

                        <!-- === popup-title === -->

                        <div class="popup-title">
                            <div class="h1 title">Laura <small>product category</small></div>
                        </div>

                        <!-- === product gallery === -->

                        <div class="owl-product-gallery">
                            <img src="assets/images/product-1.png" alt="" width="640" />
                            <img src="assets/images/product-2.png" alt="" width="640" />
                            <img src="assets/images/product-3.png" alt="" width="640" />
                            <img src="assets/images/product-4.png" alt="" width="640" />
                        </div>

                        <!-- === product-popup-info === -->

                        <div class="popup-content">
                            <div class="product-info-wrapper">
                                <div class="row">

                                    <!-- === left-column === -->

                                    <div class="col-sm-6">
                                        <div class="info-box">
                                            <strong>Maifacturer</strong>
                                            <span>Brand name</span>
                                        </div>
                                        <div class="info-box">
                                            <strong>Materials</strong>
                                            <span>Wood, Leather, Acrylic</span>
                                        </div>
                                        <div class="info-box">
                                            <strong>Availability</strong>
                                            <span><i class="fa fa-check-square-o"></i> in stock</span>
                                        </div>
                                    </div>

                                    <!-- === right-column === -->

                                    <div class="col-sm-6">
                                        <div class="info-box">
                                            <strong>Available Colors</strong>
                                            <div class="product-colors clearfix">
                                                <span class="color-btn color-btn-red"></span>
                                                <span class="color-btn color-btn-blue checked"></span>
                                                <span class="color-btn color-btn-green"></span>
                                                <span class="color-btn color-btn-gray"></span>
                                                <span class="color-btn color-btn-biege"></span>
                                            </div>
                                        </div>
                                        <div class="info-box">
                                            <strong>Choose size</strong>
                                            <div class="product-colors clearfix">
                                                <span class="color-btn color-btn-biege">S</span>
                                                <span class="color-btn color-btn-biege checked">M</span>
                                                <span class="color-btn color-btn-biege">XL</span>
                                                <span class="color-btn color-btn-biege">XXL</span>
                                            </div>
                                        </div>
                                    </div>

                                </div><!--/row-->
                            </div> <!--/product-info-wrapper-->
                        </div><!--/popup-content-->
                        <!-- === product-popup-footer === -->

                        <div class="popup-table">
                            <div class="popup-cell">
                                <div class="price">
                                    <span class="h3">$ 1999,00 <small>$ 2999,00</small></span>
                                </div>
                            </div>
                            <div class="popup-cell">
                                <div class="popup-buttons">
                                    <a href="product.html"><span class="icon icon-eye"></span> <span class="hidden-xs">View more</span></a>
                                    <a href="javascript:void(0);"><span class="icon icon-cart"></span> <span class="hidden-xs">Buy</span></a>
                                </div>
                            </div>
                        </div>

                    </div> <!--/product-->
                </div> <!--popup-main-->
            </div><!--/container-->
        </section>
@endsection
