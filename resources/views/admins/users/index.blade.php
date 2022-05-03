@extends('admins.layouts.main', ['title' => 'Danh sách tài khoản'])

@section('content')
    <div class="col-12 mb-30">
        <div class="table-responsive">
            <div class="card-header">
                <a href="{{ route('promotions.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>
            <table class="table table-bordered mb-0" id="data_table">
                <thead>
                <tr>
                    <th>#STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Số tài khoản</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td width="3%">{{ $key + 1 }}</td>
                        <td width="8%">
                            <img src="{{ !empty($user->avatar) ? asset('images/avatars/'.$user->avatar) : asset('images/avatars/user.jpg') }}"
                                 alt="{{ $user->name }}"
                                 class="product-image rounded-circle"
                                 style="width: 100%; height: auto;"
                            >
                        </td>
                        <td>{{ $user->name }}</td>
                        <td width="20%">{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td width="30%">{{ $user->address }}</td>
                        <td width="8%">
                            <div class="adomx-checkbox-radio-group">
                                <label class="adomx-switch">
                                    <input disabled class="switch-status"  type="checkbox" {{ $user->active ? 'checked' : '' }}>
                                    <i class="lever"></i>
                                </label>
                            </div>
                        </td>
                        <td width="8%">
                            <div class="table-action-buttons">
                                <a class="button button-box button-xs button-info" href="{{ route('users.profile', $user->id) }}"><i class="zmdi zmdi-eye"></i></a>
                                @if ($user->active === 1)
                                    <button data-url="{{ route('users.destroy', $user->id) }}" class="delete button button-box button-xs button-danger sweetalert sweetalert-delete-temp"><i class="zmdi zmdi-delete"></i></button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Plugins & Activation JS For Only This Page -->
    <script src="{{ asset('backend/assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/sweetalert/sweetalert.active.js') }}"></script>
    <script src="{{ asset('backend/admin/main.js') }}"></script>
@endsection
