@extends('admins.layouts.main')

@section('content')
 <div class="add-edit-product-wrap col-12">

    <div class="add-edit-product-form">
        <form method="POST" action="{{ route('suppliers.update', $supplier->id) }}">
            <h4 class="title">Sửa nhà cung cấp</h4>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-12 mb-30">
                    <input name="name" class="form-control @error('name') border border-danger @enderror" type="text"
                        value="{{ old('name', isset($supplier) ? $supplier->name : '') }}"
                        placeholder="Tên nhà cung cấp">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <input name="address" class="form-control @error('address') border border-danger @enderror" type="text"
                        value="{{ old('address', isset($supplier) ? $supplier->address : '') }}"
                        placeholder="Địa chỉ">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <input name="phone" class="form-control @error('phone') border border-danger @enderror" type="text"
                        value="{{ old('phone', isset($supplier) ? $supplier->phone : '') }}"
                        placeholder="Số điện thoại">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <input name="email" class="form-control @error('email') border border-danger @enderror" type="text"
                        value="{{ old('email', isset($supplier) ? $supplier->email : '') }}"
                        placeholder="Email">
                    @error('email')
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
