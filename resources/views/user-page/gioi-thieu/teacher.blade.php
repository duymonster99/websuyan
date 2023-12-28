@extends('index')
@section('body')
<link rel="stylesheet" href="{{asset('css/aboutus/teacher.css')}}">
<main>
    <img src="image/Student_Benefits/background.jpg" alt="" class="bg">

    <div class="profile-teacher">
        <div class="profile-teacher__title">
            <span class="title">GIẢNG VIÊN Ở SUYAN</span>
        </div>

        <div class="profile-teacher__wrapper">
            <!-- Yen nhi -->
            <ul class="profile-teacher__carousel">
                <li class="profile-teacher__card">
                    <div class="profile-teacher__name">Cô Yến Nhi</div>
                    <div class="profile-teacher__image">
                        <img src="image/Procedure/profile.jpg" alt="" draggable="false">
                    </div>
                </li>

                <!-- Tố Duyên -->
                <li class="profile-teacher__card">
                    <div class="profile-teacher__name">Cô Tố Duyên</div>
                    <div class="profile-teacher__image">
                        <img src="image/Procedure/profile2.jpg" alt="" draggable="false">
                    </div>
                </li>

                <!-- Huyền Trang -->
                <li class="profile-teacher__card">
                    <div class="profile-teacher__name">Cô Huyền Trang</div>
                    <div class="profile-teacher__image">
                        <img src="image/Procedure/profile3.jpg" alt="" draggable="false">
                    </div>
                </li>

                <!--  -->
                <li class="profile-teacher__card">
                    <div class="profile-teacher__name">Cô Yến Nhi</div>
                    <div class="profile-teacher__image">
                        <img src="image/Procedure/profile.jpg" alt="" draggable="false">
                    </div>
                </li>

                <!--  -->
                <li class="profile-teacher__card">
                    <div class="profile-teacher__name">Cô Yến Nhi</div>
                    <div class="profile-teacher__image">
                        <img src="image/Procedure/profile.jpg" alt="" draggable="false">
                    </div>
                </li>
            </ul>
        </div>
    </div>
</main>
@endsection
