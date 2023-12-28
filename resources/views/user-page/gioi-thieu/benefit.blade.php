@extends('index')
@section('body')
<link rel="stylesheet" href="{{asset('css/aboutus/benefit.css')}}">
    <main>
        <img src="image/Student_Benefits/background.jpg" alt="" class="bg">
        <div class="benefits">
            <div class="benefits__title">
                <span>QUYỀN LỢI HỌC VIÊN</span>
            </div>

            <div class="benefits__wrapper">
                <!-- Yen nhi -->
                <ul class="benefits__carousel">
                    <li class="benefits__card">
                        <div class="benefits__name">Quyền lợi học viên</div>
                        <div class="benefits__image">
                            <img src="image/Student_Benefits/benefit.jpg" alt="">
                        </div>
                    </li>

                    <!-- Tố Duyên -->
                    <li class="benefits__card">
                        <div class="benefits__name">Feedback học viên</div>
                        <div class="benefits__image">
                            <img src="image/Student_Benefits/benefit.jpg" alt="">
                        </div>
                    </li>

                    <!-- Huyền Trang -->
                    <li class="benefits__card">
                        <div class="benefits__name">Quà tặng học viên</div>
                        <div class="benefits__image">
                            <img src="image/Student_Benefits/benefit.jpg" alt="">
                        </div>
                    </li>

                    <!--  -->
                    <li class="benefits__card">
                        <div class="benefits__name">Quyền lợi học viên</div>
                        <div class="benefits__image">
                            <img src="image/Student_Benefits/benefit.jpg" alt="">
                        </div>
                    </li>

                    <!--  -->
                    <li class="benefits__card">
                        <div class="benefits__name">Feedback học viên</div>
                        <div class="benefits__image">
                            <img src="image/Student_Benefits/benefit.jpg" alt="">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
@endsection
