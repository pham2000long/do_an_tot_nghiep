@extends('admins.layouts.main')

@section('content')

    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head d-flex justify-content-between">
                <h3 class="title">Xuất dữ liệu</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered data-table data-table-export">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Loại sản phẩm</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Mã sku</th>
                            <th>Size</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products) > 0)
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->productType->name }}</td>
                                    <td>{{ $product->supplier->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <img src="{{ asset('/images/products/' . $product->image) }}" height="150" width="300">
                                    </td>
                                    <td>{{ $product->sku_code }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td>
                                        <div class="adomx-checkbox-radio-group">
                                            <label class="adomx-switch">
                                                <input data-url="{{ route('products.updateStatus') }}" data-id="{{ $product->id }}" class="switch-status"  type="checkbox" {{ $product->status ? 'checked' : '' }}>
                                                <i class="lever"></i>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table-action-buttons">
                                            <a class="view button button-box button-xs button-primary" href="{{ route('products.detail', $product->id) }}"><i class="zmdi zmdi-more"></i></a>
                                            <a class="edit button button-box button-xs button-info" href="{{ route('products.edit', $product->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            <button data-url="{{ route('products.delete', $product->id) }}" class="delete button button-box button-xs button-danger sweetalert sweetalert-delete"><i class="zmdi zmdi-delete"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Export Data Table End-->
@endsection
@section('js')
<!-- Plugins & Activation JS For Only This Page -->
<script src="{{ asset('backend/assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugins/sweetalert/sweetalert.active.js') }}"></script>
<script src="{{ asset('backend/admin/main.js') }}"></script>
<script src="{{ asset('backend/admin/changeStatus.js') }}"></script>

<!-- Plugins & Activation JS For Only This Page -->
<script src="{{ asset('backend/assets/js/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugins/datatables/datatables.active.js') }}"></script>
@endsection
