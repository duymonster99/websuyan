@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
    @if (session('signup_success'))
        <div class="alert alert-success mt-3 position-relative">
            <strong>Success! </strong> {{ session('signup_success') }}
            <button type="button" class="btn-close position-absolute top-50 end-0 translate-middle" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    @endif

    @if (session('login_fail'))
        <div class="alert alert-danger mt-3 position-relative">
            <strong>Error! </strong> {{ session('login_fail') }}
            <button type="button" class="btn-close position-absolute top-50 end-0 translate-middle" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    @endif

    <div class="loginPage" id="loginPage">
        <div class="container" id="container">
            <!-- ! Form Sign-up -->
            <div class="form-container sign-up">
                <form action="{{ route('user.sign-up') }}" method="post">
                    @csrf
                    <h1>Create Account</h1>
                    <div class="social-icons">
                        <a href="#" class="icon">
                            <i class="fa-brands fa-google-plus-g"></i>
                        </a>
                        <a href="#" class="icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="icon">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="#" class="icon">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>

                    <span>or use your email for registeration</span>

                    <input type="text" placeholder="Full Name" name="name" value="{{ old('name') }}"
                        class="@error('name') is-invalid @enderror">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                        class="@error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <input type="password" placeholder="Password" name="password"
                        class="@error('password') is-invalid @enderror">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit">Sign Up</button>
                </form>
            </div>

            <!-- ! Form Sign-in -->
            <div class="form-container sign-in">
                <form action="{{route('user.login')}}" method="post">
                    @csrf
                    <h1>Sign In</h1>
                    <div class="social-icons">
                        <a href="#" class="icon">
                            <i class="fa-brands fa-google-plus-g"></i>
                        </a>
                        <a href="#" class="icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="icon">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="#" class="icon">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>

                    <span>or use your email password</span>

                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                        class="@error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <input type="password" placeholder="Password" name="password" class="@error('password') is-invalid @enderror">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <a href="{{route('acc.forget')}}">Forget your password?</a>
                    <button type="submit">Sign In</button>
                </form>
            </div>

            <!-- ! Toggle Element -->
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Welcome back!</h1>
                        <p>Enter your personal details to use all of site features</p>
                        <button class="hidden" id="login">Sign In</button>
                    </div>

                    <div class="toggle-panel toggle-right">
                        <h1>Hello, Friend!</h1>
                        <p>Register with your personal details to use all of site features</p>
                        <button class="hidden" id="register">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
