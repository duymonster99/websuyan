@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('update.slider', $slider->id) }}">
                @csrf
                @method('PUT')
                <h2>Update Slider</h2>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Menu Child:</label>
                    <select class="form-select" id="menu" name="menu">
                        <option value="">--Chọn--</option>
                        @if (isset($menu))
                            @foreach ($menu as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('menu', $slider->menu1_id == $item->id) ? 'selected' : '' }}>
                                    {{ $item->menu1 }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image">Current Image:</label>
                    <img src="{{ asset($slider->image) }}" alt="" width="100px" class="img-thumbnail">
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
