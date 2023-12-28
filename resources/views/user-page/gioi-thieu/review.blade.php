@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/aboutus/review.css') }}">
    <main>
        <img src="image/Student_Benefits/background.jpg" alt class="bg">

        <div class="feel__container">
            <!-- TITLE -->
            <div class="feel__container--title">
                <span>FEEDBACK CỦA HỌC VIÊN</span>
            </div>
            <!-- slider feedback -->
            <div class="feel__container--slider">
                <!-- Additional required wrapper -->
                <ul class="feel_slider-wrapper">
                    <!-- Slides -->
                    <li class="feel_slider_details">
                        <img src="image/Procedure/feedback1.jpg" alt>
                    </li>
                    <li class="feel_slider_details">
                        <img src="image/Procedure/feedback1.jpg" alt>
                    </li>
                    <li class="feel_slider_details">
                        <img src="image/Procedure/feedback1.jpg" alt>
                    </li>
                    <li class="feel_slider_details">
                        <img src="image/Procedure/feedback1.jpg" alt>
                    </li>
                    <li class="feel_slider_details">
                        <img src="image/Procedure/feedback1.jpg" alt>
                    </li>
                    <li class="feel_slider_details">
                        <img src="image/Procedure/feedback1.jpg" alt>
                    </li>
                </ul>
            </div>
        </div>
    </main>
@endsection
