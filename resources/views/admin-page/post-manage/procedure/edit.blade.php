@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('admin.update.home', $post->id) }}">
                @csrf
                @method('PUT')
                <h2>Update Post</h2>
                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Menu Level 2:</label>
                    <select class="form-select" id="menu_child" name="menu_child">
                        <option value="">--Chọn--</option>
                        @if (isset($menu_child))
                            @foreach ($menu_child as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('menu2_id', $post->menu2_id == $item->id) ? 'selected' : '' }}>
                                    {{ $item->menu2 }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}"
                        placeholder="Enter Title">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Meta Description:</label>
                    <textarea name="description" class="tinymce" id="tinymce">{{ $post->meta_description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="content1" class="form-label">Content 1:</label>
                    <textarea name="content1" class="tinymce" id="tinymce">{{ $post->content1 }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="content2" class="form-label">Content2:</label>
                    <textarea name="content2" class="tinymce" id="tinymce">{{ $post->content2 }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="content3" class="form-label">Content3:</label>
                    <textarea name="content3" class="tinymce" id="tinymce">{{ $post->content3 }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image">Current Image:</label>
                            <img src="{{ asset($post->image) }}" alt="" width="100px" class="img-thumbnail">
                </div>

                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Update Post</button>
            </form>
        </div>
    </div>
@endsection
