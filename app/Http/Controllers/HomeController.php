<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showHome()
    {
        $post = DB::table('posts')
        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->select('posts.*', 'menu1s.menu1', 'menu2s.menu2')
        ->where('menu2', '=', 'Về trung tâm')
        ->where('status_home', '=', 'Show Home')
        ->orderBy('stt', 'ASC')
        ->get();

        $post_project = DB::table('posts')
        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->join('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
        ->select('posts.*')
        ->where('menu1', '=', 'Khóa học')
        ->where('status_home', '=', 'Show Home')
        ->orderBy('stt', 'asc')
        ->get();

        $post_rv = DB::table('posts')
        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->select('posts.*')
        ->where('menu2', '=', 'Review từ học viên')
        ->where('status_home', '=', 'Show Home')
        ->orderBy('stt', 'asc')
        ->get();

        $post_teacher = DB::table('posts')
        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->select('posts.*', 'menu1s.menu1', 'menu2s.menu2')
        ->where('menu2', '=', 'Giảng viên')
        ->where('status_home', '=', 'Show Home')
        ->orderBy('stt', 'asc')
        ->get();

        $post_sche = DB::table('posts')
        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
        ->select('posts.*', 'menu1s.menu1')
        ->where('menu1', '=', 'Lịch khai giảng')
        ->where('status_home', '=', 'Show Home')
        ->first();

        $banner = Slider::whereNull('menu1_id')->where('status', '=', 'Public Page')->get();
        // dd($banner);

        return view("home", compact("post", "post_project", "post_rv", "post_teacher", "post_sche", "banner"));
    }

}
