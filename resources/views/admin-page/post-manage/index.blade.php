@extends('admin-page.index')
@section('admin')
    <div class="row">
        <div class="card bg-light text-dark" style="width: 100%; height: auto; overflow: hidden">
            <div class="card-title d-flex justify-content-between align-items-center px-3"
                style="background: #c9e6c0; height: 50px; color: black">
                <h3 class="m-0 text-center font-weight-bold">Bài viết danh mục Giới thiệu</h3>
                <a href="{{ route('admin.create.home') }}" class="btn btn-primary">Thêm bài viết</a>
            </div>

            <div class="card-body d-block">
                <table class="display text-dark example" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Menu Level 2</th>
                            <th style="max-width: 150px">Title</th>
                            <th>Image</th>
                            <th style="max-width: 50px">Status Home</th>
                            <th style="max-width: 50px">Status Page</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($post))
                            @foreach ($post as $item)
                                <tr>
                                    <td>
                                        <input type="submit" value="-" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.decrease.proc') }}" class="decrease"
                                            style="background: transparent; border: none">
                                        <span class="stt-proc" data-item-id="{{ $item->id }}">{{ $item->stt }}</span>
                                        <input type="submit" value="+" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.increase.proc') }}" class="increase"
                                            style="background: transparent; border: none">
                                    </td>
                                    <td>{{ $item->menu2 }}</td>
                                    <td class="text-truncate" style="max-width: 150px">{{ $item->title }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" alt="" style="width: 100px">
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_home bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.proc.home') }}">
                                            <option value="{{ $item->status_home }}">{{ $item->status_home }}</option>
                                            <option value="None">None</option>
                                            <option value="Show Home">Show Home</option>
                                        </select>
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_page bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.proc.page') }}">
                                            <option value="{{ $item->status_page }}">{{ $item->status_page }}</option>
                                            <option value="None">None</option>
                                            <option value="Public Page">Public Page</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit.home', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.delete.home', $item->id) }}"
                                            class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
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

    <div class="row pt-5">
        <div class="card bg-light text-dark" style="width: 100%; height: auto; overflow: hidden">
            <div class="card-title d-flex justify-content-between align-items-center px-3"
                style="background: #c9e6c0; height: 50px; color: black">
                <h3 class="m-0 text-center font-weight-bold">Bài viết danh mục Khóa học</h3>
                <a href="{{ route('create.proj') }}" class="btn btn-primary">Thêm bài viết</a>
            </div>

            <div class="card-body d-block">
                <table class="display text-dark example" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Menu Level 2</th>
                            <th>Menu Level 3</th>
                            <th style="max-width: 150px">Title</th>
                            <th>Image</th>
                            <th style="max-width: 50px">Status Home</th>
                            <th style="max-width: 50px">Status Page</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($post_project))
                            @foreach ($post_project as $item)
                                <tr>
                                    <td>
                                        <input type="submit" value="-" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.decrease.proj') }}" class="decrease"
                                            style="background: transparent; border: none">
                                        <span class="stt-proj" data-item-id="{{ $item->id }}">{{ $item->stt }}</span>
                                        <input type="submit" value="+" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.increase.proj') }}" class="increase"
                                            style="background: transparent; border: none">
                                    </td>
                                    <td>{{ $item->menu2 }}</td>
                                    <td>{{ $item->menu3 }}</td>
                                    <td class="text-truncate" style="max-width: 150px">{{ $item->title }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" alt="" style="width: 100px">
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_home bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('status.proj.home') }}">
                                            <option value="{{ $item->status_home }}">{{ $item->status_home }}</option>
                                            <option value="None">None</option>
                                            <option value="Show Home">Show Home</option>
                                        </select>
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_page bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('status.proj.page') }}">
                                            <option value="{{ $item->status_page }}">{{ $item->status_page }}</option>
                                            <option value="None">None</option>
                                            <option value="Public Page">Public Page</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.proj', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delete.proj', $item->id) }}"
                                            class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
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

    <div class="row pt-5">
        <div class="card bg-light text-dark" style="width: 100%; height: auto; overflow: hidden">
            <div class="card-title d-flex justify-content-between align-items-center px-3"
                style="background: #c9e6c0; height: 50px; color: black">
                <h3 class="m-0 text-center font-weight-bold">Bài viết danh mục Khai giảng</h3>
                <a href="{{ route('create.sche') }}" class="btn btn-primary">Thêm bài viết</a>
            </div>

            <div class="card-body d-block">
                <table class="display text-dark example" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th style="max-width: 150px">Title</th>
                            <th>Image</th>
                            <th style="max-width: 150px">Status Home</th>
                            <th style="max-width: 150px">Status Page</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($post_schedule))
                            @foreach ($post_schedule as $item)
                                <tr>
                                    <td>
                                        <input type="submit" value="-" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.decrease.sche') }}" class="decrease"
                                            style="background: transparent; border: none">
                                        <span class="stt-sche" data-item-id="{{ $item->id }}">{{ $item->stt }}</span>
                                        <input type="submit" value="+" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.increase.sche') }}" class="increase"
                                            style="background: transparent; border: none">
                                    </td>
                                    <td class="text-truncate" style="max-width: 150px">{{ $item->title }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" alt="" style="width: 100px">
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_home bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('status.sche.home') }}">
                                            <option value="{{ $item->status_home }}">{{ $item->status_home }}</option>
                                            <option value="None">None</option>
                                            <option value="Show Home">Show Home</option>
                                        </select>
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_page bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('status.sche.page') }}">
                                            <option value="{{ $item->status_page }}">{{ $item->status_page }}</option>
                                            <option value="None">None</option>
                                            <option value="Public Page">Public Page</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.sche', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delete.sche', $item->id) }}"
                                            class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
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

    <div class="row pt-5">
        <div class="card bg-light text-dark" style="width: 100%; height: auto; overflow: hidden">
            <div class="card-title d-flex justify-content-between align-items-center px-3"
                style="background: #c9e6c0; height: 50px; color: black">
                <h3 class="m-0 text-center font-weight-bold">Bài viết danh mục Thư viện</h3>
                <a href="{{ route('create.lib') }}" class="btn btn-primary">Thêm bài viết</a>
            </div>

            <div class="card-body d-block">
                <table class="display text-dark example" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Menu Level 2</th>
                            <th style="max-width: 150px">Title</th>
                            <th>Image</th>
                            <th style="max-width: 150px">Status Home</th>
                            <th style="max-width: 150px">Status Page</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($post_lib))
                            @foreach ($post_lib as $item)
                                <tr>
                                    <td>
                                        <input type="submit" value="-" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.decrease.lib') }}" class="decrease"
                                            style="background: transparent; border: none">
                                        <span class="stt-lib" data-item-id="{{ $item->id }}">{{ $item->stt }}</span>
                                        <input type="submit" value="+" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.increase.lib') }}" class="increase"
                                            style="background: transparent; border: none">
                                    </td>
                                    <td style="max-width: 150px">{{ $item->menu2 }}</td>
                                    <td class="text-truncate" style="max-width: 150px">{{ $item->title }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" alt="" style="width: 100px">
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_home bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('status.lib.home') }}">
                                            <option value="{{ $item->status_home }}">{{ $item->status_home }}</option>
                                            <option value="None">None</option>
                                            <option value="Show Home">Show Home</option>
                                        </select>
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_page bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('status.lib.page') }}">
                                            <option value="{{ $item->status_page }}">{{ $item->status_page }}</option>
                                            <option value="None">None</option>
                                            <option value="Public Page">Public Page</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.lib', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delete.lib', $item->id) }}"
                                            class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
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

    <div class="row pt-5">
        <div class="card bg-light text-dark" style="width: 100%; height: auto; overflow: hidden">
            <div class="card-title d-flex justify-content-between align-items-center px-3"
                style="background: #c9e6c0; height: 50px; color: black">
                <h3 class="m-0 text-center font-weight-bold">Bài viết danh mục Tuyển dụng</h3>
                <a href="{{ route('create.emp') }}" class="btn btn-primary">Thêm bài viết</a>
            </div>

            <div class="card-body d-block">
                <table class="display text-dark example" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th style="max-width: 150px">Title</th>
                            <th>Image</th>
                            <th style="max-width: 150px">Status Home</th>
                            <th style="max-width: 150px">Status Page</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($post_emp))
                            @foreach ($post_emp as $item)
                                <tr>
                                    <td>
                                        <input type="submit" value="-" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.decrease.emp') }}" class="decrease"
                                            style="background: transparent; border: none">
                                        <span class="stt-emp" data-item-id="{{ $item->id }}">{{ $item->stt }}</span>
                                        <input type="submit" value="+" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.increase.emp') }}" class="increase"
                                            style="background: transparent; border: none">
                                    </td>
                                    <td class="text-truncate" style="max-width: 150px">{{ $item->title }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" alt="" style="width: 100px">
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_home bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('status.emp.home') }}">
                                            <option value="{{ $item->status_home }}">{{ $item->status_home }}</option>
                                            <option value="None">None</option>
                                            <option value="Show Home">Show Home</option>
                                        </select>
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_page bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('status.emp.page') }}">
                                            <option value="{{ $item->status_page }}">{{ $item->status_page }}</option>
                                            <option value="None">None</option>
                                            <option value="Public Page">Public Page</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.emp', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delete.emp', $item->id) }}"
                                            class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
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
