@extends('admin-page.index')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{route('store.slider')}}">
                @csrf
                <h2>Add new Slider</h2>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Menu Level 1:</label>
                    <select class="form-select" id="menu" name="menu">
                        <option value="">--Chọn--</option>
                        @if (isset($menu))
                            @foreach ($menu as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->menu1 }}
                                </option>
                            @endforeach
                        @endif
                    </select>
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
