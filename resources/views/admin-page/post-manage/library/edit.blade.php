@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('update.lib', $post->id) }}">
                @csrf
                @method('PUT')
                <h2>Update Post</h2>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Menu Child:</label>
                    <select class="form-select" id="menu_child" name="menu_child">
                        <option value="">--Chọn--</option>
                        @if (isset($menu))
                            @foreach ($menu as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('menu2', $post->menu2_id == $item->id) ? 'selected' : '' }}>
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
                    <label for="appendix" class="form-label">Appendix: (bài viết này hiển thị lên các box xanh)</label>
                    <textarea name="appendix" class="tinymce" id="tinymce">{{$post->appendix}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea name="content" class="tinymce" id="tinymce">{{ $post->content }}</textarea>
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
