<?php

namespace App\Http\Controllers;

use App\Models\Menu1;
use App\Models\Menu2;
use App\Models\Menu3;
use App\Models\MenuChild;
use App\Models\MenuLevel3;
use App\Models\MenuParent;
use Illuminate\Http\Request;

class MenuManageController extends Controller
{
    // show menu
    public function index()
    {
        $menu1 = Menu1::all();
        $menu2 = Menu2::all();
        $menu3 = Menu3::all();
        return view("admin-page.multi-level-menu.menu", compact('menu1', 'menu2', 'menu3'));
    }

    public function create_level1()
    {
        return view("admin-page.multi-level-menu.add_menu_level1");
    }

    public function store_level1(Request $request)
    {
        $menu1 = new Menu1();
        $menu1->menu1 = $request->input('menu');
        $menu1->save();

        return redirect()->route('admin.menu')->with("menu_parent", "Create Menu Successfully!");
    }

    public function edit_level1($id)
    {
        $menu1 = Menu1::find($id);
        return view("admin-page.multi-level-menu.update_menu_level1", compact("menu1"));
    }

    public function update_level1(Request $request, $id)
    {
        $menu_update = Menu1::find($id);
        $menu_update->menu1 = $request->input('menu_update');
        $menu_update->save();

        return redirect()->route("admin.menu")->with("update_parent", "Update menu successfully!");
    }

    public function delete_level1($id)
    {
        Menu1::destroy($id);
        return redirect()->back()->with("delete_parent", "Delete successfull!");
    }

    /*
        ---------------------------------------------
        END MENU 1
        ---------------------------------------------
    */

    public function create_level2()
    {
        $menu1 = Menu1::all();
        return view("admin-page.multi-level-menu.add_menu_level2", compact("menu1"));
    }

    public function store_level2(Request $request)
    {
        $menu2 = new Menu2();
        $menu2->menu1_id = $request->input('menu_id');
        $menu2->menu2 = $request->input('menu2');
        $menu2->save();

        return redirect()->route('admin.menu')->with("menu2", "Create Menu Successfully!");
    }

    public function edit_level2($id)
    {
        $menu2 = Menu2::find($id);
        $menu1 = Menu1::all();
        return view("admin-page.multi-level-menu.update_menu_level2", compact("menu2", "menu1"));
    }

    public function update_level2(Request $request, $id)
    {
        $menu_update = Menu2::find($id);
        $menu_update->menu1_id = $request->input('menu_id');
        $menu_update->menu2 = $request->input('menu2_update');
        $menu_update->save();

        return redirect()->route("admin.menu")->with("update_menu2", "Update menu successfully!");
    }

    public function delete_level2($id)
    {
        Menu2::destroy($id);
        return redirect()->back()->with("delete_menu2", "Delete successfull!");
    }

    /*
        ---------------------------------------------
        END MENU 2
        ---------------------------------------------
    */

    public function create_level3()
    {
        $menu2 = Menu2::all();
        return view("admin-page.multi-level-menu.add_menu_level3", compact("menu2"));
    }

    public function store_level3(Request $request)
    {
        $menu3 = new Menu3();
        $menu3->menu2_id = $request->input('menu_id_3');
        $menu3->menu3 = $request->input('menu3');
        $menu3->save();

        return redirect()->route('admin.menu')->with("menu3", "Create Menu Successfully!");
    }

    public function edit_level3($id)
    {
        $menu3 = Menu3::find($id);
        $menu2 = Menu2::all();
        return view("admin-page.multi-level-menu.update_menu_level3", compact("menu3", "menu2"));
    }

    public function update_level3(Request $request, $id)
    {
        $menu_update = Menu3::find($id);
        $menu_update->menu2_id = $request->input('menu_id');
        $menu_update->menu3 = $request->input('menu3_update');
        $menu_update->save();

        return redirect()->route("admin.menu.level3")->with("update_menu3", "Update menu successfully!");
    }

    public function delete_level3($id)
    {
        Menu3::destroy($id);
        return redirect()->back()->with("delete_menu3", "Delete successfull!");
    }
}
