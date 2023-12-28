@extends('index')
@section('body')
<link rel="stylesheet" href="{{asset('css/account/sign-up.css')}}">
<div class="signup_form--wrapper">
    <div class="signup_form">
        <div class="signup_form--img-header">
            <img src="{{asset('img/account/login/header-PhotoRoom.png-PhotoRoom.png')}}" alt="">
        </div>

        <div class="signup_title">
            <h2>Sign Up</h2>
        </div>

        <form class="signup_form--input" method="post" action="{{route('user.sign-up')}}">
            @csrf
            <div class="mt-3 mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter full name">
            </div>

            <div class="mt-3 mb-3">
                <label for="">Email</label>
                <input type="text" name="email" id="" placeholder="Enter email" class="form-control">
            </div>

            <div class="mt-3 mb-3 position-relative">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
                <i class="bi bi-eye"></i>
            </div>
            <button type="submit" class="signup_form--button">
                Sign Up
            </button>
        </form>


        <div class="signup_form--group1 mt-2">
            <span>Don't have account?</span>
            <a href="">Create Account</a>
            <br>
            <br>
            <span>---OR---</span>
            <br>
            <br>
            <span>Sign up with</span>
        </div>

        <div class="signup_form--group2">
            <div class="signup_gg">
                <a href="">
                    <img src="{{asset('img/account/login/gg.png')}}" alt="">
                </a>
            </div>
            <div class="signup_fb">
                <a href="">
                    <img src="{{asset('img/account/login/fb.png')}}" alt="">
                </a>
            </div>
        </div>

        <div class="signup_form--img-footer">
            <img src="{{asset('img/account/login/footer-PhotoRoom.png-PhotoRoom.png')}}" alt="">
        </div>
    </div>
</div>
@endsection
