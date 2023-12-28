@extends('index')
@section('body')
    <!-- ! Style css -->
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">

    <main id="home">
        <!-- banner image -->
        <div class="home__banner" style="z-index: 0">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="image/project/banner.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/du-hoc/banner.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/Student_Benefits/background.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- content title -->
        <div class="home-content">
            @if (isset($post))
                @foreach ($post as $item)
                    <div data-aos="fade-up-right" data-aos-duration="900" class="home-content_title">
                        <div class="home-content_title--avt">
                            {{-- <img src="{{ asset($item->images[0]->path) }}" alt=""> --}}
                        </div>

                        <div class="home-content_title--ttl">
                            <h3>
                                <strong>{{ $item->title }}</strong>
                            </h3>
                        </div>

                        <div class="home-content_title--para">
                            {!! $item->meta_description !!}
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

        <!-- curriculum -->
        <div data-aos="zoom-in-up" data-aos-duration="900" class="curriculum">
            <span>
                MUA GIÁO TRÌNH TIẾNG TRUNG ONLINE
            </span>

            <div class="btn_here">
                <button>TẠI ĐÂY</button>
            </div>
        </div>

        <!-- Slider project -->
        <div class="home__project-slider">
            <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900" class="home-project_title">
                <div class="home-project_border--left"></div>
                <span>CÁC KHÓA HỌC Ở SUYAN</span>
                <div class="home-project_border--right"></div>
            </div>

            <div class="home-project__wrapper">
                <ul class="home-project__carousel">
                    @if (isset($post_project))
                        @foreach ($post_project as $item)
                            <li class="home-project__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                data-aos-duration="900">
                                <div class="home-project__slider--title">
                                    <h4>
                                        <strong>
                                            {{ $item->title }}
                                        </strong>
                                    </h4>
                                </div>
                                <div class="home-project__slider--image">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>

                                <div class="home-project__slider--infor">
                                    {!! $item->meta_description !!}
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <!-- end slider -->

        <!-- slider cảm nhận học viên -->
        <div class="feel-home__container">
            <!-- TITLE -->
            <div data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-duration="900"
                data-aos-offset="0" class="feel-home__container--title">
                <span></span>
                <span>CẢM NHẬN CỦA HỌC VIÊN</span>
                <span></span>
            </div>
            <!-- slider feedback -->
            <div class="feel-home__container--slider">
                <!-- Slider main container -->
                <div data-aos="flip-up" data-aos-duration="900" class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @if (isset($post_review))
                            @foreach ($post_review as $item)
                                <div class="swiper-slide">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>

        <!-- Profile teacher -->
        <div class="home-profile-teacher">
            <div data-aos="zoom-in-down" data-aos-duration="900" class="home-profile-teacher__title">
                <span></span>
                <span class="title">GIẢNG VIÊN Ở SUYAN</span>
                <span></span>
            </div>

            <div data-aos="zoom-out" data-aos-duration="900" class="home-profile-teacher__wrapper">
                <i id="left" class="bi bi-arrow-left"></i>
                <ul class="home-profile-teacher__carousel">
                    @if (isset($post_teacher))
                        @foreach ($post_teacher as $item)
                            <li class="home-profile-teacher__card">
                                <div class="home-profile-teacher__name">
                                    {{$item->title}}
                                </div>
                                <div class="home-profile-teacher__image">
                                    <img src="{{asset($item->image)}}" alt="">
                                </div>
                            </li>
                        @endforeach
                    @endif

                </ul>
                <i id="right" class="bi bi-arrow-right"></i>
            </div>
        </div>

        <!-- register form -->
        <div class="registerForm container-fluid d-flex justify-content-evenly align-items-center flex-wrap mb-5"
            style="background: #c9e6c0">
            <div data-aos="zoom-out-right" data-aos-duration="900"
                class="registerForm__image h-35 d-flex justify-content-center pt-3">
                <a href="lich-khai-giang.html">
                    <img src="image/home/dang-ky.jpg" class="img-fluid h-100" alt="">
                </a>
            </div>

            <div data-aos="zoom-out-left" data-aos-duration="900"
                class="d-flex flex-column justify-content-center align-items-center mt-3" style="height: 50%">
                <div class="registerForm__details--box h-100">
                    <div class="registerForm__details--title mb-3">
                        <span>Đăng ký tư vấn khóa học ngay hôm nay</span>
                    </div>
                    <div class="registerForm__contact mb-3 w-100">
                        <div class="mb-1">
                            <label for="" class="form-label">Tên của bạn</label>
                            <input type="text" class="form-control w-100" id="" style="background: #c9e6c0">
                        </div>

                        <div class="mb-1">
                            <label for="" class="form-label">Địa chỉ email</label>
                            <input type="email" class="form-control" id="" style="background: #c9e6c0">
                        </div>

                        <div class="mb-1">
                            <label for="" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="" style="background: #c9e6c0">
                        </div>

                        <div class="mb-1">
                            <label for="" class="form-label">Khóa học</label>
                            <select class="form-select" id="" style="background: #c9e6c0">
                                <option class="bg-light" value="">Khóa học Trực tuyến Sơ cấp</option>
                                <option class="bg-light" value="">Khóa học Trực tuyến HSK3</option>
                                <option class="bg-light" value="">Khóa học Trực tuyến HSK4</option>
                                <option class="bg-light" value="">Khóa học Trực tuyến HSK5</option>
                                <option class="bg-light" value="">Khóa học Trực tuyến HSK6</option>
                                <option class="bg-light" value="">Khóa học Offline Sơ cấp</option>
                                <option class="bg-light" value="">Khóa học Luyện thi HSKK</option>
                                <option class="bg-light" value="">Khóa học theo yêu cầu (1-1)</option>
                                <option class="bg-light" value="">Khóa học cho Doanh nghiệp</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="registerForm__details--btn mt-3">
                    <button class="btn mb-3 float-right">
                        Gửi Suyan ngay
                    </button>
                </div>
            </div>
        </div>

        <!-- media -->
        <!-- <div data-aos="flip-down" data-aos-duration="900" class="media_wrapper">
                <div class="media__title">
                    <span></span>
                    <span class="title">TRUYỀN THÔNG</span>
                    <span></span>
                </div>

                <div class="media__content">
                    <img src="image/Procedure/truyen_thong.jpg" alt="">
                    <img src="image/Procedure/truyen_thong.jpg" alt="">
                    <img src="image/Procedure/truyen_thong.jpg" alt="">
                </div>
            </div> -->
    </main>
@endsection
