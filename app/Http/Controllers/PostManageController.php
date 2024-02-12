<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu1;
use App\Models\Menu2;
use App\Models\Menu3;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostManageController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)->get();
        $post_inf = array();
        foreach ($categories as $value) {
            $post = DB::table('posts as p')
                ->join('menu1s as m1', 'p.menu1_id', '=', 'm1.id')
                ->leftJoin('menu2s as m2', 'p.menu2_id', '=', 'm2.id')
                ->leftJoin('menu3s as m3', 'p.menu3_id', '=', 'm3.id')
                ->select('p.*', 'm1.menu1', 'm2.menu2', 'm3.menu3')
                ->where('m1.menu1', '=', $value->name)
                ->get();

            $post_inf[] = $post;
        }

        return view("admin-page.post-manage.index", compact("post_inf", "categories"));
    }

    public function createPost()
    {
        $categories = Category::all();

        return view("admin-page.post-manage.createPost", compact("categories"));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            "category" => "required",
            "image" => "bail|image|mimes:jpeg,png,gif,svg,jpg|max:5120",
            "banner" => "bail|image|mimes:jpeg,png,gif,svg,jpg|max:5120",
            "description" => 'max:750',
        ], [
            'image.image' => 'Yêu cầu tải lên tệp hình ảnh',
            'image.mimes' => 'Tệp hình ảnh chỉ chấp nhận đuôi: jpeg, png, gif, svg, jpg',
            'image.max' => 'Dung lượng hình ảnh tối đa có thể tải lên là 5MB',
            'banner.image' => 'Yêu cầu tải lên tệp hình ảnh',
            'banner.mimes' => 'Tệp hình ảnh chỉ chấp nhận đuôi: jpeg, png, gif, svg, jpg',
            'banner.max' => 'Dung lượng hình ảnh tối đa có thể tải lên là 5MB',
            'description.max' => 'Mô tả ngắn chỉ được nhập tối đa 750 ký tự',
        ]);

        $cate_name = Category::where('id', $data['category'])->pluck('name')->first();
        $menu3 = Menu3::where('menu3', $cate_name)->first();
        $menu2 = Menu2::where('menu2', $cate_name)->first();
        $menu1 = Menu1::where('menu1', $cate_name)->first();

        if ($menu3) {
            $menu3_id = $menu3->id;
            $menu2_id = Menu2::where('id', $menu3->menu2_id)->pluck('id')->first();
            $menu1_id = Menu1::where('id', $menu2_id->menu1_id)->pluck('id')->first();
        } elseif ($menu2) {
            $menu2_id = $menu2->id;
            $menu1_id = Menu1::where('id', $menu2->menu1_id)->pluck('id')->first();
        } elseif ($menu1) {
            $menu1_id = $menu1->id;
        }

        $post = new Post();
        $post->status_banner = "null";
        $post->menu_id = $data['category'];
        $post->menu1_id = $menu1_id;
        if (isset($menu2_id)) {
            $post->menu2_id = $menu2_id;
        }

        if (isset($menu3_id)) {
            $post->menu3_id = $menu3_id;
        }
        $post->title = $data['title'];
        $post->meta_description = $data['description'];
        $post->appendix = $data['appendix'];
        $post->content = $data['content'];
        $post->status_home = "null";
        $post->status_page = "null";
        $post->save();

        $cates_child = Category::where('id', $data['category'])->first();
        if ($cates_child->parent_id != 0) {
            $slugCateCont = Category::where('id', $cates_child->parent_id)->first();

            if ($slugCateCont->parent_id != 0) {
                $slugCatePar = Category::where('id', $slugCateCont->parent_id)->first();
                if ($slugCatePar->parent_id == 0) {
                    $dirName = str_replace('-', '', ucwords($slugCatePar->slug, '-'));

                    $directory = public_path("img-{$dirName}");

                    if (!File::isDirectory($directory)) {
                        File::makeDirectory($directory, 0755, true, true);
                    }

                    if ($request->hasFile('banner')) {
                        $filename = $request->banner->getClientOriginalName();
                        $destinationPath = public_path("img-{$dirName}");
                        $request->banner->move($destinationPath, $filename);
                        $imagePath = "img-{$dirName}/" . $filename;
                        $post->banner = $imagePath;
                        $post->save();
                    }

                    if ($request->hasFile('image')) {
                        $filename = $request->image->getClientOriginalName();
                        $destinationPath = public_path("img-{$dirName}");
                        $request->image->move($destinationPath, $filename);
                        $imagePath = "img-{$dirName}/" . $filename;
                        $post->image = $imagePath;
                        $post->save();
                    }
                }
            } elseif ($slugCateCont->parent_id == 0) {
                $dirName = str_replace('-', '', ucwords($slugCateCont->slug, '-'));

                $directory = public_path("img-{$dirName}");

                if (!File::isDirectory($directory)) {
                    File::makeDirectory($directory, 0755, true, true);
                }

                if ($request->hasFile('banner')) {
                    $filename = $request->banner->getClientOriginalName();
                    $destinationPath = public_path("img-{$dirName}");
                    $request->banner->move($destinationPath, $filename);
                    $imagePath = "img-{$dirName}/" . $filename;
                    $post->banner = $imagePath;
                    $post->save();
                }

                if ($request->hasFile('image')) {
                    $filename = $request->image->getClientOriginalName();
                    $destinationPath = public_path("img-{$dirName}");
                    $request->image->move($destinationPath, $filename);
                    $imagePath = "img-{$dirName}/" . $filename;
                    $post->image = $imagePath;
                    $post->save();
                }
            }
        } else {
            $dirName = str_replace('-', '', ucwords($cates_child->slug, '-'));

            $directory = public_path("img-{$dirName}");

            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true, true);
            }

            if ($request->hasFile('banner')) {
                $filename = $request->banner->getClientOriginalName();
                $destinationPath = public_path("img-{$dirName}");
                $request->banner->move($destinationPath, $filename);
                $imagePath = "img-{$dirName}/" . $filename;
                $post->banner = $imagePath;
                $post->save();
            }

            if ($request->hasFile('image')) {
                $filename = $request->image->getClientOriginalName();
                $destinationPath = public_path("img-{$dirName}");
                $request->image->move($destinationPath, $filename);
                $imagePath = "img-{$dirName}/" . $filename;
                $post->image = $imagePath;
                $post->save();
            }
        }

        Toastr::success('Thêm bài viết thành công');

        return redirect()->route("admin.post");
    }

    public function upload(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location' => "/storage/$path"]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $cates = Category::all();

        return view("admin-page.post-manage.edit", compact("post", "cates"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
            "category" => "required",
            "image" => "bail|image|mimes:jpeg,png,gif,svg,jpg|max:5120",
            "banner" => "bail|image|mimes:jpeg,png,gif,svg,jpg|max:5120",
            "description" => 'max:750',
        ], [
            'image.image' => 'Yêu cầu tải lên tệp hình ảnh',
            'image.mimes' => 'Tệp hình ảnh chỉ chấp nhận đuôi: jpeg, png, gif, svg, jpg',
            'image.max' => 'Dung lượng hình ảnh tối đa có thể tải lên là 5MB',
            'banner.image' => 'Yêu cầu tải lên tệp hình ảnh',
            'banner.mimes' => 'Tệp hình ảnh chỉ chấp nhận đuôi: jpeg, png, gif, svg, jpg',
            'banner.max' => 'Dung lượng hình ảnh tối đa có thể tải lên là 5MB',
            'description.max' => 'Mô tả ngắn chỉ được nhập tối đa 750 ký tự',
        ]);

        $cate_name = Category::where('id', $data['category'])->pluck('name')->first();
        $menu3 = Menu3::where('menu3', $cate_name)->first();
        $menu2 = Menu2::where('menu2', $cate_name)->first();
        $menu1 = Menu1::where('menu1', $cate_name)->first();

        if ($menu3) {
            $menu3_id = $menu3->id;
            $menu2_id = Menu2::where('id', $menu3->menu2_id)->pluck('id')->first();
            $menu1_id = Menu1::where('id', $menu2_id->menu1_id)->pluck('id')->first();
        } elseif ($menu2) {
            $menu2_id = $menu2->id;
            $menu1_id = Menu1::where('id', $menu2->menu1_id)->pluck('id')->first();
        } elseif ($menu1) {
            $menu1_id = $menu1->id;
        }

        $post = Post::find($id);
        $post->menu_id = $data['category'];
        $post->menu1_id = $menu1_id;
        if (isset($menu2_id)) {
            $post->menu2_id = $menu2_id;
        }

        if (isset($menu3_id)) {
            $post->menu3_id = $menu3_id;
        }
        $post->title = $data['title'];
        $post->meta_description = $data['description'];
        $post->appendix = $data['appendix'];
        $post->content = $data['content'];
        $post->save();

        $cates_child = Category::where('id', $data['category'])->first();
        if ($cates_child->parent_id != 0) {
            $slugCateCont = Category::where('id', $cates_child->parent_id)->first();

            if ($slugCateCont->parent_id != 0) {
                $slugCatePar = Category::where('id', $slugCateCont->parent_id)->first();
                if ($slugCatePar->parent_id == 0) {
                    $dirName = str_replace('-', '', ucwords($slugCatePar->slug, '-'));

                    $directory = public_path("img-{$dirName}");

                    if (!File::isDirectory($directory)) {
                        File::makeDirectory($directory, 0755, true, true);
                    }

                    if ($request->hasFile('banner')) {
                        $existingBanner = public_path($post->banner);
                        if (File::exists($existingBanner)) {
                            File::delete($existingBanner);
                        }

                        $filename = $request->banner->getClientOriginalName();
                        $destinationPath = public_path("img-{$dirName}");
                        $request->banner->move($destinationPath, $filename);
                        $imagePath = "img-{$dirName}/" . $filename;
                        $post->banner = $imagePath;
                        $post->save();
                    }

                    if ($request->hasFile('image')) {
                        $existingImage = public_path($post->image);
                        if (File::exists($existingImage)) {
                            File::delete($existingImage);
                        }
                        $filename = $request->image->getClientOriginalName();
                        $destinationPath = public_path("img-{$dirName}");
                        $request->image->move($destinationPath, $filename);
                        $imagePath = "img-{$dirName}/" . $filename;
                        $post->image = $imagePath;
                        $post->save();
                    }
                }
            } elseif ($slugCateCont->parent_id == 0) {
                $dirName = str_replace('-', '', ucwords($slugCateCont->slug, '-'));

                $directory = public_path("img-{$dirName}");

                if (!File::isDirectory($directory)) {
                    File::makeDirectory($directory, 0755, true, true);
                }

                if ($request->hasFile('banner')) {
                    $existingBanner = public_path($post->banner);
                    if (File::exists($existingBanner)) {
                        File::delete($existingBanner);
                    }

                    $filename = $request->banner->getClientOriginalName();
                    $destinationPath = public_path("img-{$dirName}");
                    $request->banner->move($destinationPath, $filename);
                    $imagePath = "img-{$dirName}/" . $filename;
                    $post->banner = $imagePath;
                    $post->save();
                }

                if ($request->hasFile('image')) {
                    $existingImage = public_path($post->image);
                    if (File::exists($existingImage)) {
                        File::delete($existingImage);
                    }

                    $filename = $request->image->getClientOriginalName();
                    $destinationPath = public_path("img-{$dirName}");
                    $request->image->move($destinationPath, $filename);
                    $imagePath = "img-{$dirName}/" . $filename;
                    $post->image = $imagePath;
                    $post->save();
                }
            }
        } else {
            $dirName = str_replace('-', '', ucwords($cates_child->slug, '-'));

            $directory = public_path("img-{$dirName}");

            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true, true);
            }

            if ($request->hasFile('banner')) {
                $existingBanner = public_path($post->banner);
                if (File::exists($existingBanner)) {
                    File::delete($existingBanner);
                }

                $filename = $request->banner->getClientOriginalName();
                $destinationPath = public_path("img-{$dirName}");
                $request->banner->move($destinationPath, $filename);
                $imagePath = "img-{$dirName}/" . $filename;
                $post->banner = $imagePath;
                $post->save();
            }

            if ($request->hasFile('image')) {
                $existingImage = public_path($post->image);
                if (File::exists($existingImage)) {
                    File::delete($existingImage);
                }
                $filename = $request->image->getClientOriginalName();
                $destinationPath = public_path("img-{$dirName}");
                $request->image->move($destinationPath, $filename);
                $imagePath = "img-{$dirName}/" . $filename;
                $post->image = $imagePath;
                $post->save();
            }
        }

        Toastr::success('Cập nhật bài viết thành công');

        return redirect()->route("admin.post");
    }

    public function delete($id)
    {
        Post::destroy($id);
        Toastr::success('Xóa bài viết thành công');

        return redirect()->back();
    }

    // ! Function cập nhật bài viết lên home
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

        return response()->json([
            'data_stt' => $stt,
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

        return response()->json([
            'data_stt' => $stt,
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

        return response()->json([
            'data'=>$data,
        ]);
    }
}
