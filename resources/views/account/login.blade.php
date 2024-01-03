@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/account/login.css') }}" />

    <div class="login_form--wrapper">
        <div class="login_form">
            <div class="login_form--img-header">
                <img src="{{ asset('img/account/login/header-PhotoRoom.png-PhotoRoom.png') }}" alt="">
            </div>

            <div class="login_title">
                <h2>Login</h2>
            </div>

            <form class="login_form--input" method="post" action="{{ route('user.login') }}">
                @csrf
                <div class="mt-3 mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" placeholder="Enter email" class="form-control">
                </div>

                <label for="">Password</label>
                <div class="mt-1 mb-3 position-relative">
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                    <div class="login_eye">
                        <i class="bi bi-eye"></i>
                    </div>
                </div>

                <div class="mt-3 mb-3">
                    <a href="{{route('acc.forget')}}" class="">Forgot password?</a>
                </div>

                <button type="submit" class="login_form--button">
                    Login
                </button>
            </form>


            <div class="login_form--group1 mt-2">
                <span>Don't have account?</span>
                <a href="{{ route('user.signup') }}">Create Account</a>
                <br>
                <br>
                <span>---OR---</span>
                <br>
                <br>
                <span>Sign in with</span>
            </div>

            <div class="login_form--group2">
                <div class="login_gg">
                    <a href="{{route('acc.login.gg')}}">
                        <img src="{{ asset('img/account/login/gg.png') }}" alt="">
                    </a>
                </div>
                <div class="login_fb">
                    <a href="{{route('acc.login.fb')}}">
                        <img src="{{ asset('img/account/login/fb.png') }}" alt="">
                    </a>
                </div>
            </div>

            <div class="login_form--img-footer">
                <img src="{{ asset('img/account/login/footer-PhotoRoom.png-PhotoRoom.png') }}" alt="">
            </div>
        </div>
    </div>
@endsection
