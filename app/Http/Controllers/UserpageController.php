<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserpageController extends Controller
{
    public function show_lich()
    {
        return view("user-page.khai-giang.khai_giang");
    }

    public function show_employ()
    {
        return view("user-page.tuyen-dung.employ");
    }

    public function show_contact()
    {
        return view("user-page.contact.contact");
    }
}
