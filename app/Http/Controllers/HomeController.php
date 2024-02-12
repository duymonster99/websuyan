<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showHome()
    {
        $name_proc = Category::where('name', 'like', '%Về%')->first();

        $post = null;
        if(isset($name_proc))
        {
            $post = DB::table('posts as p')
            ->join('categories as c', 'p.menu_id', '=', 'c.id')
            ->select('p.*', 'c.name')
            ->where('c.name', '=', $name_proc->name)
            ->where('p.status_home', '=', 'Show Home')
            ->orderBy('p.stt', 'ASC')
            ->get();
        }

        $post_project = DB::table('posts as p')
        ->join('categories as c', 'p.menu_id', '=', 'c.id')
        ->select('p.*')
        ->where('c.name', '=', 'Khóa học')
        ->where('p.status_home', '=', 'Show Home')
        ->orderBy('p.stt', 'asc')
        ->get();

        $name_rv = Category::where('name', 'like', '%Review%')->first();
        $post_rv = null;
        if(isset($name_rv))
        {
            $post_rv = DB::table('posts as p')
            ->join('categories as c', 'p.menu_id', '=', 'c.id')
            ->select('p.*')
            ->where('c.name', '=', $name_rv->name)
            ->where('p.status_home', '=', 'Show Home')
            ->orderBy('p.stt', 'asc')
            ->get();
        }


        $name_teacher = Category::where('name', 'like', '%Giảng%')->first();
        $post_teacher = null;
        if(isset($name_teacher))
        {
            $post_teacher = DB::table('posts as p')
            ->join('categories as c', 'p.menu_id', '=', 'c.id')
            ->select('p.*', 'c.name')
            ->where('c.name', '=', $name_teacher->name)
            ->where('status_home', '=', 'Show Home')
            ->orderBy('stt', 'asc')
            ->get();
        }


        $name_sche = Category::where('name', 'like', '%Lịch%')->first();
        $post_sche = null;
        if(isset($name_sche))
        {
            $post_sche = DB::table('posts as p')
            ->join('categories as c', 'p.menu_id', '=', 'c.id')
            ->select('p.*', 'c.name')
            ->where('c.name', '=', $name_sche->name)
            ->where('status_home', '=', 'Show Home')
            ->first();
        }

        $banner = Slider::whereNull('menu1_id')->where('status', '=', 'Public Page')->get();

        return view("home", compact("post", "post_project", "post_rv", "post_teacher", "post_sche", "banner"));
    }
}
