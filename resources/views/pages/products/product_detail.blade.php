@extends('pages.layouts.main')

@section('content')
 <!-- ========================  Main header ======================== -->

 <section class="main-header" style="background-image:url({{ asset('images/slides/slides_hwkHRZOeAYll8Di9bxG0.jpg') }})">
    <header>
        <div class="container">
            <h1 class="h2 title">{{ $product->name }}</h1>
            <ol class="breadcrumb breadcrumb-inverted">
                <li><a href="{{ route('home.index') }}"><span class="icon icon-home"></span></a></li>
                <li><a href="{{ route('categories.detail', $product->category->id) }}">{{ $product->category->name }}</a></li>
                <li><a href="{{ route('product_types.detail', $product->productType->id) }}">{{ $product->productType->name }}</a></li>
                <li><a class="active" href="{{ route('pages.product_detail', $product->id) }}">{{ $product->name }}</a></li>
            </ol>
        </div>
    </header>
</section>

<!-- ========================  Product ======================== -->

<section class="product">
    <div class="main">
            <div class="container">
                <div class="row product-flex">

                    <!-- product flex is used only for mobile order -->
                    <!-- on mobile 'product-flex-info' goes bellow gallery 'product-flex-gallery' -->

                    <div class="col-md-4 col-sm-12 product-flex-info">
                        <div class="clearfix">

                            <!-- === product-title === -->

                            <h1 class="title" data-title="{{ $product->productType->name }}">{{ $product->name }}</h1>

                            <div class="clearfix">

                                <!-- === price wrapper === -->

                                <div class="price">
                                    @if (isset($product->promotion) && now()->gte($product->promotion->started_at) && now()->lte($product->promotion->ended_at) && $product->promotion->status)
                                        @if ($product->promotion->promotion_method)
                                            <span class="h3">{{ number_format($product->sale_price - ($product->sale_price * $product->promotion->price) / 100) }} VND<small>{{ number_format($product->sale_price) }} VND</small></span>
                                            <input type="hidden" name="price" value="{{ $product->sale_price - ($product->sale_price * $product->promotion->price) / 100 }}">
                                        @else
                                            <span class="h3">{{ number_format($product->sale_price - $product->promotion->price) }} VND<small>{{ number_format($product->sale_price) }} VND</small></span>
                                            <input type="hidden" name="price" value="{{ $product->sale_price - $product->promotion->price }}">
                                        @endif
                                    @else
                                        <span>{{ number_format($product->sale_price) }} VND</span>
                                        <input type="hidden" name="price" value="{{ $product->sale_price }}">
                                    @endif
                                </div>
                                <hr />
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <!-- === info-box === -->

                                <div class="info-box">
                                    <span><strong>Thương hiệu</strong></span>
                                    <span>{{ $product->supplier->name }}</span>
                                </div>

                                <div class="info-box">
                                    <span><strong>Tình trạng</strong></span>
                                    <span>
                                        {{
                                            $product->productDetails->filter(function ($productDetail) {
                                                return $productDetail->quantity > 0;
                                            }) ? 'Còn hàng' : 'Hết hàng'
                                        }}
                                    </span>
                                </div>

                                <hr />

                                <div class="info-box info-box-addto added">
                                    <span><strong>Favourites</strong></span>
                                    <span>
                                        <i class="add"><i class="fa fa-heart-o"></i> Add to favorites</i>
                                        <i class="added"><i class="fa fa-heart"></i> Remove from favorites</i>
                                    </span>
                                </div>

                                <hr />

                                <!-- === info-box === -->

                                <div class="info-box">
                                    <span><strong>Màu sắc</strong></span>
                                    @if ($product->productDetails->count())
                                        <div class="clearfix">
                                            @foreach ($product->productDetails as $productDetail)
                                            <span class="checkbox checkbox-inline">
                                                <input type="radio" id="product_detail_{{ $productDetail->id }}" name="product_detail" value="{{ $productDetail->id }}" checked="checked">
                                                <label for="product_detail_{{ $productDetail->id }}">
                                                    <strong>{{ $productDetail->color }}</strong>
                                                </label>
                                            </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div> <!--/clearfix-->
                        </div> <!--/product-info-wrapper-->
                    </div> <!--/col-md-4-->
                    <!-- === product item gallery === -->

                    <div class="col-md-8 col-sm-12 product-flex-gallery">

                        <!-- === add to cart === -->

                        <button type="submit" class="btn btn-buy btn-add" data-text="Buy" data-url="{{ route('carts.addCart') }}" data-product="{{ $product }}"></button>


                        <!-- === product gallery === -->

                        <div class="owl-product-gallery open-popup-gallery">
                            @if ($product->productImages->count())
                                @foreach ($product->productImages as $image)
                                    {{-- <img src="{{ asset('images/product_images/' . $image->name) }}" alt="" width="640" /> --}}
                                    <a href="{{ asset('images/product_images/' . $image->name) }}"><img src="{{ asset('images/product_images/' . $image->name) }}" alt="" width="640" height="500" /></a>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>
    </div>

    <!-- === product-info === -->

    <div class="info">
        <div class="container">
            <div class="row">

                <!-- === product-designer === -->

                <div class="col-md-4">
                    <div class="designer">
                        <div class="box">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/user-1.jpg') }}" alt="Alternate Text" />
                            </div>
                            <div class="name">
                                <div class="h3 title">Liên hệ <small>với chúng tôi</small></div>
                                <hr />
                                <p><a href="mailto:pham2000long@gmail.com"><i class="icon icon-envelope"></i> pham2000long@gmail.com</a></p>
                                <p><a href="tel:0974469808"><i class="icon icon-phone-handset"></i> 0974469808</a></p>
                                {{-- <p>
                                    <a href="#" class="btn btn-main btn-xs"><i class="icon icon-user"></i></a>
                                    <a href="#" class="btn btn-main btn-xs"><i class="icon icon-printer"></i></a>
                                    <a href="#" class="btn btn-main btn-xs"><i class="icon icon-layers"></i></a>
                                </p> --}}
                            </div> <!--/name-->
                        </div> <!--/box-->
                    </div> <!--/designer-->
                </div> <!--/col-md-4-->
                <!-- === nav-tabs === -->

                <div class="col-md-8">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#designer" aria-controls="designer" role="tab" data-toggle="tab">
                                {{-- <i class="icon icon-user"></i> --}}
                                <span>Có thể bạn cũng thích</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#design" aria-controls="design" role="tab" data-toggle="tab">
                                {{-- <i class="icon icon-sort-alpha-asc"></i> --}}
                                <span>Mô tả sản phẩm</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#insurance" aria-controls="insurance" role="tab" data-toggle="tab">
                                {{-- <i class="icon icon-sort-alpha-asc"></i> --}}
                                <span>Bảo hành</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#rating" aria-controls="rating" role="tab" data-toggle="tab">
                                <i class="icon icon-thumbs-up"></i>
                                <span>Rating</span>
                            </a>
                        </li>
                    </ul>

                    <!-- === tab-panes === -->

                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="designer">
                            <div class="content">

                                <!-- === designer collection title === -->

                                <h3>Designers collection</h3>

                                <div class="products">
                                    <div class="row">

                                        <!-- === product-item === -->

                                        <div class="col-md-6 col-xs-6">
                                            <article>
                                                <div class="figure-grid">
                                                    <div class="image">
                                                        <a href="#productid1" class="mfp-open">
                                                            <img src="{{ asset('frontend/assets/images/product-1.png') }}" alt="" width="360" />
                                                        </a>
                                                    </div>
                                                    <div class="text">
                                                        <h4 class="title"><a href="product.html">Green corner</a></h4>
                                                        <sup>Designer collection</sup>
                                                        <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>

                                    </div> <!--/row-->
                                </div> <!--/products-->
                            </div> <!--/content-->
                        </div> <!--/tab-pane-->
                        <!-- ============ tab #Mô tả sản phẩm ============ -->

                        <div role="tabpanel" class="tab-pane" id="design">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! $product->description !!}
                                    </div>
                                </div> <!--/row-->
                            </div> <!--/content-->
                        </div> <!--/tab-pane-->
                        <!-- ============ tab #Bảo hành ============ -->
                        <div role="tabpanel" class="tab-pane" id="insurance">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! $product->insurance !!}
                                    </div>
                                </div> <!--/row-->
                            </div> <!--/content-->
                        </div> <!--/tab-pane-->
                        <!-- ============ tab #3 ============ -->

                        <div role="tabpanel" class="tab-pane" id="rating">

                            <!-- ============ ratings ============ -->

                            <div class="content">
                                <h3>Rating</h3>

                                <div class="row">

                                    <!-- === comments === -->

                                    <div class="col-md-12">
                                        <div class="comments">

                                            <!-- === rating === -->

                                            <div class="rating clearfix">
                                                <div class="rate-box">
                                                    <strong>Quality</strong>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>3</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>5</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>0</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>2</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>1</span>
                                                    </div>
                                                </div>

                                                <!-- rate -->
                                                <div class="rate-box">
                                                    <strong>Design</strong>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <span>3</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <span>5</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <span>0</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>2</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>1</span>
                                                    </div>
                                                </div>

                                                <!-- rate -->
                                                <div class="rate-box">
                                                    <strong>General</strong>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>3</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>5</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>0</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>2</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>1</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="comment-wrapper">

                                                <!-- === comment === -->

                                                <div class="comment-block">
                                                    <div class="comment-user">
                                                        <div><img src="assets/images/user-2.jpg" alt="Alternate Text" width="70" /></div>
                                                        <div>
                                                            <h5>
                                                                <span>John Doe</span>
                                                                <span class="pull-right">
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </span>
                                                                <small>03.05.2017</small>
                                                            </h5>
                                                        </div>
                                                    </div>

                                                    <!-- comment description -->

                                                    <div class="comment-desc">
                                                        <p>
                                                            In vestibulum tellus ut nunc accumsan eleifend. Donec mattis cursus ligula, id
                                                            iaculis dui feugiat nec. Etiam ut ante sed neque lacinia volutpat. Maecenas
                                                            ultricies tempus nibh, sit amet facilisis mauris vulputate in. Phasellus
                                                            tempor justo et mollis facilisis. Donec placerat at nulla sed suscipit. Praesent
                                                            accumsan, sem sit amet euismod ullamcorper, justo sapien cursus nisl, nec
                                                            gravida
                                                        </p>
                                                    </div>

                                                    <!-- comment reply -->

                                                    <div class="comment-block">
                                                        <div class="comment-user">
                                                            <div><img src="assets/images/user-2.jpg" alt="Alternate Text" width="70" /></div>
                                                            <div>
                                                                <h5>Administrator<small>08.05.2017</small></h5>
                                                            </div>
                                                        </div>
                                                        <div class="comment-desc">
                                                            <p>
                                                                Curabitur sit amet elit quis tellus tincidunt efficitur. Cras lobortis id
                                                                elit eu vehicula. Sed porttitor nulla vitae nisl varius luctus. Quisque
                                                                a enim nisl. Maecenas facilisis, felis sed blandit scelerisque, sapien
                                                                nisl egestas diam, nec blandit diam ipsum eget dolor. Maecenas ultricies
                                                                tempus nibh, sit amet facilisis mauris vulputate in.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!--/reply-->
                                                </div>

                                                <!-- === comment === -->

                                                <div class="comment-block">
                                                    <div class="comment-user">
                                                        <div><img src="assets/images/user-2.jpg" alt="Alternate Text" width="70" /></div>
                                                        <div>
                                                            <h5>
                                                                <span>John Doe</span>
                                                                <span class="pull-right">
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </span>
                                                                <small>03.05.2017</small>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="comment-desc">
                                                        <p>
                                                            Cras lobortis id elit eu vehicula. Sed porttitor nulla vitae nisl varius luctus.
                                                            Quisque a enim nisl. Maecenas facilisis, felis sed blandit scelerisque, sapien
                                                            nisl egestas diam, nec blandit diam ipsum eget dolor. In vestibulum tellus
                                                            ut nunc accumsan eleifend. Donec mattis cursus ligula, id iaculis dui feugiat
                                                            nec. Etiam ut ante sed neque lacinia volutpat. Maecenas ultricies tempus
                                                            nibh, sit amet facilisis mauris vulputate in. Phasellus tempor justo et mollis
                                                            facilisis. Donec placerat at nulla sed suscipit. Praesent accumsan, sem sit
                                                            amet euismod ullamcorper, justo sapien cursus nisl, nec gravida
                                                        </p>
                                                    </div>
                                                </div>

                                            </div><!--/comment-wrapper-->

                                            <div class="comment-header">
                                                <a href="#" class="btn btn-clean-dark">12 comments</a>
                                            </div> <!--/comment-header-->
                                            <!-- === add comment === -->

                                            <div class="comment-add">

                                                <div class="comment-reply-message">
                                                    <div class="h3 title">Leave a Reply </div>
                                                    <p>Your email address will not be published.</p>
                                                </div>

                                                <form action="#" method="post">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" value="" placeholder="Your Name" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" value="" placeholder="Your Email" />
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea rows="10" class="form-control" placeholder="Your comment"></textarea>
                                                    </div>
                                                    <div class="clearfix text-center">
                                                        <a href="#" class="btn btn-main">Add comment</a>
                                                    </div>
                                                </form>

                                            </div><!--/comment-add-->
                                        </div> <!--/comments-->
                                    </div>


                                </div> <!--/row-->
                            </div> <!--/content-->
                        </div> <!--/tab-pane-->
                    </div> <!--/tab-content-->
                </div>
            </div> <!--/row-->
        </div> <!--/container-->
    </div> <!--/info-->
</section>

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
@endsection
