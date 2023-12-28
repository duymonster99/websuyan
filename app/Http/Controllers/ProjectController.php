<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show_project()
    {
        return view("user-page.project.project");
    }
}
