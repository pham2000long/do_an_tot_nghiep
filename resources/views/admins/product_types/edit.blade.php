@extends('admins.layouts.main')

@section('content')
 <!-- Add or Edit Product Start -->
 <div class="add-edit-product-wrap col-12">

    <div class="add-edit-product-form">
        <form method="POST" action="{{ route('productTypes.update', $productType->id) }}" enctype="multipart/form-data">
            <h4 class="title">Sửa loại sản phẩm</h4>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Tên loại sản phẩm</h6>
                    <input name="name" class="form-control @error('name') border border-danger @enderror" type="text"
                        value="{{ old('name', isset($productType) ? $productType->name : '') }}"
                        placeholder="Tên danh mục">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Tên danh mục</h6>
                    <select name="category_id" class="form-control select2 @error('category_id') border border-danger @enderror">
                        @if ($categories)
                            @foreach ($categories as $category)
                                <option {{ $productType->category_id == $category->id ? 'checked' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                 <!--Default Uploader Start-->
                 <div class="col-12 mb-30">
                    <h6 class="mb-15">Hình ảnh</h6>
                    <input class="dropify @error('image') border border-danger @enderror" type="file" name="image"
                        data-default-file="{{ asset('/images/product_types/'. $productType->image)}}">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input hidden type="text" name="thumb_current" value="{{ $productType->image }}">
                </div>
                <!--Default Uploader End-->
                <div class="col-12 mb-30">
                    <h6 class="mb-15">Mô tả</h6>
                    <textarea name="description"
                        class="form-control @error('description') border border-danger @enderror">{{ isset($productType) ? $productType->description : ''}}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Button Group Start -->
            <div class="row">
                <div class="d-flex flex-wrap justify-content-end col mbn-10">
                    <button type="submit" class="button button-outline button-primary mb-10 ml-10 mr-0" >Cập nhật</button>
                </div>
            </div><!-- Button Group End -->

        </form>
    </div>

</div><!-- Add or Edit Product End -->


@endsection
@section('js')
    <!-- Plugins & Activation JS For Only This Page -->
    <script src="{{ asset('backend/assets/js/plugins/filepond/filepond.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/filepond/filepond-plugin-image-exif-orientation.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/filepond/filepond-plugin-image-preview.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/filepond/filepond.active.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/dropify/dropify.active.js')}}"></script>
@endsection
