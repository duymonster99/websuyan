@extends('index')
@section('body')
<link rel="stylesheet" href="{{asset('css/library/thanh-ngu.css')}}">
<main>
    <img src="image/du-hoc/banner.jpg" alt="">

    <div class="idiom">

        <div class="idiom__wrapper">
            <!-- Yen nhi -->
            <i id="left" class="bi bi-arrow-left"></i>
            <ul class="idiom__carousel">
                <li class="idiom__card">
                        <img src="image/thanh-ngu/img1.jpg" alt="" draggable="false">
                </li>

                <!-- Tố Duyên -->
                <li class="idiom__card">
                        <img src="image/thanh-ngu/img2.jpg" alt="" draggable="false">
                </li>

                <!-- Huyền Trang -->
                <li class="idiom__card">
                        <img src="image/thanh-ngu/img3.jpg" alt="" draggable="false">
                </li>

                <!--  -->
                <li class="idiom__card">
                        <img src="image/thanh-ngu/img4.jpg" alt="" draggable="false">
                </li>

                <!--  -->
                <li class="idiom__card">
                        <img src="image/thanh-ngu/img5.jpg" alt="" draggable="false">
                </li>

                <!--  -->
                <li class="idiom__card">
                        <img src="image/thanh-ngu/img6.jpg" alt="" draggable="false">
                </li>
            </ul>
            <i id="right" class="bi bi-arrow-right"></i>
        </div>
    </div>
</main>
@endsection
