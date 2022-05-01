@extends('admins.layouts.main')

@section('content')
    <!-- Invoice List Start -->
    <div class="col-12 mb-30">
        <div class="table-responsive">
            <div class="card-header">
                <a href="{{ route('promotions.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>
            <table class="table table-bordered mb-0" id="data_table">
                <!-- Table Head Start -->
                <thead>
                    <tr>
                        <th>#STT</th>
                        <th>Tên khuyến mãi</th>
                        <th>Giảm giá</th>
                        <th>Loại khuyến mãi</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead><!-- Table Head End -->

                <!-- Table Body Start -->
                <tbody>
                    @foreach ($promotions as $key => $promotion)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $promotion->name }}</td>
                        @if($promotion->promotion_method)
                            <td>{{ $promotion->price . ' %' }}</td>
                        @else
                            <td>{{ $promotion->price . ' VND' }}</td>
                        @endif
                        @if($promotion->promotion_method)
                            <td>Phần trăm</td>
                        @else
                            <td>Giá tiền</td>
                        @endif
                        <td>
                            <div class="adomx-checkbox-radio-group">
                                <label class="adomx-switch">
                                    <input data-url="{{ route('promotion.updateStatus') }}" data-id="{{ $promotion->id }}" class="switch-status"  type="checkbox" {{ $promotion->status ? 'checked' : '' }}>
                                    <i class="lever"></i>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="table-action-buttons">
                                {{-- <a class="view button button-box button-xs button-primary" href="invoice-details.html"><i class="zmdi zmdi-more"></i></a> --}}
                                <a class="edit button button-box button-xs button-info" href="{{ route('promotions.edit', $promotion->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                <button data-url="{{ route('promotions.destroy', $promotion->id) }}" class="delete button button-box button-xs button-danger sweetalert sweetalert-delete"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody><!-- Table Body End -->
            </table>
            <div class="card-footer">
               {!! $promotions->links() !!}
            </div>
        </div>
    </div><!-- Invoice List End -->
@endsection
@section('js')
<!-- Plugins & Activation JS For Only This Page -->
<script src="{{ asset('backend/assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugins/sweetalert/sweetalert.active.js') }}"></script>
<script src="{{ asset('backend/admin/main.js') }}"></script>
<script src="{{ asset('backend/admin/changeStatus.js') }}"></script>
@endsection
