@extends('admin-page.index')
@section('admin')
    <div class="row d-flex justify-content-center align-items-center bg-light h-100">
        <div class="card p-3" style="width: 50%; height: 300px">
            <form class="{{route('admin.update.level2', $menu2->id)}}" method="post">
                @csrf
                @method('PUT')
                <h2>Update new Menu</h2>

                <div class="mb-3 mt-3">
                    <select name="menu_id" id="" class="form-select">
                        <option>-- Chọn --</option>
                        @if (isset($menu_level1))
                            @foreach ($menu_level1 as $item)
                            <option value="{{$item->id}}"
                                {{old("menu_id", $menu_child->menu1_id == $item->id)? 'selected' : ''}}>
                                {{$item->menu_parent}}
                            </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="menu2" class="form-label">Menu Level 2 Name:</label>
                    <input type="text" class="form-control" id="menu2" name="menu2_update" value="{{$menu_child->menu_child}}">
                </div>

                <button type="submit" class="btn btn-primary">Add Menu</button>
            </form>
        </div>
    </div>
@endsection
