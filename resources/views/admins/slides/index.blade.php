@extends('admins.layouts.main')

@section('content')
    <!-- Invoice List Start -->
    <div class="col-12 mb-30">
        <div class="table-responsive">
            <div class="card-header">
                <a href="{{ route('slides.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>
            <table class="table table-bordered mb-0" id="slide_table">

                <!-- Table Head Start -->
                <thead>
                    <tr>
                        <th>#STT</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Ảnh</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead><!-- Table Head End -->

                <!-- Table Body Start -->
                <tbody>
                    @foreach ($slides as $key => $slide)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $slide->name }}</td>
                        <td>{{ $slide->description }}</td>
                        <td>
                            <img src="{{ asset('storage/uploads/slides/'.$slide->image) }}" height="150" width="300">
                        </td>
                        <td>
                            <div class="adomx-checkbox-radio-group">
                                <label class="adomx-switch">
                                    <input data-id="{{ $slide->id }}" class="switch-status"  type="checkbox" {{ $slide->status ? 'checked' : '' }}>
                                    <i class="lever"></i>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="table-action-buttons">
                                {{-- <a class="view button button-box button-xs button-primary" href="invoice-details.html"><i class="zmdi zmdi-more"></i></a> --}}
                                <a class="edit button button-box button-xs button-info" href="{{ route('slides.edit', $slide->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                <button data-id="{{ $slide->id }}" class="delete button button-box button-xs button-danger sweetalert sweetalert-basic"><i class="zmdi zmdi-delete"></i></button>
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
        $(document).ready(function() {
            $("#slide_table").DataTable();
        })

        $(function() {
            $('.switch-status').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var slide_id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    data: {
                        'id': slide_id,
                        'status': status
                    },
                    dataType: "JSON",
                    url: "{{ route('slide.updateStatus') }}",
                    success: function(data) {
                        alert(data.success)
                    },
                    error: function(data) {
                        alert(data.error)
                    }
                })
            })
        })
    </script>
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
                    var slide_id = $(this).data('id');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        dataType: "JSON",
                        url: "{{ route('slides.index')}}/" + slide_id,
                        success: function(data) {
                            console.log(data.success)
                        }
                    });
                    swal("Bạn đã xóa slide thành công!", {
                        icon: "success",
                    });
                    location.reload();
                } else {
                    swal("Slide của bạn vẫn được an toàn");
                }
            });
        });
    </script>
@endsection
