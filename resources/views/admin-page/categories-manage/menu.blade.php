@extends('admin-page.index')
@section('admin')
    <div class="row">
        <div class="card bg-light text-dark" style="width: 100%; height: auto;">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background: #c9e6c0; height: 50px">
                <h3 class="m-0 text-center font-weight-bold">Danh sách Menu</h3>
                <a href="{{ route('admin.create.level2') }}" class="btn btn-primary">Add Menu</a>
            </div>

            <div class="card-body d-flex justify-content-center">
                <table class="text-dark table" style="width:90%">
                    <thead class="">
                        <tr>
                            <th>Tên danh mục</th>
                            <th>Slug</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($categories))
                            @php showCategories($categories) @endphp
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<?php
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<tr>';
                echo '<td>' .' ' .$char .$item->name . '</td>';
                echo '<td>' . $item->slug . '</td>';
                echo '<td>' . $item->created_at . '</td>';
                echo '<td>';
                    echo '<a href="' . route('admin.edit.level2', $item->id)
                        . '" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                        data-placement="top" title="Edit">';
                    echo '<i class="fa fa-edit"></i>';
                    echo '</a>';

                    echo '<a href="' .route('admin.delete.level2', $item->id) .'" class="btn btn-danger btn-sm rounded-0 mx-1" type="button"
                        data-toggle="tooltip" data-placement="top" title="Delete"
                        onclick="return confirm(\'Bạn có chắc chắn muốn xóa danh mục này?\')">';
                    echo '<i class="fa fa-trash"></i>';
                    echo '</a>';
                echo '</td>';
            echo '</tr>';

            unset($categories[$key]);

            showCategories($categories, $item->id, $char . ' -- ');
        }
    }
}
?>
