<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $slider_home = DB::table('sliders')
        ->whereNull('menu1_id')
        ->get();

        $slider_about = DB::table('sliders')
        ->join('menu1s', 'sliders.menu1_id', '=', 'menu1s.id')
        ->join('menu2s', 'sliders.menu2_id', '=', 'menu2s.id')
        ->select('sliders.*', 'menu1s.menu1', 'menu2s.menu2')
        ->where('menu1s.menu1', '=', 'Giới thiệu')
        ->get();

        $slider_project = DB::table('sliders')
        ->join('menu1s', 'sliders.menu1_id', '=', 'menu1s.id')
        ->join('menu2s', 'sliders.menu2_id', '=', 'menu2s.id')
        ->join('menu3s', 'sliders.menu3_id', '=', 'menu3s.id')
        ->select('sliders.*', 'menu1s.menu1', 'menu2s.menu2', 'menu3s.menu3')
        ->where('menu1s.menu1', '=', 'Khóa học')
        ->get();

        $slider_sche = DB::table('sliders')
        ->join('menu1s', 'sliders.menu1_id', '=', 'menu1s.id')
        ->select('sliders.*', 'menu1s.menu1')
        ->where('menu1s.menu1', '=', 'Lịch khai giảng')
        ->get();


        $slider_lib = DB::table('sliders')
        ->join('menu1s', 'sliders.menu1_id', '=', 'menu1s.id')
        ->join('menu2s', 'sliders.menu2_id', '=', 'menu2s.id')
        ->select('sliders.*', 'menu1s.menu1', 'menu2s.menu2')
        ->where('menu1s.menu1', '=', 'Thư viện')
        ->get();


        $slider_emp = DB::table('sliders')
        ->join('menu1s', 'sliders.menu1_id', '=', 'menu1s.id')
        ->select('sliders.*', 'menu1s.menu1')
        ->where('menu1s.menu1', '=', 'Tuyển dụng')
        ->get();

        return view("admin-page.slider.index",
        compact('slider_home', 'slider_project', 'slider_about', 'slider_sche', 'slider_lib', 'slider_emp'));
    }

    public function create_home()
    {
        return view("admin-page.slider.home.add");
    }

    public function store_home(Request $request)
    {
        $request->validate([
            "image" => "bail|image|mimes:jpeg,png,gif,svg|max:2048",
        ]);

        $slider_home = new Slider();
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $destinationPath = public_path('img/slider');
            $request->image->move($destinationPath, $filename);
            $imagePath = 'img/slider/' .$filename;
            $slider_home->image = $imagePath;
            $slider_home->save();
        }

        return redirect()->route('slider.manage');
    }

    public function edit_home($id)
    {
        $slider = Slider::find($id);
        return view("admin-page.slider.home.edit", compact("slider"));
    }

    public function update_home(Request $request, $id)
    {
        $request->validate([
            "image" => "bail|image|mimes:jpeg,png,gif,svg|max:2048",
        ]);

        $slider = Slider::find($id);
        if ($request->hasFile("image")) {
            $existingImage = public_path($slider->image);
            if (File::exists($existingImage)) {
                File::delete($existingImage);
            }
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path("img/slider"), $imageName);
            $slider->image = "img/slider/" . $imageName;
            $slider->save();
        }

        Toastr::success('Updated success!');
        return redirect()->route("slider.manage");
    }

    public function delete_home($id)
    {
        $slider = Slider::find($id);
        if ($slider != null) {
            $imagePath = public_path($slider->image);
            $check = $slider->delete();
            if ($check) {
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                Toastr::success('Xóa slider thành công');
                return redirect()->back();
            }
            Toastr::warning('Xóa slider thất bại');
            return redirect()->back();
        }
        Toastr::error('Không tìm thấy slider để xóa');
        return redirect()->route("");
    }
}
