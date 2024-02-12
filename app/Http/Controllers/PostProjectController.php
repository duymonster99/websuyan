<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostProjectController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view("admin-page.post-manage.project.addPost", compact("categories"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "image"=> "bail|image|mimes:jpeg,png,gif,svg,jpg|max:100000",
            "banner"=> "bail|image|mimes:jpeg,png,gif,svg,jpg|max:5120",
        ],[
            'image.image' => 'Yêu cầu tải lên tệp hình ảnh',
            'image.mimes' => 'Tệp hình ảnh chỉ chấp nhận đuôi: jpeg, png, gif, svg, jpg',
            'image.max' => 'Dung lượng hình ảnh tối đa có thể tải lên là 5MB',
            'banner.image' => 'Yêu cầu tải lên tệp hình ảnh',
            'banner.mimes' => 'Tệp hình ảnh chỉ chấp nhận đuôi: jpeg, png, gif, svg, jpg',
            'banner.max' => 'Dung lượng hình ảnh tối đa có thể tải lên là 5MB',
        ]);

        $post = Post::create([
            'stt' => $request->stt,
            'menu_id' => $request->menu_id,
            'title' => $request->title,
            'meta_description' => $request->description,
            'appendix' => $request->appendix,
            'content' => $request->content,
            'status_banner' => 'null',
            'status_home' => 'null',
            'status_page' => 'null',
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $destinationPath = public_path('img-project');
            $request->image->move($destinationPath, $filename);
            $imagePath = 'img-project/' .$filename;
            $post->image = $imagePath;
            $post->save();
        }

        if ($request->hasFile('banner')) {
            $filename = $request->banner->getClientOriginalName();
            $destinationPath = public_path('img-project');
            $request->banner->move($destinationPath, $filename);
            $imagePath = 'img-project/' .$filename;
            $post->banner = $imagePath;
            $post->save();
        }

        Toastr::success('Thêm bài viết thành công');
        return redirect()->route("admin.post");
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $menu = Category::all();
        return view("admin-page.post-manage.project.editPost", compact("post", "menu"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "image" => "bail|image|mimes:jpeg,png,gif,svg|max:5120",
            "banner"=> "bail|image|mimes:jpeg,png,gif,svg,jpg|max:5120",
        ],[
            'image.image' => 'Yêu cầu tải lên tệp hình ảnh',
            'image.mimes' => 'Tệp hình ảnh chỉ chấp nhận đuôi: jpeg, png, gif, svg, jpg',
            'image.max' => 'Dung lượng hình ảnh tối đa có thể tải lên là 5MB',
            'banner.image' => 'Yêu cầu tải lên tệp hình ảnh',
            'banner.mimes' => 'Tệp hình ảnh chỉ chấp nhận đuôi: jpeg, png, gif, svg, jpg',
            'banner.max' => 'Dung lượng hình ảnh tối đa có thể tải lên là 5MB',
        ]);

        $post = Post::find($id);
        $post->menu_id = $request->input('menu');
        $post->title = $request->input('title');
        $post->meta_description = $request->input('description');
        $post->appendix = $request->input('appendix');
        $post->content = $request->input('content');
        $post->save();

        // xu ly image
        if ($request->hasFile("image")) {
            $existingImage = public_path($post->image);
            if (File::exists($existingImage)) {
                File::delete($existingImage);
            }
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path("img-project"), $imageName);
            $post->image = "img-project/" . $imageName;
            $post->save();
        }

        if ($request->hasFile("banner")) {
            $existingImage = public_path($post->banner);
            if (File::exists($existingImage)) {
                File::delete($existingImage);
            }
            $imageName = $request->banner->getClientOriginalName();
            $request->banner->move(public_path("img-project"), $imageName);
            $post->banner = "img-project/" . $imageName;
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
            if($status_home == 'null')
            {
                $post->status_home = 'Show Home';
            }
            else {
                $post->status_home = 'null';
            }
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
            if($status_page == 'null')
            {
                $post->status_page = 'Public Page';
            }
            else {
                $post->status_page = 'null';
            }
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
            'data_proj' => $stt,
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
            'data_proj' => $stt,
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
            if($status_banner == 'null')
            {
                $post->status_banner = 'Public';
            }
            else {
                $post->status_banner = 'null';
            }
            $post->save();
        }

        Toastr::success('Cập nhật thành công');
        return response()->json([
            'data'=>$data,
        ]);
    }
}
