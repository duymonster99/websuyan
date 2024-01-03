@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/account/forget_pass.css') }}">
    <div class="forget_wrapper">
        <div class="forget_container">
            <div class="forget-img">
                <img src="{{ asset('img/account/verify/vector.jpg') }}" alt="" class="bg" style="">
                <img src="{{ asset('img/account/verify/verify1.png') }}" alt="" class="vector1" style="">
                <img src="{{ asset('img/account/verify/vector2-PhotoRoom.png-PhotoRoom.png') }}" alt=""
                    class="vector2">
                <img src="{{ asset('img/account/verify/vector3-PhotoRoom.png-PhotoRoom.png') }}" alt=""
                    class="vector3">
                <img src="{{ asset('img/account/verify/vector4-PhotoRoom.png-PhotoRoom.png') }}" alt=""
                    class="vector4">
                <img src="{{ asset('img/account/verify/vector5-PhotoRoom.png-PhotoRoom.png') }}" alt=""
                    class="vector5" style="">
                <img src="{{ asset('img/account/verify/vector6-PhotoRoom.png-PhotoRoom.png') }}" alt=""
                    class="vector6" style="">
            </div>

            <div class="forget-title mt-5">
                <h3 style="color: black">Forget Password</h3>
                <span>Enter your registered email below</span>
            </div>

            <form action="{{route('acc.forget.success')}}" method="post">
                @csrf
                <div class="forget_input--email mt-4">
                    <span>Email address</span>
                    <input type="text" name="email" class="form-control mt-1" placeholder="Enter your email">
                </div>

                <div class="forget_signin">
                    <span>Remember the password?</span>
                    <a href="{{ route('user.login.form') }}" style="text-decoration: none; color: blue">Sign in</a>
                </div>

                <button type="submit" class="mt-4 forget_button">Submit</button>
            </form>
        </div>
    </div>
@endsection
