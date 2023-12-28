<?php

namespace App\Http\Controllers;

use App\Models\Menu1;
use App\Models\Menu2;
use App\Models\Menu3;
use App\Models\MultiImage;
use App\Models\Post;
use \Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostProcedureController extends Controller
{
    public function create_home()
    {
        $menu_parent = Menu1::all();
        $menu_child = DB::table('menu2s')->where('menu1_id', '=', '1')->get();
        return view("admin-page.post-manage.procedure.create", compact("menu_parent", "menu_child"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'bail|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post = Post::create([
            'stt' => $request->stt,
            'menu1_id' => $request->menu_parent,
            'menu2_id' => $request->menu_child,
            'title' => $request->title,
            'meta_description' => $request->description,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'content3' => $request->content3,
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $destinationPath = public_path('img-procedure');
            $request->image->move($destinationPath, $filename);
            $imagePath = 'img-procedure/' .$filename;
            $post->image = $imagePath;
            $post->save();
        }

        Toastr::success('Thêm bài viết thành công');

        return redirect()->route("admin.post");
    }

    public function edit_home($id)
    {
        $post = Post::find($id);
        $menu_level1 = Menu1::all();
        $menu_child = Menu2::all();
        $menu_level3 = Menu3::all();
        return view("admin-page.post-manage.procedure.edit", compact("post", "menu_level1", "menu_child", "menu_level3"));
    }

    public function update_home(Request $request, $id)
    {
        $request->validate([
            "image" => "bail|image|mimes:jpeg,png,gif,svg|max:2048",
        ]);

        $post = Post::find($id);
        $post->menu2_id = $request->input('menu_child');
        $post->title = $request->input('title');
        $post->meta_description = $request->input('description');
        $post->save();

        // xu ly image
        if ($request->hasFile("image")) {
            $existingImage = public_path($post->image);
            if (File::exists($existingImage)) {
                File::delete($existingImage);
            }
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path("img-procedure"), $imageName);
            $post->image = "img-procedure/" . $imageName;
            $post->save();
        }

        Toastr::success('Updated success!');
        return redirect()->route("admin.post");
    }

    public function delete_home($id)
    {
        $post = Post::find($id);
        if ($post != null) {
            $imagePath = public_path($post->image);
            $check = $post->delete();
            if ($check) {
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                Toastr::success('Xóa bài viết thành công');
                return redirect()->back();
            }
            Toastr::warning('Xóa bài viết thất bại');
            return redirect()->back();
        }
        Toastr::error('Không tìm thấy bài viết để xóa');
        return redirect()->route("");
    }

    public function change_status_home(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $status_home = $data['status_home'];

        $post = Post::find($id);

        if(isset($post))
        {
            $post->status_home = $status_home;
            $post->save();
        }

        Toastr::success('Cập nhật thành công');
        return response()->json([
            'data'=>$data,
        ]);
    }

    public function change_status_page(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $status_page = $data['status_page'];

        $post = Post::find($id);

        if(isset($post))
        {
            $post->status_page = $status_page;
            $post->save();
        }

        Toastr::success('Cập nhật thành công');
        return response()->json([
            'data'=>$data,
        ]);
    }

    public function change_decrease_stt(Request $request)
    {
        $data = $request->all();

        $post = Post::find($data['id']);

        if(isset($post))
        {
            $post->stt -= 1;
            $post->save();
        }

        $stt = $post->stt;

        Toastr::success('Cập nhật thành công');
        return response()->json([
            'data_proc' => $stt,
        ]);
    }

    public function change_increase_stt(Request $request)
    {
        $data = $request->all();

        $post = Post::find($data['id']);

        if(isset($post))
        {
            $post->stt += 1;
            $post->save();
        }

        $stt = $post->stt;

        Toastr::success('Cập nhật thành công');
        return response()->json([
            'data_proc' => $stt,
        ]);
    }
}
