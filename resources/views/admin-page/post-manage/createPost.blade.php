<?php
function addMenu($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id) {
            echo '<option value="' . $item->id . '">';
            echo ' ' .$char . $item->name;
            echo '</option>';

            // Xóa chuyên mục đã lặp
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            addMenu($categories, $item->id, $char . '    -- ');
        }
    }
}
?>

@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{route('admin.store.post')}}">
                @csrf
                <h2>Add Post</h2>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Thuộc về danh mục:</label>
                    <select class="form-select" id="menu_child" name="category">
                        <option value="">--Chọn--</option>
                        @if (isset($categories))
                            @php
                                addMenu($categories)
                            @endphp
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image">Banner:</label>
                    <input type="file" class="form-control" id="image" name="banner">
                    @error('banner')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title"
                    value="{{old('title')}}" placeholder="Enter Title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Meta Description:</label>
                    <textarea name="description" class="tinymce" id="tinymce">
                        {{old('description')}}
                    </textarea>
                    @error('description')
                        <div class="text-danger pt-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="appendix" class="form-label">Appendix: (bài viết này hiển thị lên các box xanh)</label>
                    <textarea name="appendix" class="tinymce" id="tinymce">{{old('appendix')}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea style="resize: none" rows="30" name="content" class="form-control" id="ckeditor1">{{old('content')}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Add Post</button>
            </form>
        </div>
    </div>

    <script src="{{asset('js/confirm-reload.js')}}"></script>
@endsection
