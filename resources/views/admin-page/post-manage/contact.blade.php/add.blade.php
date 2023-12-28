@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{route('admin.store.project')}}">
                @csrf
                <h2>Add new Post</h2>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Menu Parent:</label>
                    <select class="form-select" id="category" name="menu_parent">
                        <option value="">--Chọn--</option>
                        @if (isset($menu_parent))
                            @foreach ($menu_parent as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->menu_parent }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Menu Child:</label>
                    <select class="form-select" id="menu_child" name="menu_child">
                        <option value="">--Chọn--</option>
                        @if (isset($menu_child))
                            @foreach ($menu_child as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->menu_child }}
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
                    <label for="content" class="form-label">Content:</label>
                    <textarea name="content" class="tinymce" id="tinymce">{{old('content')}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="images">Image:</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                </div>

                <div class="mb-3">
                    <label for="status">Status:</label>
                    <select class="form-select" id="status" name="status">
                        <option>--Chọn--</option>
                        <option>Show Home</option>
                        <option>Public Page</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Post</button>
            </form>
        </div>
    </div>
@endsection
