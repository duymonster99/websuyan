<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPassword;
use App\Mail\VerifyAccount;
use App\Models\Account;
use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

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
        $request->validate(
            [
                'name' => 'bail|required|unique:accounts,fullname',
                'email' => 'bail|required|email|unique:accounts,email',
                'password' => 'bail|required|regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){7,31}$/|unique:accounts,password|min:8',
                'confirm_password' => 'bail|required|same:password',
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
                'confirm_password.required' => 'Vui lòng điền vào trường này',
                'confirm_password.same' => 'Password không khớp',
            ]
        );

        $subject = "Verify Account";

        $user = new Account();
        $user->fullname = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        if ($acc = $user) {
            Mail::to($acc->email)->send(new VerifyAccount($acc, $subject));
        }

        Toastr::success('Đăng ký thành công');
        return redirect()->route('user.login');
    }

    public function verify_account($email)
    {
        $acc = Account::where("email", "=", $email)
            ->whereNull('status')
            ->first();

        if ($acc) {
            $acc->status = "active";
            $acc->save();
            return redirect()->route("user.login.form");
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = Account::where("email", $email)->first();

        if (isset($user)) {
            if (Hash::check($password, $user->password)) {
                session()->put('accountLogin', $user->toArray());
                if ($user->acc_type == "admin") {
                    Toastr::success('Đăng nhập thành công');
                    return redirect()->route('admin.dashboard');
                } else {
                    Toastr::success('Đăng nhập thành công');
                    return redirect()->route('user.home');
                }
            } else {
                Toastr::error('Password không đúng');
                return redirect()->back()->with('password_error', 'Password không đúng');
            }
        } else {
            Toastr::error('Không tìm thấy email');
            return redirect()->back()->with('login_error', 'Không tìm thấy email');
        }
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = Account::where('email', $googleUser->email)->first();

            if (!$user) {
                $new_user = new Account();
                $new_user->email = $googleUser->email;
                $new_user->fullname = $googleUser->name;
                $new_user->save();

                session()->put('accountLogin', $new_user);
            } else {
                session()->put('accountLogin', $user->toArray());
            }
            Toastr::success('Đăng nhập thành công');
            return redirect()->route('user.home');
        } catch (\Throwable $th) {
            dd("Something went wrong! " . $th->getMessage());
        }
    }

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginFacebook()
    {
        try {
            $googleUser = Socialite::driver('facebook')->user();

            $user = Account::where('email', $googleUser->email)->first();

            if (!$user) {
                $new_user = new Account();
                $new_user->email = $googleUser->email;
                $new_user->fullname = $googleUser->name;
                $new_user->save();

                session()->put('accountLogin', $new_user);
            } else {
                session()->put('accountLogin', $user->toArray());
            }
            Toastr::success('Đăng nhập thành công');
            return redirect()->route('user.home');
        } catch (\Throwable $th) {
            dd("Something went wrong! " . $th->getMessage());
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

    public function forget_pass_success(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $email_forget = $data['email'];
        session()->put('email_forget', $email_forget);
        // dd($email_forget);

        $email_find = Account::where('email', $email_forget)->first();
        if($email_find)
        {
            $token_reset = Str::random(6);
            $email_find->reset_token = $token_reset;
            $email_find->save();

            $now = Carbon::now('Asia/Ho_Chi_Minh');
            $title_email = "Forget Password SuYan Education " .$now;
            $link_reset_pass = url("/nhap-mat-khau-moi/email=".$email_forget."/token=".$token_reset);

            if($acc = $email_find)
            {
                Mail::to($acc['email'])->send(new ForgetPassword($acc, $title_email, $token_reset));
            }

            Toastr::success('Gửi yêu cầu thành công');
            return view("account.forget_success");
        }
        else {
            Toastr::error('Vui lòng nhập chính xác email của bạn', 'Email bạn yêu cầu không tồn tại');
            return redirect()->back();
        }
    }

    public function reset_pass($email, $token)
    {
        return view("account.reset_pass", compact('email', 'token'));
    }

    public function new_pass(Request $request)
    {
        $request->validate([
            'new_password' => 'bail|required|regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){7,31}$/|unique:accounts,password|min:8',
            'confirm_password' => 'bail|required|same:new_password',
        ], [
            'new_password.min' => 'Mật khẩu có ít nhất 8 ký tự.',
            'new_password.required' => 'Vui lòng điền vào trường này',
            'new_password.unique' => 'Mật khẩu bạn nhập đã tồn tại. Vui lòng nhập mật khẩu khác.',
            'new_password.regex' => 'Mật khẩu phải bao gồm 1 ký tự viết hoa, số và ký tự đặc biệt',
            'confirm_password.required' => 'Không bỏ trống trường này',
            'confirm_password.same' => 'Mật khẩu không khớp',
        ]);

        $data = $request->all();
        $email = $data['email'];
        $new_password = $data['new_password'];
        $token_reset = $data['token'];

        $account_find = Account::where('email', $email)
        ->where('reset_token', $token_reset)->first();
        if($account_find)
        {
            $token = Str::random(6);
            $account_find->password = bcrypt($new_password);
            $account_find->reset_token = $token;
            $account_find->save();

            Toastr::success('Khôi phục mật khẩu thành công');
            return redirect()->route('user.login.form');
        }
        else {
            Toastr::error('Không tìm thấy email bạn muốn khôi phục mật khẩu');
            return redirect()->route('user.login.form');
        }
    }

    public function resubmit_email(Request $request)
    {
        $email = session()->get('email_forget');
        // dd($email);
        $email_find = Account::where('email', $email)->first();
        if($email_find)
        {
            $token_reset = Str::random(6);
            $email_find->reset_token = $token_reset;
            $email_find->save();

            $now = Carbon::now('Asia/Ho_Chi_Minh');
            $title_email = "Forget Password SuYan Education " .$now;
            $link_reset_pass = url("/nhap-mat-khau-moi/email=".$email."/token=".$token_reset);

            if($acc = $email_find)
            {
                Mail::to($acc['email'])->send(new ForgetPassword($acc, $title_email, $token_reset));
            }

            Toastr::success('Gửi yêu cầu thành công');
            return view("account.forget_success");
        }
        else {
            Toastr::error('Vui lòng nhập chính xác email của bạn', 'Email bạn yêu cầu không tồn tại');
            return redirect()->back();
        }
    }
}
