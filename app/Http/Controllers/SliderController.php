<?php

namespace App\Http\Controllers;

use App\Models\Menu1;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $slider = DB::table('sliders')
        ->leftJoin('menu1s', 'sliders.menu1_id', '=', 'menu1s.id')
        ->select('sliders.*', 'menu1s.menu1')
        ->get();

        return view("admin-page.slider.index",
        compact('slider'));
    }

    public function create()
    {
        $menu = Menu1::where('menu1', '=', 'Khóa học')->get();
        return view("admin-page.slider.project.add", compact('menu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "image" => "bail|image|mimes:jpeg,png,gif,svg|max:100000",
        ]);

        $slider_home = new Slider();
        $slider_home->menu1_id = $request->input('menu');
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $destinationPath = public_path('img/slider');
            $request->image->move($destinationPath, $filename);
            $imagePath = 'img/slider/' .$filename;
            $slider_home->image = $imagePath;
            $slider_home->save();
        }

        Toastr::success('Thêm banner thành công');
        return redirect()->route('slider.manage');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        $menu = Menu1::where('menu1', '=', 'Khóa học')->get();
        return view("admin-page.slider.project.edit", compact("slider", "menu"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "image" => "bail|image|mimes:jpeg,png,gif,svg|max:2048",
        ]);

        $slider = Slider::find($id);
        $slider->menu1_id = $request->input('menu');
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

    public function delete($id)
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

    public function change_status(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $status_banner = $data['status_banner'];

        $post = Slider::find($id);

        if(isset($post))
        {
            $post->status = $status_banner;
            $post->save();
        }

        Toastr::success('Cập nhật thành công');
        return response()->json([
            'data'=>$data,
        ]);
    }

    public function change_decrease_stt(Request $request)
    {
        $data = $request->all();

        $slider = Slider::find($data['id']);

        if(isset($slider))
        {
            $slider->stt -= 1;
            $slider->save();
        }

        $stt = $slider->stt;

        Toastr::success('Cập nhật thành công');
        return response()->json([
            'data_slider' => $stt,
        ]);
    }

    public function change_increase_stt(Request $request)
    {
        $data = $request->all();

        $slider = Slider::find($data['id']);

        if(isset($slider))
        {
            $slider->stt += 1;
            $slider->save();
        }

        $stt = $slider->stt;

        Toastr::success('Cập nhật thành công');
        return response()->json([
            'data_slider' => $stt,
        ]);
    }
}
