<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        if(session('accountLogin'))
        {
            $acc_type = session('accountLogin')['acc_type'];
            if($acc_type == "admin")
            {
                return view("admin-page.dashboard");
            }
            else {
                return redirect('/');
            }
        }
        else {
            return view("account.login");
        }
    }

    public function acc_manage()
    {
        $account = Account::all();
        return view('admin-page.account.index', compact('account'));
    }

    public function edit_status(Request $request)
    {
        $data = $request->all();
        $acc = Account::find($data['id']);
        if($acc)
        {
            $acc->acc_type = $data['acc_type'];
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

        return redirect()->route('acc.manage');
    }

    public function delete($id)
    {
        Account::destroy($id);
        return redirect()->back();
    }
}
