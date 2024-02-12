@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{route('admin.update.post', $post->id)}}">
                @csrf
                @method('PUT')
                <h2>Edit Post</h2>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Thuộc về danh mục:</label>
                    <select class="form-select" id="menu_child" name="category">
                        <option value="">--Chọn--</option>
                        @if (isset($cates))
                            @foreach ($cates as $item)
                                @if ($item->parent_id == 0)
                                    <option value=" {{ $item->id  }}"
                                        {{ old('category', $post->menu_id) == $item->id ? ' selected' : '' }}>
                                        {{ $item->name }}
                                    </option>

                                    @foreach ($cates as $itemChild)
                                        @if ($itemChild->parent_id == $item->id)
                                            <option value=" {{ $itemChild->id  }}"
                                                {{ old('category', $post->menu_id) == $itemChild->id ? ' selected' : '' }}>
                                                 -- {{ $itemChild->name }}
                                            </option>

                                            @foreach ($cates as $itemChild2)
                                                @if ($itemChild2->parent_id == $itemChild->id)
                                                    <option value=" {{ $itemChild2->id  }}"
                                                        {{ old('category', $post->menu_id) == $itemChild2->id ? ' selected' : '' }}>
                                                        -- -- {{ $itemChild2->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="currentBanner">Current Banner:</label>
                    <img src="{{asset($post->banner)}}" width="100px" alt="" class="img-thumbnail">
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
                    value="{{$post->title}}" placeholder="Enter Title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Meta Description:</label>
                    <textarea name="description" class="tinymce" id="tinymce">
                        {{$post->description}}
                    </textarea>
                    @error('description')
                        <div class="text-danger pt-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="appendix" class="form-label">Appendix: (bài viết này hiển thị lên các box xanh)</label>
                    <textarea name="appendix" class="tinymce" id="tinymce">{{$post->appendix}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea style="resize: none" rows="30" name="content" class="form-control tinymce">
                        {{$post->content}}
                    </textarea>
                </div>

                <div class="mb-3">
                    <label for="currentImage">Current Image:</label>
                    <img src="{{asset($post->image)}}" width="100px" class="img-thumbnail" alt="">
                </div>

                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Edit Post</button>
            </form>
        </div>
    </div>

    <script src="{{asset('js/confirm-reload.js')}}"></script>
@endsection


