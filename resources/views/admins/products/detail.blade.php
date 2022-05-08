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
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Số lượng nhập</th>
                            <th>Số lượng còn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($product->productDetails) > 0)
                            @foreach ($product->productDetails as $key => $productDetail)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $productDetail->color }}</td>
                                    <td>{{ $productDetail->import_quantity }}</td>
                                    <td>{{ $productDetail->quantity }}</td>
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
