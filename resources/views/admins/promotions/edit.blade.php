@extends('admins.layouts.main')

@section('content')
 <!-- Add or Edit Product Start -->
 <div class="add-edit-product-wrap col-12">

    <div class="add-edit-product-form">
        <form method="POST" action="{{ route('promotions.store') }}" enctype="multipart/form-data">
            <h4 class="title">Thêm khuyến mãi</h4>
            @csrf
            <div class="row">
                <div class="col-lg-6 col-12 mb-30">
                    <input name="name" class="form-control @error('name') border border-danger @enderror" type="text" placeholder="Tên khuyến mãi">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <input name="price" class="form-control @error('price') border border-danger @enderror" type="text" placeholder="Giảm giá">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Loại khuyến mại</h6>
                    <select name="promotion_method" class="form-control select2 @error('promotion_method') border border-danger @enderror">
                        <option value="1">Theo phần trăm</option>
                        <option value="0">Theo giá tiền</option>
                    </select>
                    @error('promotion_method')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Thời gian khuyến mãi</h6>
                    <div class="input-group">
                        <input type="text" class="form-control input-date-time promotion-reservation" name="promotion_date">
                    </div>
                </div>
                 <!--Multiple Select-->
                 <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Áp dụng cho các sản phẩm trong danh mục</h6>
                    <select name="categories[]" class="form-control select2" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!--Multiple Select-->
                <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Status</h6>
                    <select name="status" class="form-control select2 @error('status') border border-danger @enderror">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Vô hiệu hóa</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Button Group Start -->
            <div class="row">
                <div class="d-flex flex-wrap justify-content-end col mbn-10">
                    <button type="submit" class="button button-outline button-primary mb-10 ml-10 mr-0" >Thêm mới</button>
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
    <script src="{{ asset('backend/assets/js/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/daterangepicker/daterangepicker.active.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/inputmask/bootstrap-inputmask.js') }}"></script>
    <!-- Plugins & Activation JS For Only This Page -->
    <script src="{{ asset('backend/assets/js/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/select2/select2.active.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/nice-select/niceSelect.active.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/bootstrap-select/bootstrapSelect.active.js') }}"></script>
    <script>
        $(function () {
            $('.promotion-reservation').daterangepicker({
                autoApply: true,
                minDate: moment()
            });
        });
    </script>
@endsection
