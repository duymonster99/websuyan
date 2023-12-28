<?php

namespace App\Http\Controllers;

use App\Mail\VerifyAccount;
use App\Models\Account;
use App\Models\Admin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function show_form_login()
    {
        return view("account.login");
    }

    public function show_form_signup()
    {
        return view("account.sign-up");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|unique:accounts,fullname',
            'email' => 'bail|required|email|unique:accounts,email',
            'password' => 'bail|required|regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){7,31}$/|unique:accounts,password|min:8',
        ],
        [
            'name.required' => 'Vui lòng điền vào trường này',
            'name.unique' => 'Tên bạn nhập đã trùng. Vui lòng nhập đúng họ tên của bạn',
            'email.required' => 'Vui lòng điền vào trường này',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập vào trường này',
            'password.regex' => '* Password phải bao gồm 1 ký tự viết hoa đầu tiên, số và ký tự đặc biệt',
            'password.unique' => 'Password bạn nhập đã tồn tại',
            'password.min' => 'Password phải từ 8 ký tự trở lên',
        ]);

        $subject = "Verify Account";

        $user = new Account();
        $user->fullname = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        if($acc = $user)
        {
            Mail::to($acc->email)->send(new VerifyAccount($acc, $subject));
        }

        return redirect()->route('user.login')->with("signup_success", "Signup completed! Please login to start!");
    }

    public function verify_account($email)
    {
        $acc = Account::where("email", "=", $email)
        ->whereNull('status')
        ->first();

        if($acc)
        {
            $acc->status = "active";
            $acc->save();
            return redirect()->route("user.login.form");
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
            'password' => 'bail|required|regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){7,31}$/|min:8',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = Account::where("email", $email)->first();

        if(isset($user))
        {
            if(Hash::check($password, $user->password))
            {
                session()->put('accountLogin', $user->toArray());
                if($user->acc_type == "admin")
                {
                    return redirect()->route('admin.dashboard');
                }
                else
                {
                    return redirect()->route('user.home');
                }
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->forget('accountLogin');
        return redirect()->back();
    }

    public function forget_pass()
    {
        return view("account.forget_pass");
    }

    public function forget_pass_success()
    {
        return view("account.forget_success");
    }

    public function reset_pass()
    {
        return view("account.reset_pass");
    }
}
