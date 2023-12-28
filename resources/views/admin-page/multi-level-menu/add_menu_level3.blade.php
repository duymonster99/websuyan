@extends('admin-page.index')
@section('admin')
    <div class="row d-flex justify-content-center align-items-center bg-light h-100">
        <div class="card p-3" style="width: 50%; height: 300px">
            <form class="{{route('admin.store.level3')}}" method="post">
                @csrf
                <h2>Add new Menu</h2>

                <div class="mb-3 mt-3">
                    <select name="menu_id_3" id="" class="form-select">
                        <option>-- Chọn --</option>
                        @if (isset($menu2))
                            @foreach ($menu2 as $item)
                                <option value="{{$item->id}}" {{ old('menu_id_3') == $item->menu2 ? 'selected' : '' }}>
                                    {{ $item->menu2 }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="menu3" class="form-label">Menu Level 3 Name:</label>
                    <input type="text" class="form-control" id="menu3" name="menu3" placeholder="Enter Menu Level 3">
                </div>

                <button type="submit" class="btn btn-primary">Add Menu</button>
            </form>
        </div>
    </div>
@endsection
