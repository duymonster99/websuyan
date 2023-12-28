@extends('admin-page.index')
@section('admin')
    <div class="row">
        <div class="card bg-light text-dark" style="width: 100%; height: auto;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background: #c9e6c0; height: 50px">
                <h3 class="m-0 text-center font-weight-bold">Danh sách Menu Level 1</h3>
                <a href="{{ route('admin.create.level1') }}" class="btn btn-primary">Add Menu</a>
            </div>

            <div class="card-body d-block">
                <table class="display text-dark example" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Menu Parent</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($menu1))
                            @foreach ($menu1 as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->menu1 }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit.level1', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row pt-4">
        <div class="card bg-light text-dark" style="width: 100%; height: auto;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background: #c9e6c0; height: 50px">
                <h3 class="m-0 text-center font-weight-bold">Danh sách Menu Level 2</h3>
                <a href="{{ route('admin.create.level2') }}" class="btn btn-primary">Add Menu</a>
            </div>

            <div class="card-body d-block">
                <table class="display text-dark example" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Menu Level 2</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($menu2))
                            @foreach ($menu2 as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->menu2 }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit.level2', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row pt-4">
        <div class="card bg-light text-dark" style="width: 100%; height: auto;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background: #c9e6c0; height: 50px; width: 100%">
                <h3 class="m-0 text-center font-weight-bold">Danh sách Menu Level 3</h3>
                <a href="{{ route('admin.create.level3') }}" class="btn btn-primary">Add Menu</a>
            </div>

            <div class="card-body d-block">
                <table class="display text-dark example" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Menu Level 3</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($menu3))
                            @foreach ($menu3 as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->menu3 }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit.level3', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.delete.level3', $item->id) }}"
                                            class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
