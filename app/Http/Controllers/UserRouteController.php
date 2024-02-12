<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu1;
use App\Models\Menu2;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserRouteController extends Controller
{
    public function showMenu1($slug)
    {
        $cates = Category::where('slug', $slug)->first();
        $categories = Category::all();
        foreach ($categories as $key => $value) {
            if($value->parent_id == $cates->id)
            {
                if ($cates->name == "Khóa học") {
                    $post_chung = Post::select('posts.*')
                        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
                        ->where('menu1s.menu1', '=', $cates->name)
                        ->where('status_page', '=', 'Public Page')
                        ->orderBy('stt', 'asc')
                        ->paginate(4);
                }
                else
                {
                    $post_chung = Post::select('posts.*')
                    ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
                    ->where('menu1s.slug', '=', $slug)
                    ->where('status_page', '=', 'Public Page')
                    ->orderBy('stt', 'asc')
                    ->get();
                }

                break;
            }
            else
            {
                if ($cates->name == "Khóa học") {
                    $post = Post::select('posts.*')
                        ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
                        ->where('menu1s.menu1', '=', $cates->name)
                        ->where('status_page', '=', 'Public Page')
                        ->orderBy('stt', 'asc')
                        ->paginate(4);
                }
                else
                {
                    $post = Post::select('posts.*')
                    ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
                    ->where('menu1s.slug', '=', $slug)
                    ->where('status_page', '=', 'Public Page')
                    ->orderBy('stt', 'asc')
                    ->get();
                }
                break;
            }
        }


        $slug_par = Str::slug($cates->name);
        $dir_name = str_replace('-', '', ucwords($slug_par, '-'));

        $menu = Menu1::where('slug', $slug)->first();
        if ($menu) {
            if(isset($post))
            {
                return view("user-page.$dir_name.$slug", compact("post"));
            }
            elseif(isset($post_chung))
            {
                return view("user-page.$dir_name.$slug", compact("post_chung"));
            }
        }
    }

    public function showMenu2($slug_par, $slug)
    {
        $dir = str_replace('-', '', ucwords($slug_par, '-'));
        $menu = Menu2::where('slug', $slug)->first();
        $cates = Category::where('slug', $slug)->first();
        $categories = Category::all();

        foreach ($categories as $key => $value) {
            if($value->parent_id == $cates->id)
            {
                $post_chung = Post::select('posts.*')
                ->join('menu1s as m1', 'posts.menu1_id', '=', 'm1.id')
                ->join('menu2s as m2', 'posts.menu2_id', '=', 'm2.id')
                ->where('m2.menu2', '=', $menu->menu2)
                ->where('posts.status_page', '=', 'Public Page')
                ->orderBy('posts.stt', 'asc')
                ->paginate(4);

                break;
            }
            else
            {
                $post = Post::select('posts.*')
                ->join('menu1s as m1', 'posts.menu1_id', '=', 'm1.id')
                ->join('menu2s as m2', 'posts.menu2_id', '=', 'm2.id')
                ->where('m2.menu2', '=', $menu->menu2)
                ->where('posts.status_page', '=', 'Public Page')
                ->orderBy('posts.stt', 'asc')
                ->get();
            }
        }

        if(isset($post))
        {
            return view("user-page.{$dir}.{$slug}", compact('post'));
        }
        elseif(isset($post_chung))
        {
            return view("user-page.{$dir}.{$slug}", compact('post_chung'));
        }
    }

    public function showMenu3($slug_par, $slug_lv2, $slug)
    {
        $dir_par = str_replace('-', '', ucwords($slug_par));

        $dir_lv2 = str_replace('-', '', ucwords($slug_lv2, '-'));

        $title = Category::where('slug', $slug)->pluck('name')->first();

        $post = DB::table('posts as p')
        ->join('categories as c', 'p.menu_id', '=', 'c.id')
        ->select('p.*', 'c.name')
        ->where('c.name', '=', $title)
        ->get();

        return view("user-page.$dir_par.$dir_lv2.$slug", compact("post"));
    }
}
