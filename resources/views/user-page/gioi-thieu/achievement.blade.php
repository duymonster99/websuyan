@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/aboutus/achievement.css') }}">
    <main>
        <img src="image/Student_Benefits/background.jpg" alt="" class="bg">

        <div class="achievement">
            <div data-aos="zoom-out" data-aos-duration="900" class="achievement__title">
                <span>THÀNH TÍCH HỌC VIÊN</span>
            </div>

            <div class="achievement__wrapper">
                <!-- Yen nhi -->
                <ul class="achievement__carousel">
                    <li data-aos="fade-down" data-aos-duration="900" class="achievement__card">
                        <div class="achievement__name">Yến Nhi</div>
                        <div class="achievement__image">
                            <img src="image/achievement/1.jpg" alt="">
                        </div>
                    </li>

                    <!-- Tố Duyên -->
                    <li data-aos="fade-up" data-aos-duration="900" class="achievement__card">
                        <div class="achievement__name">Yến Nhi</div>
                        <div class="achievement__image">
                            <img src="image/achievement/1.jpg" alt="">
                        </div>
                    </li>

                    <!-- Huyền Trang -->
                    <li data-aos="fade-down" data-aos-duration="900" class="achievement__card">
                        <div class="achievement__name">Yến Nhi</div>
                        <div class="achievement__image">
                            <img src="image/achievement/1.jpg" alt="">
                        </div>
                    </li>

                    <!--  -->
                    <li class="achievement__card">
                        <div class="achievement__name">Yến Nhi</div>
                        <div class="achievement__image">
                            <img src="image/achievement/1.jpg" alt="">
                        </div>
                    </li>

                    <!--  -->
                    <li class="achievement__card">
                        <div class="achievement__name">Yến Nhi</div>
                        <div class="achievement__image">
                            <img src="image/achievement/1.jpg" alt="">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
@endsection
