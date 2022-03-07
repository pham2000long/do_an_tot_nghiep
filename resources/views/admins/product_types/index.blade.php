@extends('admins.layouts.main')

@section('css')
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/furniture-icons.css') }}" />
@endsection
@section('content')
    <!-- Invoice List Start -->
    <div class="col-12 mb-30">
        <div class="table-responsive">
            <div class="card-header">
                <a href="{{ route('productTypes.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>
            <table class="table table-bordered mb-0" id="productType_table">

                <!-- Table Head Start -->
                <thead>
                    <tr>
                        <th>#STT</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Icon</th>
                        <th>Hành động</th>
                    </tr>
                </thead><!-- Table Head End -->

                <!-- Table Body Start -->
                <tbody>
                    @foreach ($productTypes as $key => $productType)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $productType->name }}</td>
                        <td>{{ $productType->description }}</td>
                        <td>
                            <i class="{{ $productType->icon }}" style="font-size:150px;"></i>
                        </td>
                        <td>
                            <div class="table-action-buttons">
                                {{-- <a class="view button button-box button-xs button-primary" href="invoice-details.html"><i class="zmdi zmdi-more"></i></a> --}}
                                <a class="edit button button-box button-xs button-info" href="{{ route('productTypes.edit', $productType->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                <button data-id="{{ $productType->id }}" class="delete button button-box button-xs button-danger sweetalert sweetalert-basic"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody><!-- Table Body End -->

            </table>
        </div>
    </div><!-- Invoice List End -->
@endsection
@section('js')
<!-- Plugins & Activation JS For Only This Page -->
<script src="{{ asset('backend/assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugins/sweetalert/sweetalert.active.js') }}"></script>
    <script>
        $('.sweetalert-basic').on('click', function(){
            swal({
                title: "Bạn có chắc muốn xóa?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var productType_id = $(this).data('id');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        dataType: "JSON",
                        url: "{{ route('productTypes.index')}}/" + productType_id,
                        success: function(data) {
                            console.log(data.success)
                        }
                    });
                    swal("Bạn đã xóa ProductType thành công!", {
                        icon: "success",
                    });
                    location.reload();
                } else {
                    swal("ProductType của bạn vẫn được an toàn");
                }
            });
        });
    </script>
@endsection

