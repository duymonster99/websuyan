@extends('index')
@section('body')
<link rel="stylesheet" href="{{asset('css/library/vocabulary.css')}}">
<main>
    <img src="image/du-hoc/banner.jpg" alt="">

    <div class="vocab">
        <!-- Yen nhi -->
        <ul class="vocab__carousel">

            <li class="vocab__card">
                <img src="image/thanh-ngu/img1.jpg" alt="">
            </li>

            <!-- Tố Duyên -->
            <li class="vocab__card">
                <img src="image/thanh-ngu/img2.jpg" alt="">
            </li>

            <!-- Huyền Trang -->
            <li class="vocab__card">
                <img src="image/thanh-ngu/img3.jpg" alt="">
            </li>

            <!--  -->
            <li class="vocab__card">
                <img src="image/thanh-ngu/img4.jpg" alt="">
            </li>

            <!--  -->
            <li class="vocab__card">
                <img src="image/thanh-ngu/img5.jpg" alt="">
            </li>

            <!--  -->
            <li class="vocab__card">
                <img src="image/thanh-ngu/img6.jpg" alt="">
            </li>
        </ul>
    </div>
</main>
@endsection
