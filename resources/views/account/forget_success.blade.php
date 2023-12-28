@extends('index')
@section('body')
<link rel="stylesheet" href="{{asset('css/account/verify_success.css')}}">
    <div class="forget_wrapper--success">
        <div class="forget_container--success">
            <div class="forget__success--img">
                <img class="bg" src="{{asset('img/account/success/bg-PhotoRoom.png-PhotoRoom.png')}}" alt="">
                <img class="relax" src="{{asset('img/account/success/relax-PhotoRoom.png-PhotoRoom.png')}}" alt="">
                <img class="vector1" src="{{asset('img/account/success/vector1-PhotoRoom.png-PhotoRoom.png')}}" alt="">
                <img class="vector2" src="{{asset('img/account/success/vector2-PhotoRoom.png-PhotoRoom.png')}}" alt="">
                <img class="vector3" src="{{asset('img/account/verify/vector3-PhotoRoom.png-PhotoRoom.png')}}" alt="">
                <img class="vector4" src="{{asset('img/account/verify/vector6-PhotoRoom.png-PhotoRoom.png')}}" alt="">
            </div>

            <div class="forget-title--success mt-3">
                <h2 style="color: black">Success</h2>
                <span>Please check your email for create a new password</span>
            </div>

            <div class="forget_signin--success mt-4">
                <span style="color: #6B7280;">Can't get email?</span>
                <a href="" style="text-decoration: none; color: blue">Resubmit</a>
            </div>

            <button type="submit" class="mt-5 forget_button--success">Back Email</button>
        </div>
    </div>
@endsection
