@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/account/sign-up.css') }}">
    <div class="signup_form--wrapper">
        <div class="signup_form">
            <div class="signup_form--img-header">
                <img src="{{ asset('img/account/login/header-PhotoRoom.png-PhotoRoom.png') }}" alt="">
            </div>

            <div class="signup_title">
                <h2>Sign Up</h2>
            </div>

            <form class="signup_form--input" method="post" action="{{ route('user.sign-up') }}">
                @csrf
                <div class="mt-3 mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control"
                    value="{{old('name')}}" placeholder="Enter full name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3 mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" placeholder="Enter email"
                    value="{{old('email')}}" class="form-control">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3 mb-3 position-relative">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                    <div class="login_eye">
                        <i class="bi bi-eye"></i>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3 mb-3 position-relative">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Enter password">
                    <div class="login_eye">
                        <i class="bi bi-eye"></i>
                    </div>
                    @error('confirm_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="signup_form--button">
                    Sign Up
                </button>
            </form>


            <div class="signup_form--group1 mt-2">
                <span>Already account?</span>
                <a href="{{route('user.login.form')}}">Login</a>
                <br>
                <br>
                <span>---OR---</span>
                <br>
                <br>
                <span>Sign up with</span>
            </div>

            <div class="signup_form--group2">
                <div class="signup_gg">
                    <a href="{{route('acc.login.gg')}}">
                        <img src="{{ asset('img/account/login/gg.png') }}" alt="">
                    </a>
                </div>
                <div class="signup_fb">
                    <a href="{{route('acc.login.fb')}}">
                        <img src="{{ asset('img/account/login/fb.png') }}" alt="">
                    </a>
                </div>
            </div>

            <div class="signup_form--img-footer">
                <img src="{{ asset('img/account/login/footer-PhotoRoom.png-PhotoRoom.png') }}" alt="">
            </div>
        </div>
    </div>
@endsection
