@extends('pages.users.main')

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
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orders->count())
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->order_code }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>
                                        @switch($order->status)
                                            @case(0)
                                                <span class="badge badge-warning">Chờ xác nhận</span>
                                                @break

                                            @case(1)
                                                <span class="badge badge-secondary">Chờ lấy hàng</span>
                                                @break

                                            @case(2)
                                            <span class="badge badge-primary">Đang giao</span>
                                                @break
                                            @case(3)
                                            <span class="badge badge-success">Đã giao</span>
                                                @break
                                            @case(4)
                                            <span class="badge badge-danger">Đã hủy</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <div class="table-action-buttons">
                                            <a class="view button button-box button-xs button-primary" href="{{ route('users.orders.detail', $order->id) }}"><i class="zmdi zmdi-more"></i></a>
                                            @if (!in_array($order->status, [1, 2, 3, 4]))
                                                <a class="edit button button-box button-xs button-info" href="{{ route('users.orders.edit', $order->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            @endif
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

<!-- Plugins & Activation JS For Only This Page -->
<script src="{{ asset('backend/assets/js/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugins/datatables/datatables.active.js') }}"></script>
@endsection
