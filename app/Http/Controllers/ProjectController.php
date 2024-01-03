<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function show_project()
    {
        $post = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu1s.menu1', 'menu2s.menu2', 'menu3s.menu3')
            ->where('menu1s.menu1', '=', 'Khóa học')
            ->where('status_home', '=', 'Show Home')
            ->orderBy('stt', 'asc')
            ->paginate(4);

        $banner = Slider::where('menu1_id', '=', '2')
        ->where('status', '=', 'Public Page')
        ->first();

        return view("user-page.project.project", compact('post', 'banner'));
    }

    public function show_project_h2()
    {
        $post = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu3s.menu3')
            ->where('menu2s.menu2', '=', 'Khóa học online')
            ->where('menu3s.menu3', '=', 'Sơ cấp HSK0 - HSK2')
            ->where('status_page', '=', 'Public Page')
            ->orderBy('stt', 'asc')
            ->get();

        return view("user-page.project.onl.hsk2", compact('post'));
    }

    public function show_project_h3()
    {
        $post = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu3s.menu3')
            ->where('menu3s.menu3', '=', 'HSK3')
            ->where('status_page', '=', 'Public Page')
            ->orderBy('stt', 'asc')
            ->get();

        return view("user-page.project.onl.hsk3", compact('post'));
    }

    public function show_project_h4()
    {
        $post = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu3s.menu3')
            ->where('menu3s.menu3', '=', 'HSK4')
            ->where('status_page', '=', 'Public Page')
            ->orderBy('stt', 'asc')
            ->get();

        return view("user-page.project.onl.hsk4", compact('post'));
    }

    public function show_project_h5()
    {
        $post = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu3s.menu3')
            ->where('menu3s.menu3', '=', 'HSK5')
            ->where('status_page', '=', 'Public Page')
            ->orderBy('stt', 'asc')
            ->get();

        return view("user-page.project.onl.hsk5", compact('post'));
    }

    public function show_project_h6()
    {
        $post = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu3s.menu3')
            ->where('menu3s.menu3', '=', 'HSK6')
            ->where('status_page', '=', 'Public Page')
            ->orderBy('stt', 'asc')
            ->get();

        return view("user-page.project.onl.hsk6", compact('post'));
    }

    public function show_project_11()
    {
        $post = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu3s.menu3')
            ->where('menu3s.menu3', '=', 'Khóa học 1-1')
            ->where('status_page', '=', 'Public Page')
            ->orderBy('stt', 'asc')
            ->get();

        return view("user-page.project.onl.1-1", compact('post'));
    }

    public function show_project_kk()
    {
        $post = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu3s.menu3')
            ->where('menu3s.menu3', '=', 'Khẩu ngữ')
            ->where('status_page', '=', 'Public Page')
            ->orderBy('stt', 'asc')
            ->get();

        return view("user-page.project.onl.hskk", compact('post'));
    }

    public function show_project_hsk2_off()
    {
        $post = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu3s.menu3')
            ->where('menu2s.menu2', '=', 'Khóa học offline')
            ->where('menu3s.menu3', '=', '	Sơ cấp HSK0 - HSK2')
            ->where('status_page', '=', 'Public Page')
            ->orderBy('stt', 'asc')
            ->get();

        return view("user-page.project.off.hsk2", compact('post'));
    }
}
