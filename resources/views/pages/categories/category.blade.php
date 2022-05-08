@extends('pages.layouts.main')

@section('content')
<!-- ========================  Main header ======================== -->

<section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
    <header class="hidden">
        <div class="container">
            <h1 class="h2 title">Category</h1>
        </div>
    </header>
</section>

<!-- ========================  Products ======================== -->

<section class="products">
    <div class="container">

        <header>
            <div class="row">
                <div class="col-md-offset-2 col-md-8 text-center">
                    <h2 class="title">{{ $category->name }}</h2>
                    <div class="text">
                        <p>Chọn {{ $category->name }}</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="row">

            <!-- === product-type-item === -->
            @if ($category->productTypes)
                @foreach ($category->productTypes as $productType)
                    <div class="col-md-4 col-xs-6">
                        <article>
                            <div class="figure-block">
                                <div class="image">
                                    <a href="{{ route('product_types.detail', $productType->id) }}">
                                        <img src="{{ asset('images/product_types/' . $productType->image) }}" alt="" width="360" />
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4"><a href="{{ route('product_types.detail', $productType->id) }}">{{ $productType->name }}</a></h2>
                                    <sup>{{ $category->description }}</sup>
                                    <span class="description clearfix">{{ $productType->description }}</span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            @endif


        </div><!--/row-->

    </div><!--/container-->
</section>
@endsection
