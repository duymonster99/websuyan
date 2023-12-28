@extends('admin-page.index')
@section('admin')
    <div class="row">
        <div class="card bg-light text-dark" style="width: 100%; height: auto; overflow: hidden">
            <div class="card-title d-flex justify-content-between align-items-center px-3"
                style="background: #c9e6c0; height: 50px; color: black">
                <h3 class="m-0 text-center font-weight-bold">Quản lý Banner</h3>
                <a href="{{ route('admin.create.home') }}" class="btn btn-primary">Thêm image</a>
            </div>

            <div class="card-body d-block">
                <table class="display text-dark example" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Menu Cấp 1</th>
                            <th>Menu Cấp 2</th>
                            <th>Menu Cấp 3</th>
                            <th>Image</th>
                            <th>Status Page</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($slider_home))
                            @foreach ($slider_home as $item)
                                <tr>
                                    <td>
                                        <input type="submit" value="-" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.decrease.proc') }}" class="decrease"
                                            style="background: transparent; border: none">
                                        <span class="stt-slider-home" data-item-id="{{ $item->id }}">{{ $item->stt }}</span>
                                        <input type="submit" value="+" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.increase.proc') }}" class="increase"
                                            style="background: transparent; border: none">
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" alt="" style="width: 100px">
                                    </td>
                                    <td style="width: 150px">
                                        <select class="form-select status_page bg-light" data-id="{{ $item->id }}"
                                            data-url="{{ route('post.proc.page') }}">
                                            <option value="{{ $item->status }}">{{ $item->status }}</option>
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
@endsection
