<?php

namespace App\Http\Controllers;

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
        // ->join('menu_level_3s', 'posts.menu_level3_id', '=', 'menu_level_3s.id')
        ->select('posts.*', 'menu1s.menu1', 'menu2s.menu2')
        ->where('menu1', '=', 'Khóa học')
        ->where('status_home', '=', 'Hiển thị lên home')
        ->get();

        $post_review = DB::table('posts')
        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        // ->join('menu_level_3s', 'posts.menu_level3_id', '=', 'menu_level_3s.id')
        ->select('posts.*', 'menu1s.menu1', 'menu2s.menu2')
        ->where('menu2', '=', 'Review từ học viên')
        ->where('status_home', '=', 'Hiển thị lên home')
        ->get();

        $post_teacher = DB::table('posts')
        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        // ->join('menu_level_3s', 'posts.menu_level3_id', '=', 'menu_level_3s.id')
        ->select('posts.*', 'menu1s.menu1', 'menu2s.menu2')
        ->where('menu2', '=', 'Giảng viên')
        ->where('status_home', '=', 'Hiển thị lên home')
        ->get();

        return view("home", compact("post", "post_project", "post_review", "post_teacher"));
    }

}
