@extends('index')
@section('body')
<link rel="stylesheet" href="{{asset('css/account/reset_pass.css')}}">
    <div class="reset-pass_wrapper">
        <div class="reset-pass_container">
            <div class="reset-pass_title">
                <h2 style="color: black">Change New Password</h2>
                <span>Enter a different password with the previous</span>
            </div>

            <div class="reset-pass_input mt-4">
                <label for="">New Password</label>
                <input type="password" placeholder="Enter new password" class="form-control">
            </div>

            <div class="reset-pass-confirm_input mt-2">
                <label for="">Confirm Password</label>
                <input type="password" placeholder="Enter confirm password" class="form-control">
            </div>

            <div class="reset-pass__img mt-5">
                <img class="bg" src="{{asset('img/account/reset_pass/bg-PhotoRoom.png-PhotoRoom.png')}}" alt>
                <img class="relax" src="{{asset('img/account/reset_pass/relax-PhotoRoom.png-PhotoRoom.png')}}" alt>
                <img class="vector1" src="{{asset('img/account/reset_pass/vector1-PhotoRoom.png-PhotoRoom.png')}}" alt>
                <img class="vector2" src="{{asset('img/account/reset_pass/vector2-PhotoRoom.png-PhotoRoom.png')}}" alt>
                <img class="vector3" src="{{asset('img/account/reset_pass/vector3-PhotoRoom.png-PhotoRoom.png')}}" alt>
            </div>

            <button type="submit" class="mt-5 reset-pass_button">Reset Password</button>
        </div>
    </div>
@endsection
