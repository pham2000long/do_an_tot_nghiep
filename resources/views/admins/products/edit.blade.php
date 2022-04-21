@extends('admins.layouts.main')

@section('css')
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/css/fileinput.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/themes/explorer-fa/theme.css" rel="stylesheet">
    <link href="{{ asset('backend/assets//select2/select2.min.css') }}" rel="stylesheet" />
    <style rel="stylesheet" type="text/css">
        .select2-selection__choice {
            background-color: #000000 !important;
        }
        .select2-selection__choice__remove {
            background-color: #000000 !important;
        }
    </style>
@endsection

@section('content')
    <div class="col-12 mb-30">
        <div class="box">
            <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="box-head">
                    <h3 class="title">Sửa sản phẩm</h3>
                </div>
                <div class="box-body">
                    <div class="row mbn-20">
                        <!--Form Field-->
                        <div class="col-lg-4 col-12 mb-20">

                            <h6 class="mb-15">Ảnh sản phẩm</h6>

                            <div class="row mbn-15">
                                <div class="col-12 mb-15">
                                    <input name="image"
                                        class="dropify @error('image') border border-danger @enderror"
                                        data-default-file="{{ asset('/images/products/'. $product->image)}}"
                                        type="file">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" name="thumb_current" value="{{ $product->image }}">
                                </div>
                            </div>
                        </div>
                        <!--Form Field-->

                        <!--Readonly Field-->
                        <div class="col-lg-8 col-12 mb-20">

                            <h6 class="mb-15">Thông tin sản phẩm</h6>

                            <div class="row mbn-15">
                                <div class="col-6 mb-15">
                                    <select name="category_id"
                                        class="form-control select2 @error('category_id') border border-danger @enderror">
                                        <option value="">-- Chọn danh mục --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-15">
                                    <select name="product_type_id"
                                        class="form-control select2 @error('product_type_id') border border-danger @enderror">
                                        <option value="">-- Chọn loại sản phẩm --</option>
                                        @foreach ($productTypes as $productType)
                                            <option value="{{ $productType->id }}" {{ $product->product_type_id == $productType->id ? 'selected' : '' }}>{{ $productType->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_type_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-15">
                                    <select name="supplier_id"
                                        class="form-control select2 @error('supplier_id') border border-danger @enderror">
                                        <option value="">-- Chọn nhà cung cấp --</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-15">
                                    <input name="name" class="form-control @error('name') border border-danger @enderror"
                                        type="text" placeholder="Tên sản phẩm" value="{{ $product->name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-15">
                                    <input name="sku_code"
                                        class="form-control @error('sku_code') border border-danger @enderror" type="text"
                                        placeholder="Mã sku" value="{{ $product->sku_code }}">
                                    @error('sku_code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6 mb-15">
                                    <input name="size" class="form-control @error('size') border border-danger @enderror"
                                        type="text" placeholder="Size" value="{{ $product->size }}">
                                    @error('size')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-15">
                                    <select name="status"
                                        class="form-control select2 @error('status') border border-danger @enderror">
                                        <option value="1" {{ $product->status ? 'checked' : '' }}>Active</option>
                                        <option value="0" {{ $product->status ? 'checked' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-15">
                                    <input name="import_price" class="form-control @error('import_price') border border-danger @enderror"
                                        type="text" placeholder="Giá nhập" value="{{ $product->import_price }}">
                                    @error('import_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-15">
                                    <input name="sale_price" class="form-control @error('sale_price') border border-danger @enderror"
                                        type="text" placeholder="Giá bán" value="{{ $product->sale_price }}">
                                    @error('sale_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-15">
                                    <h6 class="mb-15">Nhập tags sản phẩm</h6>
                                    <select class="form-control tags_select2_choose" multiple="multiple" name="tags[]">
                                        @foreach ($product->tags as $tagItem)
                                            <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <p class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                                Thông tin chi tiết sản phẩm
                            </p>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="box-body card-body table-border-style">
                                <div id="product_details">
                                    @foreach($product->productDetails as $product_detail)
                                        <div class="field-group">
                                            <div class="box box-solid box-default" style="margin-bottom: 5px;">
                                                <div class="box-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="box-tools float-right">
                                                                <button class="btn btn-box-tool delete-product-detail" title="Remove"><i class="fa fa-times"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-body card-body table-border-style">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-control">
                                                                <label for="color_{{ $product_detail->id }}">Màu Sắc <span class="text-red">*</span></label>
                                                                <input type="text" name="old_product_details[{{ $product_detail->id }}][color]" class="form-control color" id="color_{{ $product_detail->id }}"
                                                                    value="{{ $product_detail->color }}"
                                                                    placeholder="Màu sắc" required autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-control">
                                                                <label for="quantity_new0">Số Lượng <span class="text-red">*</span></label>
                                                                <input type="number" min="1" name="old_product_details[{{ $product_detail->id }}][quantity]" class="form-control" id="quantity_{{ $product_detail->id }}" placeholder="Số lượng" required="" autocomplete="off" value="{{ $product_detail->quantity }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-control">
                                                        <label>Hình Ảnh Chi Tiết <span class="text-red">*</span></label>
                                                        <input type="file" name="old_product_details[{{ $product_detail->id }}][images][]" class="product-detail-{{ $product_detail->id }}-images" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center box-footer mt-5">
                                    <button class="add btn btn-success" type="none">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm Màu Sắc Sản Phẩm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <ul class="nav nav-tabs mb-15">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Mô tả</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#insurance">Bảo hành</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description">
                                <textarea name="description" class="summernote form-control @error('description') border border-danger @enderror"
                                    placeholder="Product Description*">{!! $product->description !!}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="tab-pane fade" id="insurance">
                                <textarea name="insurance" class="summernote form-control @error('insurance') border border-danger @enderror"
                                    placeholder="Product Insurance*">{!! $product->insurance !!}</textarea>
                                @error('insurance')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-foot">
                    <div class="row">
                        <div class="d-flex flex-wrap justify-content-end col mbn-10">
                            <button type="submit"
                                class="button button-outline button-primary mb-10 ml-10 mr-0">Cập nhật</button>
                        </div>
                    </div><!-- Button Group End -->
                </div>
            </form>
        </div>
    </div>
    <!--Form controls End-->
@endsection

@section('js')
    <!-- Plugins & Activation JS For Only This Page -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.15/tinymce.min.js"></script>
    <script src="{{ asset('backend/assets/js/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/dropify/dropify.active.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/fileinput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/themes/explorer-fa/theme.js"></script>
    <script src="{{ asset('backend/assets/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/summernote/summernote.active.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/quill/quill.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/quill/quill.active.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.repeatable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/admin/product/add.js') }}"></script>

    <script type="text/template" id="product-detail">
        <div class="field-group">
            <div class="box box-solid box-default" style="margin-bottom: 5px;">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-tools float-right">
                                <button class="btn btn-box-tool delete-product-detail" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body card-body table-border-style">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-control">
                                <label for="color_{?}">Màu Sắc <span class="text-red">*</span></label>
                                <input type="text" name="product_details[{?}][color]" class="form-control color" id="color_{?}" placeholder="Màu sắc" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-control">
                                <label for="quantity_{?}">Số Lượng <span class="text-red">*</span></label>
                                <input type="number" min="1" name="product_details[{?}][quantity]" class="form-control" id="quantity_{?}" placeholder="Số lượng" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-control">
                        <label>Hình Ảnh Chi Tiết <span class="text-red">*</span></label>
                        <input type="file" name="product_details[{?}][images][]" class="product-detail-images" multiple>
                    </div>
                </div>
            </div>
        </div>
    </script>
    <script type="text/javascript">
        $(function() {
            $("#product_details").repeatable({
                addTrigger: 'button.add',
                deleteTrigger: 'button.delete-product-detail',
                template: "#product-detail",
                afterAdd:function () {
                    $(".product-detail-images").fileinput({
                        theme: "explorer-fa",
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
                }
            });
            @if ($product->productDetails->count())
                @foreach ($product->productDetails as $productDetail)
                    $(".product-detail-{{ $productDetail->id }}-images").fileinput({
                        theme: "explorer-fa",
                        showUpload: false,
                        showCaption: false,
                        showClose: false,
                        maxFileCount: 8,
                        allowedFileExtensions: ['jpg', 'png', 'gif'],
                        initialPreviewAsData: true,
                        maxFileSize: 1000,
                        overwriteInitial: false,
                        removeFromPreviewOnError: true,
                        deleteUrl: "{{ route('product.product_detail.delete_image') }}",
                        ajaxDeleteSettings: {
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                        },
                        @if($product_detail->productImages->count())
                            initialPreview: [
                                @foreach ($product_detail->productImages as $productImage)
                                    '{{ \Helper\ThumbHelper::get_image_product_url($productImage->name) }}',
                                @endforeach
                            ],
                            initialPreviewConfig: [
                                @foreach ($product_detail->productImages as $productImage)
                                    { caption: "{{ $productImage->name }}", key: {{ $productImage->id }} },
                                @endforeach
                            ],
                        @endif
                    });
                @endforeach
            @endif
        });
    </script>
    <script src="{{ asset('backend/assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('backend/admin/product/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/daterangepicker/daterangepicker.active.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/inputmask/bootstrap-inputmask.js') }}">
@endsection
