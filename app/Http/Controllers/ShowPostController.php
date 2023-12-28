<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowPostController extends Controller
{
    public function index(Request $request)
    {
        $post = DB::table("posts")
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->select('posts.*', 'menu1s.menu1', 'menu2s.menu2')
            ->where('menu1s.menu1', '=', 'Giới thiệu')
            ->get();

        $post_project = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu1s.menu1', 'menu2s.menu2', 'menu3s.menu3')
            ->where('menu1s.menu1', '=', 'Khóa học')
            ->get();
        // dd($post_project);

        $post_schedule = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->select('posts.*', 'menu1s.menu1')
            ->where('menu1s.menu1', '=', 'Lịch khai giảng')
            ->get();

        $post_lib = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->select('posts.*', 'menu1s.menu1', 'menu2s.menu2')
            ->where('menu1s.menu1', '=', 'Thư viện')
            ->get();

        $post_emp = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->select('posts.*')
            ->where('menu1s.menu1', '=', 'Tuyển dụng')
            ->get();

        return view("admin-page.post-manage.index", compact("post_project", "post", "post_schedule", "post_lib", "post_emp"));
    }
}
