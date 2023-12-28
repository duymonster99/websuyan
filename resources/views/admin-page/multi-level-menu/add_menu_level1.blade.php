@extends('admin-page.index')
@section('admin')
    <div class="row d-flex justify-content-center align-items-center bg-light h-100">
        <div class="card p-3" style="width: 50%; height: 300px">
            <form class="{{route('admin.store.level1')}}" method="post">
                @csrf
                <h2>Add new Menu</h2>

                <div class="mb-3 mt-3">
                    <label for="menu" class="form-label">Menu Parent Name:</label>
                    <input type="text" class="form-control" id="menu" name="menu" placeholder="Enter Menu Level 1">
                </div>

                <button type="submit" class="btn btn-primary">Add Menu</button>
            </form>
        </div>
    </div>
@endsection
