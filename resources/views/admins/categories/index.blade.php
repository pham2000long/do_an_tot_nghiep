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
            <table class="table table-bordered mb-0" id="data_table">

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
                    @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <i class="{{ $category->icon }}" style="font-size:150px;"></i>
                        </td>
                        <td>
                            <div class="table-action-buttons">
                                {{-- <a class="view button button-box button-xs button-primary" href="invoice-details.html"><i class="zmdi zmdi-more"></i></a> --}}
                                <a class="edit button button-box button-xs button-info" href="{{ route('categories.edit', $category->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                <button data-url="{{ route('categories.destroy', $category->id) }}" class="delete button button-box button-xs button-danger sweetalert sweetalert-delete"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody><!-- Table Body End -->
            </table>
            <div class="card-footer">
                {{ $categories->links() }}
            </div>
        </div>
    </div><!-- Invoice List End -->
@endsection
@section('js')
<!-- Plugins & Activation JS For Only This Page -->
<script src="{{ asset('backend/assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugins/sweetalert/sweetalert.active.js') }}"></script>
<script src="{{ asset('backend/admin/main.js') }}"></script>
@endsection

