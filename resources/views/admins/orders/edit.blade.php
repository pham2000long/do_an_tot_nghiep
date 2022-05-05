@extends('admins.layouts.main')

@section('content')
<div class="add-edit-product-wrap col-12">

    <div class="add-edit-product-form">
        <form method="POST" action="{{ route('orders.update', $order->id) }}" enctype="multipart/form-data">
            <h4 class="title">Sửa thông tin đơn hàng</h4>
            @csrf
            <div class="row">
                <div class="col-lg-6 col-12 mb-30">
                    <input name="name" class="form-control @error('name') border border-danger @enderror" type="text"
                        value="{{ old('name', isset($order) ? $order->name : '') }}"
                        placeholder="Tên khách">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <input name="phone" class="form-control @error('phone') border border-danger @enderror" type="text"
                        value="{{ old('phone', isset($order) ? $order->phone : '') }}"
                        placeholder="Số điện thoại">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <input name="email" class="form-control @error('email') border border-danger @enderror" type="text"
                        value="{{ old('email', isset($order) ? $order->email : '') }}"
                        placeholder="Email">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <input name="address" class="form-control @error('address') border border-danger @enderror" type="text"
                        value="{{ old('address', isset($order) ? $order->address : '') }}"
                        placeholder="Địa chỉ">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <h6 class="mb-15">Trạng thái</h6>
                    @switch($order->status)
                        @case(0)
                            <select name="status" class="form-control select2 @error('status') border border-danger @enderror">
                                <option value="0">Chờ xác nhận</option>
                                <option value="1">Chờ lấy hàng</option>
                                <option value="2">Đang giao</option>
                                <option value="3">Đã giao</option>
                                <option value="4">Đã hủy</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @break

                        @case(1)
                            <select name="status" class="form-control select2 @error('status') border border-danger @enderror">
                                <option value="0" disabled>Chờ xác nhận</option>
                                <option value="1">Chờ lấy hàng</option>
                                <option value="2">Đang giao</option>
                                <option value="3">Đã giao</option>
                                <option value="4">Đã hủy</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @break

                        @case(2)
                            <select name="status" class="form-control select2 @error('status') border border-danger @enderror">
                                <option value="0" disabled>Chờ xác nhận</option>
                                <option value="1" disabled>Chờ lấy hàng</option>
                                <option value="2">Đang giao</option>
                                <option value="3">Đã giao</option>
                                <option value="4">Đã hủy</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @break
                        @case(3)
                            <select name="status" class="form-control select2 @error('status') border border-danger @enderror">
                                <option value="0" disabled>Chờ xác nhận</option>
                                <option value="1" disabled>Chờ lấy hàng</option>
                                <option value="2" disabled>Đang giao</option>
                                <option value="3">Đã giao</option>
                                <option value="4">Đã hủy</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @break
                    @endswitch
                </div>
            </div>

            <!-- Button Group Start -->
            <div class="row">
                <div class="d-flex flex-wrap justify-content-end col mbn-10">
                    <button type="submit" class="button button-outline button-primary mb-10 ml-10 mr-0" >Lưu</button>
                </div>
            </div><!-- Button Group End -->

        </form>
    </div>

</div><!-- Add or Edit Product End -->
@endsection
