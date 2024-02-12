<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu1;
use App\Models\Menu2;
use App\Models\Menu3;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MenuManageController extends Controller
{
    // show menu
    public function index()
    {
        $categories = Category::all();
        return view("admin-page.categories-manage.menu", compact('categories'));
    }

    public function create()
    {
        $cates = Category::all();
        return view("admin-page.categories-manage.create", compact('cates'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $existCats = Category::where('name', $data['title'])->pluck('parent_id')->first();

        if (isset($existCats) && $existCats == $data['menu_id']) {
            return redirect()->back()->with('errorMenu', 'Tên danh mục đã tồn tại');
        } else {
            // ! Insert category table
            $cats = new Category();
            $cats->name = $request->input('title');
            $cats->slug = $request->input('slug');
            if ($data['menu_id'] != 'null') {
                $cats->parent_id = $request->input('menu_id');
            } else {
                $cats->parent_id = 0;
            }
            $cats->save();

            $title = $data['title'];
            $slug = Str::slug($title);
            if ($data['menu_id'] == 'null') {

                $menu1 = new Menu1();
                $menu1->menu1 = $request->input('title');
                $menu1->slug = $request->input('slug');
                $menu1->save();

                $dir_name_par = str_replace('-', '', ucwords($slug, '-'));
                if (isset($data['slug'])) {
                    $directory = base_path("resources/views/user-page/{$dir_name_par}");
                    if (!File::isDirectory($directory)) {
                        File::makeDirectory($directory, 0755, true, true);
                    }

                    $file_layout_name = public_path('layout.txt');
                    $content = File::get($file_layout_name);
                    $fileInput = $directory . '/' . $slug . '.blade.php';

                    File::put($fileInput, $content);
                } else {
                    $directory = base_path("resources/views/user-page/{$dir_name_par}");
                    if (!File::isDirectory($directory)) {
                        File::makeDirectory($directory, 0755, true, false);
                    }
                }
            } elseif ($data['menu_id'] != 'null') {
                $parent_id = Category::where('id', $data['menu_id'])->first();
                $title_menu = Category::where('id', $data['menu_id'])->pluck('name')->first();
                $slug_par = Str::slug($title_menu);
                $dir_name_par = str_replace('-', '', ucwords($slug_par, '-'));
                if ($parent_id->parent_id == 0) {
                    $menu1 = Menu1::where('menu1', $parent_id->name)->first();

                    $menu2 = new Menu2();
                    $menu2->menu1_id = $menu1->id;
                    $menu2->menu2 = $request->input('title');
                    $menu2->slug = $request->input('slug');
                    $menu2->save();

                    $menu2_slug = $data['slug'];
                    if (isset($data['slug'])) {
                        $dir_name_menu2 = str_replace('-', '', ucwords($slug, '-'));
                        $directory = base_path("resources/views/user-page/{$dir_name_par}");

                        $file_layout_name = public_path('layout.txt');
                        $content = File::get($file_layout_name);
                        $fileInput = $directory . '/' . $menu2_slug . '.blade.php';

                        File::put($fileInput, $content);
                    } else {
                        $dir_name_menu2 = str_replace('-', '', ucwords($slug, '-'));
                        $directory = base_path("resources/views/user-page/{$dir_name_par}/{$dir_name_menu2}");

                        if (!File::isDirectory($directory)) {
                            File::makeDirectory($directory, 0755, true, true);
                        }
                    }
                } else {
                    $cates_parent = Category::find($parent_id->parent_id);
                    $slug_menu1 = Str::slug($cates_parent->name);
                    $dir_name_menu1 = str_replace('-', '', ucwords($slug_menu1, '-'));
                    $menu2 = Menu2::where('menu2', $title_menu)->first();
                    $menu1 = Menu1::find($menu2->menu1_id);
                    $slug_menu2 = Str::slug($menu2->menu2);
                    $dir_name_menu3 = str_replace('-', '', ucwords($slug_menu2, '-'));

                    $directory = base_path("resources/views/user-page/{$dir_name_menu1}/{$dir_name_menu3}");
                    if (!File::isDirectory($directory)) {
                        File::makeDirectory($directory, 0755, true, false);
                    }

                    $file_layout_name = public_path('layout.txt');
                    $content = File::get($file_layout_name);
                    $fileInput = $directory . '/' . $data['slug'] . '.blade.php';

                    File::put($fileInput, $content);

                    $menu3 = new Menu3();
                    $menu3->menu1_id = $menu1->id;
                    $menu3->menu2_id = $menu2->id;
                    $menu3->menu3 = $request->input('title');
                    $menu3->slug = $request->input('slug');
                    $menu3->save();
                }
            }

            Toastr::success('Thêm danh mục thành công');
            return redirect()->route('admin.menu');
        }
    }

    public function edit($id)
    {
        $menu2 = Category::find($id);
        return view("admin-page.categories-manage.update_menu_level2", compact("menu2"));
    }

    public function update(Request $request, $id)
    {
        $menu_update = Category::find($id);
        $menu_update->title = $request->input('title');
        $menu_update->slug = $request->input('slug');
        $menu_update->save();

        Toastr::success('Cập nhật danh mục thành công');
        return redirect()->route("admin.menu");
    }

    public function delete($id)
    {
        Category::destroy($id);
        Toastr::success('Xóa danh mục thành công');
        return redirect()->back();
    }
}
