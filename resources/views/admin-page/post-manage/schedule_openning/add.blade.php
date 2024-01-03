@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{route('store.sche')}}">
                @csrf
                <h2>Add new Post</h2>
                <div class="mb-3">
                    <label for="image">Banner:</label>
                    <input type="file" class="form-control" id="image" name="image_banner">
                </div>

                <div class="mb-3 mt-3">
                    <input type="hidden" name="menu_parent" value="3">
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
                    <label for="appendix" class="form-label">Appendix: (Nội dung dành cho box xanh)</label>
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
