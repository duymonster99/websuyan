<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $cate_id = Category::where('name', 'Trang chủ')->pluck('id')->first();
        $cate = Category::where('parent_id', $cate_id)->get();
        // dd($cate);
        return view("admin-page.post-manage.procedure.create", compact("cate"));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $request->validate([
            "image"=> "bail|image|mimes:jpeg,png,gif,svg,jpg|max:5120",
            "banner"=> "bail|image|mimes:jpeg,png,gif,svg,jpg|max:5120",
        ],[
            'image.image' => 'Yêu cầu tải lên tệp hình ảnh',
            'image.mimes' => 'Tệp hình ảnh chỉ chấp nhận đuôi: jpeg, png, gif, svg, jpg',
            'image.max' => 'Dung lượng hình ảnh tối đa có thể tải lên là 5MB',
            'banner.image' => 'Yêu cầu tải lên tệp hình ảnh',
            'banner.mimes' => 'Tệp hình ảnh chỉ chấp nhận đuôi: jpeg, png, gif, svg, jpg',
            'banner.max' => 'Dung lượng hình ảnh tối đa có thể tải lên là 5MB',
        ]);

        // $cate_id = Category::find($request->category);
        // dd($cate_id);

        $post = Post::create([
            'stt' => $request->stt,
            'status_banner' => "null",
            'menu_id' => $request->category,
            'title' => $request->title,
            'meta_description' => $request->description,
            'appendix' => $request->appendix,
            'content' => $request->content,
            'status_home' => "null",
            'status_page' => "null",
        ]);

        if ($request->hasFile('banner')) {
            $filename = $request->banner->getClientOriginalName();
            $destinationPath = public_path('img-procedure');
            $request->banner->move($destinationPath, $filename);
            $imagePath = 'img-procedure/' .$filename;
            $post->banner = $imagePath;
            $post->save();
        }

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
        $cate_id = Category::where('title', 'Giới thiệu')->pluck('id')->first();
        $cate = Category::where('parent_id', $cate_id)->get();
        return view("admin-page.post-manage.procedure.edit", compact("post", "cate"));
    }

    public function update_home(Request $request, $id)
    {
        $request->validate([
            "image"=> "bail|image|mimes:jpeg,png,gif,svg,jpg|max:5120",
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
        $post->menu2_id = $request->input('menu_child');
        $post->title = $request->input('title');
        $post->meta_description = $request->input('description');
        $post->appendix = $request->input('appendix');
        $post->content = $request->input('content');
        $post->save();

        // xu ly image
        if ($request->hasFile("banner")) {
            $existingImage = public_path($post->banner);
            if (File::exists($existingImage)) {
                File::delete($existingImage);
            }
            $imageName = $request->banner->getClientOriginalName();
            $request->banner->move(public_path("img-procedure"), $imageName);
            $post->banner = "img-procedure/" . $imageName;
            $post->save();
        }

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
            $bannerPath = public_path($post->banner);
            $check = $post->delete();
            if ($check) {
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }

                if (File::exists($bannerPath)) {
                    File::delete($bannerPath);
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
