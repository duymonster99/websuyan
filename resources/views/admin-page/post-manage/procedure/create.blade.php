@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{route('admin.store.home')}}">
                @csrf
                <h2>Add Post</h2>

                <div class="mb-3 mt-3">
                    <label for="stt" class="form-label">STT: </label>
                    <input type="number" class="form-control" id="stt" name="stt">
                </div>

                <div class="mb-3 mt-3">
                    <input type="hidden" name="menu_parent" value="1">
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
