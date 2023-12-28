<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show_aboutus()
    {
        return view("user-page.gioi-thieu.aboutus");
    }

    public function show_achievement()
    {
        return view("user-page.gioi-thieu.achievement");
    }

    public function show_benefit()
    {
        return view("user-page.gioi-thieu.benefit");
    }

    public function show_review()
    {
        return view("user-page.gioi-thieu.benefit");
    }

    public function show_teacher()
    {
        return view("user-page.gioi-thieu.benefit");
    }
}
