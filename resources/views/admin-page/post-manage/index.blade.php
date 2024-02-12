@extends('admin-page.index')
@section('admin')
    @if (isset($categories))
        @foreach ($categories as $item_cates)
            <div class="row pb-5">
                <div class="card bg-light text-dark" style="width: 100%; height: auto; overflow: hidden">
                    <div class="card-title d-flex justify-content-between align-items-center px-3"
                        style="background: #c9e6c0; height: 50px; color: black">
                        <h3 class="m-0 text-center font-weight-bold">Bài viết danh mục {{ $item_cates->name }}</h3>
                    </div>

                    <div class="card-body d-block">
                        @if (isset($post_inf))
                            <table class="display text-dark example" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>STT</th>
                                        <th>Banner</th>
                                        <th>Status Banner</th>
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
                                    @foreach ($post_inf as $key => $item)
                                        @foreach ($item as $itemPost)
                                            @if ($itemPost->menu1 == $item_cates->name)
                                                <tr>
                                                    <td>
                                                        <input type="submit" value="-" data-id="{{ $itemPost->id }}"
                                                            data-url="{{ route('decrease.stt.post') }}" class="decrease"
                                                            style="background: transparent; border: none">
                                                        <span class="stt"
                                                            data-item-id="{{ $itemPost->id }}">{{ $itemPost->stt }}</span>
                                                        <input type="submit" value="+" data-id="{{ $itemPost->id }}"
                                                            data-url="{{ route('increase.stt.post') }}" class="increase"
                                                            style="background: transparent; border: none">
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset($itemPost->banner) }}" alt=""
                                                            width="100px" class="img-thumbnail">
                                                    </td>
                                                    <td style="width: 100px">
                                                        <input type="checkbox" name="" class="status_banner"
                                                            data-id="{{ $itemPost->id }}"
                                                            data-url="{{ route('show.banner.page') }}"
                                                            value="{{ $itemPost->status_banner }}"
                                                            @if ($itemPost->status_banner == 'Public') checked @endif> Public
                                                    </td>
                                                    <td>{{ $itemPost->menu2 }}</td>
                                                    <td>{{ $itemPost->menu3 }}</td>
                                                    <td class="text-truncate" style="max-width: 150px">
                                                        {{ $itemPost->title }}</td>
                                                    <td>
                                                        <img src="{{ asset($itemPost->image) }}" alt=""
                                                            style="width: 100px" class="img-thumbnail">
                                                    </td>
                                                    <td style="width: 150px">
                                                        <input type="checkbox" name="" class="status_home"
                                                            data-id="{{ $itemPost->id }}"
                                                            data-url="{{ route('show.post.home') }}"
                                                            value="{{ $itemPost->status_home }}"
                                                            @if ($itemPost->status_home == 'Show Home') checked @endif> Show Home
                                                    </td>
                                                    <td style="width: 150px">
                                                        <input type="checkbox" name="" class="status_page"
                                                            data-id="{{ $itemPost->id }}"
                                                            data-url="{{ route('show.post.page') }}"
                                                            value="{{ $itemPost->status_page }}"
                                                            @if ($itemPost->status_page == 'Public Page') checked @endif> Public Page
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.edit.post', $itemPost->id) }}"
                                                            class="btn btn-success btn-sm rounded-0" type="button"
                                                            data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin.delete.post', $itemPost->id) }}"
                                                            class="btn btn-danger btn-sm rounded-0" type="button"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
