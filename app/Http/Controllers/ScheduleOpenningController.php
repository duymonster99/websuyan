<?php

namespace App\Http\Controllers;

use App\Models\Menu1;
use App\Models\Menu2;
use App\Models\Menu3;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ScheduleOpenningController extends Controller
{
    public function create()
    {
        $menu_parent = Menu1::all();
        return view("admin-page.post-manage.schedule_openning.add", compact("menu_parent"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "image"=> "bail|image|mimes:jpeg,png,gif,svg,jpg|max:100000",
            "image_banner"=> "bail|image|mimes:jpeg,png,gif,svg,jpg|max:100000",
        ]);

        $post = Post::create([
            'stt' => $request->stt,
            'menu1_id' => $request->menu_parent,
            'title' => $request->title,
            'meta_description' => $request->description,
            'appendix' => $request->appendix,
            'content' => $request->content,
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $destinationPath = public_path('img-schedule');
            $request->image->move($destinationPath, $filename);
            $imagePath = 'img-schedule/' .$filename;
            $post->image = $imagePath;
            $post->save();
        }

        if ($request->hasFile('image_banner')) {
            $filename = $request->image_banner->getClientOriginalName();
            $destinationPath = public_path('img-schedule');
            $request->image_banner->move($destinationPath, $filename);
            $imagePath = 'img-schedule/' .$filename;
            $post->banner = $imagePath;
            $post->save();
        }

        Toastr::success('Thêm bài viết thành công');
        return redirect()->route("admin.post");
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $menu_level1 = Menu1::all();
        return view("admin-page.post-manage.schedule_openning.edit", compact("post", "menu_level1"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "image" => "bail|image|mimes:jpeg,png,gif,svg|max:100000",
            "image_banner" => "bail|image|mimes:jpeg,png,gif,svg|max:100000",
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->meta_description = $request->input('description');
        $post->content = $request->input('content');
        $post->appendix = $request->input('appendix');
        $post->save();

        // xu ly image
        if ($request->hasFile("image")) {
            $existingImage = public_path($post->image);
            if (File::exists($existingImage)) {
                File::delete($existingImage);
            }
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path("img-schedule"), $imageName);
            $post->image = "img-schedule/" . $imageName;
            $post->save();
        }
        // xu ly banner
        if ($request->hasFile("image_banner")) {
            $existingImage = public_path($post->banner);
            if (File::exists($existingImage)) {
                File::delete($existingImage);
            }
            $imageName = $request->image_banner->getClientOriginalName();
            $request->image_banner->move(public_path("img-schedule"), $imageName);
            $post->banner = "img-schedule/" . $imageName;
            $post->save();
        }

        Toastr::success('Cập nhật bài viết thành công');
        return redirect()->route("admin.post");
    }

    public function delete($id)
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

    public function change_status_banner(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $status_banner = $data['status_banner'];

        $post = Post::find($id);

        if(isset($post))
        {
            $post->status_banner = $status_banner;
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
            'data_sche' => $stt,
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
            'data_sche' => $stt,
        ]);
    }
}
