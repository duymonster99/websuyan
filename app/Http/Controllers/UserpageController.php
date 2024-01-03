<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserpageController extends Controller
{
    public function show_lich()
    {
        $post = Post::select('posts.*')
        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
        ->where('menu1s.menu1', '=', 'Lịch khai giảng')
        ->orderBy('stt', 'asc')
        ->get();

        $banner = Post::select('posts.banner')
        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
        ->where('menu1s.menu1', '=', 'Lịch khai giảng')
        ->where('status_banner', '=', 'show')
        ->first();

        return view("user-page.khai-giang.khai_giang", compact('post', 'banner'));
    }

    public function show_employ()
    {
        $post = Post::select('posts.*')
        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
        ->where('menu1s.menu1', '=', 'Tuyển dụng')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.tuyen-dung.employ", compact('post'));
    }

    public function show_contact()
    {
        return view("user-page.contact.contact");
    }
}
