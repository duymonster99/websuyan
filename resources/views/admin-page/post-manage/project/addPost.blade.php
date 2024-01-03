@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{route('store.proj')}}">
                @csrf
                <h2>Add new Post</h2>

                <div class="mt-3 mb-3">
                    <label for="">STT</label>
                    <input type="number" name="stt" class="form-control" value="{{old('stt')}}">
                </div>

                <div class="mb-3 mt-3">
                    <input type="hidden" name="menu_parent" value="2">
                </div>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Menu Child:</label>
                    <select class="form-select" id="menu_child" name="menu_child">
                        <option value="">--Chọn--</option>
                        @if (isset($menu_child))
                            @foreach ($menu_child as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->menu2 }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Menu Level 3:</label>
                    <select class="form-select" id="menu_child" name="menu_3">
                        <option value="">--Chọn--</option>
                        @if (isset($menu3))
                            @foreach ($menu3 as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->menu3}}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title"
                    value="{{old('title')}}" placeholder="Enter Title">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Meta Description:</label>
                    <textarea name="description" class="tinymce" id="tinymce">{{old('description')}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="appendix" class="form-label">Appendix: (bài viết này hiển thị lên các box xanh)</label>
                    <textarea name="appendix" class="tinymce" id="tinymce">{{old('appendix')}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea name="content" class="tinymce" id="tinymce">{{old('content')}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Add Post</button>
            </form>
        </div>
    </div>
@endsection
