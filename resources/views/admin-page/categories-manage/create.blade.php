<?php
function addMenu($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id) {
            echo '<option value="' . $item->id . '">';
            echo ' ' .$char . $item->name;
            echo '</option>';

            // Xóa chuyên mục đã lặp
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            addMenu($categories, $item->id, $char . '    -- ');
        }
    }
}
?>

@extends('admin-page.index')
@section('admin')
    <div class="row d-flex justify-content-center align-items-center bg-light h-100">
        <div class="card p-3" style="width: 50%; height: auto">
            <form class="{{ route('admin.store.level2') }}" method="post">
                @csrf
                <h2>Add new Menu</h2>

                <div class="mb-3 mt-3">
                    <label for="" class="form-label">Danh mục: (Nếu là danh mục cha, vui lòng bỏ qua trường này)</label>
                    <select name="menu_id" id="" class="form-select">
                        <option value="null">-- Chọn --</option>
                        @if (isset($cates))
                            @php addMenu($cates) @endphp
                        @endif
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Tên danh mục:</label>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Nhập tên danh mục ..." onkeyup="ChangeToSlug()"
                        value="{{ old('title') }}">
                    @if (session('errorMenu'))
                        <span class="text-danger">{{ session('errorMenu') }}</span>
                    @endif
                </div>

                <div class="mb-3 mt-3">
                    <label for="slug" class="form-label">Slug Url:</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Nhập đường dẫn ...">
                </div>

                <button type="submit" class="btn btn-primary">Add Menu</button>
            </form>
        </div>
    </div>

    <script src="{{asset('js/confirm-reload.js')}}"></script>
@endsection


