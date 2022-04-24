@extends('pages.layouts.main')

@section('content')
        <!-- ======================== Main header ======================== -->

        <section class="main-header" style="background-image:url(assets/images/gallery-3.jpg)">
            <header>
                <div class="container">
                    <h1 class="h2 title">Shop</h1>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                        <li><a href="category.html">Product Category</a></li>
                        <li><a class="active" href="products-grid.html">Product Sub-category</a></li>
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

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-sofa"></i>
                            <figcaption>Sofa</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-armchair"></i>
                            <figcaption>Armchairs</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-chair"></i>
                            <figcaption>Chairs</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-dining-table"></i>
                            <figcaption>Dining tables</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-media-cabinet"></i>
                            <figcaption>Media storage</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-table"></i>
                            <figcaption>Tables</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-bookcase"></i>
                            <figcaption>Bookcase</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-bedroom"></i>
                            <figcaption>Bedroom</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-nightstand"></i>
                            <figcaption>Nightstand</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-children-room"></i>
                            <figcaption>Children room</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-kitchen"></i>
                            <figcaption>Kitchen</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-bathroom"></i>
                            <figcaption>Bathroom</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-wardrobe"></i>
                            <figcaption>Wardrobe</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-shoe-cabinet"></i>
                            <figcaption>Shoe cabinet</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-office"></i>
                            <figcaption>Office</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-bar-set"></i>
                            <figcaption>Bar sets</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-lightning"></i>
                            <figcaption>Lightning</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-carpet"></i>
                            <figcaption>Varpet</figcaption>
                        </figure>
                    </a>

                    <!-- === icon item === -->

                    <a href="#">
                        <figure>
                            <i class="f-icon f-icon-accessories"></i>
                            <figcaption>Accessories</figcaption>
                        </figure>
                    </a>

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

                        <div class="sort-bar clearfix">
                            <div class="sort-results pull-left">
                                <!--Showing result per page-->
                                <select>
                                    <option value="1">10</option>
                                    <option value="2">50</option>
                                    <option value="3">100</option>
                                    <option value="4">All</option>
                                </select>
                                <!--Items counter-->
                                <span>Showing all <strong>50</strong> of <strong>3,250</strong> items</span>
                            </div>
                            <!--Sort options-->
                            <div class="sort-options pull-right">
                                <span class="hidden-xs">Sort by</span>
                                <select id="sort-price">
                                    <option data-option-value="asc">Price: lowest</option>
                                    <option data-option-value="desc">Price: highest</option>
                                </select>
                                <!--Grid-list view-->
                                <span class="grid-list">
                                    <a href="products-grid.html"><i class="fa fa-th-large"></i></a>
                                    <a href="products-list.html"><i class="fa fa-align-justify"></i></a>
                                    <a href="javascript:void(0);" class="toggle-filters-mobile"><i class="fa fa-search"></i></a>
                                </span>
                            </div>
                        </div>

                        <div id="products" class="row">

                            <!-- === product-item === -->

                            <div class="col-md-6 col-xs-6 item price-discount category-sofa material-leather">
                                <article>
                                    <div class="info">
                                        <span class="add-favorite">
                                            <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                        </span>
                                        <span>
                                            <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                        </span>
                                    </div>
                                    <div class="btn btn-add">
                                        <i class="icon icon-cart"></i>
                                    </div>
                                    <div class="figure-grid">
                                        <span class="label">-50%</span>
                                        <div class="image">
                                            <a href="#productid1" class="mfp-open">
                                                <img src="assets/images/product-1.png" alt="" width="360" />
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h2 class="title h4"><a href="product.html">Green corner <small>Sofa</small></a></h2>
                                            <sub>$ 1499,-</sub>
                                            <sup>$ <span class="price">1099</span>,-</sup>
                                            <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                        </div>
                                    </div>
                                </article>
                            </div>

                            <!-- === product-item === -->

                            <div class="col-md-6 col-xs-6 item price-discount category-armchair material-wood">
                                <article>
                                    <div class="info">
                                        <span class="add-favorite">
                                            <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                        </span>
                                        <span>
                                            <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                        </span>
                                    </div>
                                    <div class="btn btn-add">
                                        <i class="icon icon-cart"></i>
                                    </div>
                                    <div class="figure-grid">
                                        <div class="image">
                                            <a href="#productid1" class="mfp-open">
                                                <img src="assets/images/product-2.png" alt="" width="360" />
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h2 class="title h4"><a href="product.html">Laura <small>Armchair</small></a></h2>
                                            <sub>$ 3999,-</sub>
                                            <sup>$ <span class="price">3499</span>,-</sup>
                                            <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                        </div>
                                    </div>
                                </article>
                            </div>

                            <!-- === product-item === -->

                            <div class="col-md-6 col-xs-6 item price-regular category-armchair material-leather">
                                <article>
                                    <div class="info">
                                        <span class="add-favorite">
                                            <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                        </span>
                                        <span>
                                            <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                        </span>
                                    </div>
                                    <div class="btn btn-add">
                                        <i class="icon icon-cart"></i>
                                    </div>
                                    <div class="figure-grid">
                                        <div class="image">
                                            <a href="#productid1" class="mfp-open">
                                                <img src="assets/images/product-3.png" alt="" width="360" />
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h2 class="title h4"><a href="product.html">Nude <small>Armchair</small></a></h2>
                                            <sup>$ <span class="price">2999</span>,-</sup>
                                            <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                        </div>
                                    </div>
                                </article>
                            </div>

                            <!-- === product-item === -->

                            <div class="col-md-6 col-xs-6 item price-regular category-armchair material-wood">
                                <article>
                                    <div class="info">
                                        <span class="add-favorite">
                                            <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                        </span>
                                        <span>
                                            <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                        </span>
                                    </div>
                                    <div class="btn btn-add">
                                        <i class="icon icon-cart"></i>
                                    </div>
                                    <div class="figure-grid">
                                        <span class="label label-warning">New</span>
                                        <div class="image">
                                            <a href="#productid1" class="mfp-open">
                                                <img src="assets/images/product-4.png" alt="" width="360" />
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h2 class="title h4"><a href="product.html">Aurora <small>Armchair</small></a></h2>
                                            <sup>$ <span class="price">299</span>,-</sup>
                                            <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                        </div>
                                    </div>
                                </article>
                            </div>

                            <!-- === product-item === -->

                            <div class="col-md-6 col-xs-6 item price-discount category-armchair material-metal">
                                <article>
                                    <div class="info">
                                        <span class="add-favorite">
                                            <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                        </span>
                                        <span>
                                            <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                        </span>
                                    </div>
                                    <div class="btn btn-add">
                                        <i class="icon icon-cart"></i>
                                    </div>
                                    <div class="figure-grid">
                                        <span class="label label-warning">New</span>
                                        <div class="image">
                                            <a href="#productid1" class="mfp-open">
                                                <img src="assets/images/product-5.png" alt="" width="360" />
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h2 class="title h4"><a href="product.html">Dining set <small>Armchair</small></a></h2>
                                            <sub>$ 1999,-</sub>
                                            <sup>$ <span class="price">1499</span>,-</sup>
                                            <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                        </div>
                                    </div>
                                </article>
                            </div>

                            <!-- === product-item === -->

                            <div class="col-md-6 col-xs-6 item price-regular category-sofa material-wood">
                                <article>
                                    <div class="info">
                                        <span class="add-favorite">
                                            <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                        </span>
                                        <span>
                                            <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                        </span>
                                    </div>
                                    <div class="btn btn-add">
                                        <i class="icon icon-cart"></i>
                                    </div>
                                    <div class="figure-grid">
                                        <div class="image">
                                            <a href="#productid1" class="mfp-open">
                                                <img src="assets/images/product-6.png" alt="" width="360" />
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h2 class="title h4"><a href="product.html">Seat chair <small>Sofa</small></a></h2>
                                            <sup>$ <span class="price">896</span>,-</sup>
                                            <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                        </div>
                                    </div>
                                </article>
                            </div>



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
