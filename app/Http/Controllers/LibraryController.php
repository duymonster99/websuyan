<?php

namespace App\Http\Controllers;

use App\Models\Menu1;
use App\Models\Menu2;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LibraryController extends Controller
{
    public function show_vocab()
    {
        $post = DB::table('posts')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->where('menu2s.menu2', '=', 'Từ vựng Tiếng Trung')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.library.vocabulary", compact('post'));
    }

    public function show_grammar()
    {
        $post = DB::table('posts')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->where('menu2s.menu2', '=', 'Ngữ pháp Tiếng Trung')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.library.grammar", compact('post'));
    }

    public function show_thi_hsk()
    {
        $post = DB::table('posts')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->where('menu2s.menu2', '=', 'Kinh nghiệm thi HSK')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.library.thi_hsk", compact('post'));
    }

    public function show_thanh_ngu()
    {
        $post = DB::table('posts')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->where('menu2s.menu2', '=', 'Thành ngữ Tiếng Trung')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.library.thanh_ngu", compact('post'));
    }

    public function show_duhoc()
    {
        $post = DB::table('posts')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->where('menu2s.menu2', '=', 'Du học Trung Quốc')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.library.du_hoc", compact('post'));
    }

    public function create()
    {
        $menu = Menu2::select('menu2s.menu2', 'menu1s.menu1')
        ->join('menu1s', 'menu2s.menu1_id', '=', 'menu1s.id')
        ->select('menu2s.*', 'menu1s.menu1')
        ->where('menu1s.menu1', '=', 'Thư viện')
        ->get();

        return view("admin-page.post-manage.library.add", compact("menu"));
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
            'content1' => $request->content,
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $destinationPath = public_path('img-lib');
            $request->image->move($destinationPath, $filename);
            $imagePath = 'img-lib/' .$filename;
            $post->image = $imagePath;
            $post->save();
        }

        Toastr::success('Thêm bài viết thành công');

        return redirect()->route("admin.post");
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $menu = Menu2::select("menu2s.menu2", "menu1s.menu1")
        ->join("menu1s", "menu2s.menu1_id", "=", "menu1s.id")
        ->select('menu2s.*')
        ->where('menu1s.menu1', '=', 'Thư viện')
        ->get();
        return view("admin-page.post-manage.library.edit", compact("post", "menu"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "image" => "bail|image|mimes:jpeg,png,gif,svg|max:2048",
        ]);

        $post = Post::find($id);
        $post->menu2_id = $request->input('menu_child');
        $post->title = $request->input('title');
        $post->meta_description = $request->input('description');
        $post->content1 = $request->input('content');
        $post->save();

        // xu ly image
        if ($request->hasFile("image")) {
            $existingImage = public_path($post->image);
            if (File::exists($existingImage)) {
                File::delete($existingImage);
            }
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path("img-lib"), $imageName);
            $post->image = "img-lib/" . $imageName;
            $post->save();
        }

        Toastr::success('Updated success!');
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
            'data_lib' => $stt,
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
            'data_lib' => $stt,
        ]);
    }
}
