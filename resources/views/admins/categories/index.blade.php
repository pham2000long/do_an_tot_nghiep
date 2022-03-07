@extends('admins.layouts.main')

@section('css')
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/furniture-icons.css') }}" />
@endsection
@section('content')
    <!-- Invoice List Start -->
    <div class="col-12 mb-30">
        <div class="table-responsive">
            <div class="card-header">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>
            <table class="table table-bordered mb-0" id="category_table">

                <!-- Table Head Start -->
                <thead>
                    <tr>
                        <th>#STT</th>
                        <th>Loại nội thất</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead><!-- Table Head End -->

                <!-- Table Body Start -->
                <tbody>
                    @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->productType->name }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <div class="table-action-buttons">
                                {{-- <a class="view button button-box button-xs button-primary" href="invoice-details.html"><i class="zmdi zmdi-more"></i></a> --}}
                                <a class="edit button button-box button-xs button-info" href="{{ route('categories.edit', $category->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                <button data-id="{{ $category->id }}" class="delete button button-box button-xs button-danger sweetalert sweetalert-basic"><i class="zmdi zmdi-delete"></i></button>
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
                    var category_id = $(this).data('id');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        dataType: "JSON",
                        url: "{{ route('categories.index')}}/" + category_id,
                        success: function(data) {
                            console.log(data.success)
                        }
                    });
                    swal("Bạn đã xóa category thành công!", {
                        icon: "success",
                    });
                    location.reload();
                } else {
                    swal("category của bạn vẫn được an toàn");
                }
            });
        });
    </script>
@endsection

