<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (session('accountLogin')) {
            $acc_type = session('accountLogin')['acc_type'];
            if ($acc_type == "admin") {
                return view("admin-page.dashboard");
            } else {
                return redirect('/');
            }
        } else {
            return view("account.login");
        }
    }

    public function acc_manage()
    {
        $account_user = Account::where('acc_type', 'user')->get();
        $account_admin = Account::where('acc_type', 'admin')->get();
        return view('admin-page.account.index', compact('account_user', 'account_admin'));
    }

    public function edit_status(Request $request)
    {
        $data = $request->all();
        $acc = Account::find($data['id']);
        if ($acc) {
            if($acc->acc_type == 'user')
            {
                $acc->acc_type = 'admin';
            }
            else
            {
                $acc->acc_type = 'user';
            }
            $acc->save();
        }

        return response()->json([
            'data' => $acc,
        ]);
    }

    public function acc_edit($id)
    {
        $acc = Account::find($id);
        return view("admin-page.account.edit", compact("acc"));
    }

    public function acc_update(Request $request, $id)
    {
        $acc = Account::find($id);

        $acc->fullname = $request->input('fullname');
        $acc->email = $request->input('email');
        $acc->save();

        Toastr::success('Cập nhật tài khoản thành công');
        return redirect()->route('acc.manage');
    }

    public function delete($id)
    {
        Account::destroy($id);
        Toastr::success('Xóa tài khoản thành công');
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $name_search = trim($data['search']);
        $query = DB::table('posts')
            ->join('menu1s', 'posts.menu1_id', '=', 'menu1s.id')
            ->join('menu2s', 'posts.menu2_id', '=', 'menu2s.id')
            ->leftJoin('menu3s', 'posts.menu3_id', '=', 'menu3s.id')
            ->select('posts.*', 'menu1s.menu1', 'menu2s.menu2', 'menu3s.menu3')
            ->where('title', 'like', "%$name_search%")
            ->get();

        $data = $query->pluck('menu1');
        // dd($data);

        return view("admin-page.search", compact("query", "data"));
    }
}
