<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show_aboutus()
    {
        $post = Post::select('posts.*')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->where('menu2s.menu2', '=', 'Về trung tâm')
        ->where('status_page', '=', 'Public Page')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.gioi-thieu.aboutus", compact('post'));
    }

    public function show_achievement()
    {
        $post = Post::select('posts.*')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->where('menu2s.menu2', '=', 'Thành tích học viên')
        ->where('status_page', '=', 'Public Page')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.gioi-thieu.achievement", compact('post'));
    }

    public function show_benefit()
    {
        $post = Post::select('posts.*')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->where('menu2s.menu2', '=', 'Quyền lợi học viên')
        ->where('status_page', '=', 'Public Page')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.gioi-thieu.benefit", compact('post'));
    }

    public function show_review()
    {
        $post = Post::select('posts.*')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->where('menu2s.menu2', '=', 'Review từ học viên')
        ->where('status_page', '=', 'Public Page')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.gioi-thieu.review", compact('post'));
    }

    public function show_teacher()
    {
        $post = Post::select('posts.*')
        ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
        ->where('menu2s.menu2', '=', 'Giảng viên')
        ->where('status_page', '=', 'Public Page')
        ->orderBy('stt', 'asc')
        ->get();

        return view("user-page.gioi-thieu.teacher", compact('post'));
    }
}
