@extends('admins.layouts.main')

@section('content')
 <!-- Add or Edit Product Start -->
 <div class="add-edit-product-wrap col-12">

    <div class="add-edit-product-form">
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            <h4 class="title">Sửa danh mục</h4>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Tên danh mục</h6>
                    <input name="name" class="form-control @error('name') border border-danger @enderror" type="text"
                        value="{{ old('name', isset($category) ? $category->name : '') }}"
                        placeholder="Tên danh mục">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Loại sản phẩm</h6>
                    <select name="product_type_id" class="form-control select2 @error('product_type_id') border border-danger @enderror">
                        @if ($productTypes)
                            @foreach ($productTypes as $productType)
                                <option {{ $category->product_type_id == $productType->id ? 'checked' : '' }}
                                    value="{{ $productType->id }}">{{ $productType->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('product_type_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!--Default Uploader End-->
                <div class="col-12 mb-30">
                    <h6 class="mb-15">Mô tả</h6>
                    <textarea name="description" class="form-control @error('description') border border-danger @enderror"
                        placeholder="Category Description*">{{ isset($category) ? $category->description : ''}}</textarea>
                    @error('description')
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
