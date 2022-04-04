@extends('admins.layouts.main')

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
    <link href="{{ asset('backend/upload_file/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/upload_file/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
 <!-- Add or Edit Product Start -->
 <div class="add-edit-product-wrap col-12">

    <div class="add-edit-product-form">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            <h4 class="title">Thêm sản phẩm</h4>
            @csrf
            <div class="row">
                <div class="col-lg-6 col-12 mb-30">
                    <input name="name" class="form-control @error('name') border border-danger @enderror" type="text" placeholder="Tên sản phẩm">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <input name="link" class="form-control @error('link') border border-danger @enderror" type="text" placeholder="Slide Link">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!--Default Uploader Start-->
                <div class="col-12 mb-30">
                    <h6 class="mb-15">Image</h6>
                    <div class="file-loading">
                        <input id="file-0a" name="images[]" class="file" type="file" multiple  accept="image" data-theme="fas">
                    </div>
                    {{-- <input name="imageFiles[]" class="dropify @error('image') border border-danger @enderror" type="file" name="image" multiple>
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror --}}
                </div>
                <!--Default Uploader End-->
                <div class="col-12 mb-30">
                    <h6 class="mb-15">Mô tả</h6>
                    <textarea name="description" class="summernote form-control @error('description') border border-danger @enderror" placeholder="Product Description*"></textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Status</h6>
                    <select name="status" class="form-control select2 @error('status') border border-danger @enderror">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Button Group Start -->
            <div class="row">
                <div class="d-flex flex-wrap justify-content-end col mbn-10">
                    <button type="submit" class="button button-outline button-primary mb-10 ml-10 mr-0" >Save</button>
                </div>
            </div><!-- Button Group End -->

        </form>
    </div>

</div><!-- Add or Edit Product End -->


@endsection

@section('js')
    <!-- Plugins & Activation JS For Only This Page -->
    <script src="{{ asset('backend/assets/js/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/dropify/dropify.active.js') }}"></script>
    <script src="{{ asset('backend/upload_file/js/plugins/piexif.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/upload_file/js/plugins/sortable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/upload_file/js/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/upload_file/js/locales/es.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/upload_file/themes/fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/upload_file/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/summernote/summernote.active.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/quill/quill.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/quill/quill.active.js') }}"></script>
    <script type="text/javascript">
        $("#file-0a").fileinput({
            required: true,
            showUpload: false,
            showCaption: false,
            showClose: false,
            maxFileCount: 8,
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            initialPreviewAsData: true,
            maxFileSize: 1000,
            overwriteInitial: false,
            removeFromPreviewOnError: true,
        });
    </script>
@endsection
