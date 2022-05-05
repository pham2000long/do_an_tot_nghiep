@extends('admins.layouts.main')

@section('content')
<!-- Add or Edit Product Start -->
<div class="add-edit-product-wrap col-12">

    <div class="add-edit-product-form">
        <form method="POST" action="{{ route('slides.update', $slide->id) }}" enctype="multipart/form-data">
            <h4 class="title">Update Slide</h4>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-12 mb-30">
                    <input name="name" class="form-control @error('name') border border-danger @enderror" type="text"
                        value="{{ old('name', isset($slide) ? $slide->name : '') }}"
                        placeholder="Slide Name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <input name="link" class="form-control @error('link') border border-danger @enderror" type="text"
                        value="{{ old('link', isset($slide) ? $slide->link : '') }}"
                        placeholder="Slide Link">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!--Default Uploader Start-->
                <div class="col-12 mb-30">
                    <h6 class="mb-15">Image</h6>
                    <input class="dropify @error('image') border border-danger @enderror" type="file" name="image"
                        data-default-file="{{ asset('/images/slides/'. $slide->image)}}">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input hidden type="text" name="thumb_current" value="{{ $slide->image }}">
                </div>
                <!--Default Uploader End-->
                <div class="col-12 mb-30">
                    <textarea name="description" class="form-control @error('description') border border-danger @enderror"
                    placeholder="Product Description*">{{ $slide->description ? $slide->description : ''}}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Status</h6>
                    <select name="status" class="form-control select2 @error('status') border border-danger @enderror">
                        <option value="1" {{ $slide->status ? 'checked' : '' }}>Active</option>
                        <option value="0" {{ !$slide->status ? 'checked' : '' }}>Inactive</option>
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
    <script src="{{ asset('backend/assets/js/plugins/filepond/filepond.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/filepond/filepond-plugin-image-exif-orientation.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/filepond/filepond-plugin-image-preview.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/filepond/filepond.active.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/plugins/dropify/dropify.active.js')}}"></script>
@endsection
