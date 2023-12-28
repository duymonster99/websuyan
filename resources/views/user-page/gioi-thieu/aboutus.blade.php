@extends('index')
@section('body')
    <link rel="stylesheet" href="{{asset('css/aboutus/aboutus.css')}}">

    <main>

        <div class="about__banner">
            <img src="image/Student_Benefits/background.jpg" alt>
        </div>

        <div data-aos="flip-up" data-aos-duration="900" class="about__title">VỀ
            TRUNG TÂM</div>

        <div class="about__info">
            <div data-aos="fade-right" data-aos-duration="900" class="about__info--container">
                <div class="about__info--title">Phòng học</div>
                <div class="about__info--img">
                    <img src="image/Procedure/qua.jpg" alt>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-duration="900" class="about__info--container">
                <div class="about__info--title">Giáo trình</div>
                <div class="about__info--img">
                    <img src="image/Procedure/qua.jpg" alt>
                </div>
            </div>

            <div data-aos="fade-left" data-aos-duration="900" class="about__info--container">
                <div class="about__info--title">Quà tặng học viên</div>
                <div class="about__info--img">
                    <img src="image/Procedure/qua.jpg" alt>
                </div>
            </div>
        </div>

        <div class="about__wrapper">
            <div data-aos="zoom-in-right" data-aos-duration="900" class="about__content">
                <div class="about__content--title">
                    TIÊU ĐỀ
                </div>

                <div class="about__content--para1">
                    Forem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
                    dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus,
                    ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus.
                </div>

                <div class="about__content--para2">
                    “Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum,
                    ac aliquet odio mattis.”
                </div>

                <div class="about__content--para3">
                    Borem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis
                    tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus
                    elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu
                    ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim
                    egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna.
                    Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum
                    tellus.
                    Curabitur tempor quis eros tempus lacinia. Nam bibendum pellentesque quam a convallis. Sed ut vulputate
                    nisi. Integer in felis sed leo vestibulum venenatis. Suspendisse quis arcu sem. Aenean feugiat ex eu
                    vestibulum vestibulum. Morbi a eleifend magna. Nam metus lacus, porttitor eu mauris a, blandit ultrices
                    nibh. Mauris sit amet magna non ligula vestibulum eleifend. Nulla varius volutpat turpis sed lacinia.
                    Nam eget mi in purus lobortis eleifend. Sed nec ante dictum sem condimentum ullamcorper quis venenatis
                    nisi. Proin vitae facilisis nisi, ac posuere leo.
                    Nam pulvinar blandit velit, id condimentum diam faucibus at. Aliquam lacus nisi, sollicitudin at nisi
                    nec, fermentum congue felis. Quisque mauris dolor, fringilla sed tincidunt ac, finibus non odio. Sed
                    vitae mauris nec ante pretium finibus. Donec nisl neque, pharetra ac elit eu, faucibus aliquam ligula.
                    Nullam dictum, tellus tincidunt tempor laoreet, nibh elit sollicitudin felis, eget feugiat sapien diam
                    nec nisl. Aenean gravida turpis nisi, consequat dictum risus dapibus a. Duis felis ante, varius in neque
                    eu, tempor suscipit sem. Maecenas ullamcorper gravida sem sit amet cursus. Etiam pulvinar purus vitae
                    justo pharetra consequat. Mauris id mi ut arcu feugiat maximus. Mauris consequat tellus id tempus
                    aliquet.\
                </div>

            </div>
    </main>
@endsection
