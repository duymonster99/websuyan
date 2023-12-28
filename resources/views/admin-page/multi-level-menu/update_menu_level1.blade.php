@extends('admin-page.index')
@section('admin')
    <div class="row d-flex justify-content-center align-items-center bg-light h-100">
        <div class="card p-3" style="width: 50%; height: 300px">
            <form class="{{route('admin.update.level1', $menu1->id)}}" method="post">
                @csrf
                @method('PUT')
                <h2>Update Menu level 1</h2>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Menu Parent Name:</label>
                    <input type="text" class="form-control" id="menu" name="menu_update" value="{{$menu1->menu1}}">
                </div>

                <button type="submit" class="btn btn-primary">Update Menu</button>
            </form>
        </div>
    </div>
@endsection
