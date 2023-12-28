@extends('admin-page.index')
@section('admin')
    <div class="row">
        <div class="card bg-light text-dark" style="width: 100%; height: auto; overflow: hidden">
            <div class="card-title d-flex justify-content-between align-items-center px-3"
                style="background: #c9e6c0; height: 50px; color: black">
                <h3 class="m-0 text-center font-weight-bold">Quản lý tài khoản người dùng</h3>
                {{-- <a href="{{ route('admin.create.home') }}" class="btn btn-primary">Thêm bài viết</a> --}}
            </div>

            <div class="card-body d-block">
                <table class="display text-dark example" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Account Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($account))
                            @foreach ($account as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <select class="form-select status_acc bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('acc.status') }}">
                                            <option value="{{ $item->acc_type }}">{{ $item->acc_type }}</option>
                                            <option value="user">user</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ route('acc.edit', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('acc.del', $item->id) }}"
                                            class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
