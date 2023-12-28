<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiếng Trung SuYan</title>
    <!-- ! icon -->
    <link rel="icon" type="image/x-icon" href="{{asset('img/logo_new.png')}}">
    <!-- !Style CSS -->
    <link rel="stylesheet" href="public/css/inc/header.css">
    <link rel="stylesheet" href="public/css/inc/footer.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">

    <!-- ! font awesome -->
    <script src="https://kit.fontawesome.com/f1f37bb2ce.js" crossorigin="anonymous"></script>

    <!-- ! JQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- !font bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- !AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- ! Swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    {{-- css style --}}
    <link rel="stylesheet" href="{{ asset('css/layout/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style-type: none;
            text-decoration: none;
        }

        :root {
            --font-Montserrat: 'Montserrat', sans-serif --primary: #ec994b;
            --white: #ffffff;
            --bg: #f5f5f5;
            --primaryColor: #f1f1f1;
            --black: #222;
            --orange: #eb0028;
            --white: #fff;
            --grey: #959595;
            --grey2: #666;
            --secondaryColor: #2b1f4d;
            --yellow: #ffcc00;
            --blue: #02182b;
        }

        html {
            font-family: var(--font-Montserrat);
            box-sizing: border-box;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        body,
        input {
            /* font-size: 1.6rem; */
            font-weight: 400;
            color: var(--black);
        }

        a {
            text-decoration: none;
            color: #070707;
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
        }

        h3,
        h4 {
            font-weight: 500;
        }

        ::-webkit-scrollbar {
            width: 1rem;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 1rem;
            background: #797979;
            transition: all 0.5s ease-in-out;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #222224;
        }

        ::-webkit-scrollbar-track {
            background: #f9f9f9;
        }
    </style>
</head>

<body>
    {{--
        =========================
        HEADER
        =========================
    --}}
    <div id="headerID">
        <!-- nav-bar -->
        <div id="header">
            <!-- logo -->
            <div class="logo">
                <a href="{{route('user.home')}}" id="home">
                    <img src="{{asset('img/logo_new.png')}}" alt width="60px" height="60px">
                    <span>Tiếng Trung SuYan</span>
                </a>
            </div>

            <!--! tool-bar -->
            <div class="nav-toolbar">
                <!-- procedure -->
                <div class="list-item">
                    <i class="fa-solid fa-angle-left"></i>
                    <div class="list-item__procedure">
                        <span>Giới thiệu</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="list-item__expand-procedure">
                        <a href="{{route('user.aboutus')}}">
                            Về trung tâm
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </a>
                        <a href="{{route('user.benefit')}}">
                            Quyền lợi của học viên
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </a>
                        <a href="{{route('user.achievement')}}">
                            Thành tích học viên
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </a>
                        <a href="{{route('user.review')}}">
                            Review từ học viên
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </a>
                        <a href="{{route('user.teacher')}}">
                            Giảng viên
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </a>
                    </div>
                </div>

                <!-- project -->
                <div class="list-item">
                    <i class="fa-solid fa-angle-left"></i>
                    <div class="list-item__project">
                        <a href="{{route('user.project')}}">
                            Khóa học
                        </a>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="list-item__expand-project">
                        <div class="expand__onl">
                            <i class="fa-solid fa-angle-left"></i>
                            <div>
                                <span>Khóa học online</span>
                                <i class="fa-solid fa-angle-right"></i>
                                <div class="expand__project-onl">
                                    <a>Sơ cấp HSK0 - HSK2</a>
                                    <a>HSK3</a>
                                    <a>HSK4</a>
                                    <a>HSK5</a>
                                    <a>HSK6</a>
                                    <a>Khẩu ngữ</a>
                                    <a>1-1</a>
                                </div>
                            </div>
                        </div>
                        <div class="expand__off">
                            <i class="fa-solid fa-angle-left"></i>
                            <div>
                                Khóa học offline
                                <i class="fa-solid fa-angle-right"></i>
                                <div class="expand__project-off">
                                    <a href>Sơ cấp HSK0 - HSK2</a>
                                    <a href>HSK3</a>
                                    <a href>HSK4</a>
                                    <a href>HSK5</a>
                                    <a href>HSK6</a>
                                    <a href>Khẩu ngữ</a>
                                    <a href>1-1</a>
                                </div>
                            </div>
                        </div>
                        <div class="expand__child">
                            Khóa học cho trẻ em
                        </div>
                    </div>
                </div>

                <!-- khai giảng -->
                <div class="list-item">
                    <div>
                        <a href="{{route('user.lich')}}">
                            Lịch khai giảng
                        </a>
                    </div>
                </div>

                <!-- Library -->
                <div class="list-item">
                    <i class="fa-solid fa-angle-left"></i>
                    <div class="list-item__library">
                        Thư viện
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="list-item__expand-library">
                        <a href="{{route('user.vocab')}}">Từ vựng Tiếng Trung
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </a>
                        <a href="{{route('user.grammar')}}">Ngữ pháp Tiếng Trung
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </a>
                        <a href="{{route('user.thanh.ngu')}}">Thành ngữ Tiếng Trung
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </a>
                        <a href="{{route('user.duhoc')}}">Du học Trung Quốc
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </a>
                        <a href="{{route('user.thi.hsk')}}">Kinh nghiệm thi HSK
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </a>
                    </div>
                </div>

                <!-- Employ -->
                <div class="list-item">
                    <div>
                        <a href="{{route('user.employ')}}">Tuyển dụng</a>
                    </div>
                </div>

                <!-- Contact -->
                <div class="list-item">
                    <div>
                        <a href="{{route('user.contact')}}">Liên hệ</a>
                    </div>
                </div>

            </div>
            <!-- controller -->
            <div class="list-item controller">
                <!-- Search -->
                <div class="list-item search">
                    <i class="fa fa-search"></i>
                </div>

                @if (session('accountLogin'))
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                            <strong>{{session('accountLogin')['fullname']}}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{route('acc.logout')}}">Sign out</a></li>
                        </ul>
                    </div>
                @else
                    <!-- Login -->
                    <div class="list-item login">
                        <a href="{{route('user.login.form')}}">
                            <button class="signin">
                                Đăng nhập
                            </button>
                        </a>
                    </div>
                @endif

            </div>

            <!-- !responsive -->
            <div class="responsive__icon--header">
                <div class="ham-menu ">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>

    {{--
        =========================
        BODY
        =========================
    --}}

    <div>
        @yield('body')
    </div>

    {{--
        =========================
        FOOTER
        =========================
    --}}
    <footer data-aos="fade-up" data-aos-duration="900">
        <div class="footer_container">
            <div class="list_infor">
                <h1>VỀ CHÚNG TÔI</h1>
                <p>Tên công ty:</p>
                <p>Công ty TNHH Giáo dục và Phát triển SuYan</p>

                <p>Mã số thuế:</p>
                <p>Địa chỉ: 491/44 Lê Văn Sỹ, P.12, Q.3, TP. Hồ Chí Minh</p>
                <p>Email: tiengtrungsuyan@gmail.com</p>
                <p>Tel: 0706216731</p>
            </div>

            <div class="list_infor">
                <h1>Fanpage Facebook</h1>
                <div class="fb-page" data-href="https://www.facebook.com/tiengtrungsuyanne" data-tabs="timeline"
                    data-width="320" data-height="220" data-small-header="true" data-adapt-container-width="false"
                    data-hide-cover="false" data-hide-cta="false" data-show-facepile="false">
                    <blockquote cite="https://www.facebook.com/tiengtrungsuyanne" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/tiengtrungsuyan">
                            Tiếng Trung SuYan
                        </a>
                    </blockquote>
                </div>
            </div>

            <div class="list_infor">
                <h1>KẾT NỐI CHÚNG TÔI</h1>
                <div class="link">
                    <a href="">
                        <i class="bi bi-facebook" style="width: 20px;"></i>
                    </a>
                    <a href="">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="">
                        <i class="bi bi-tiktok"></i>
                    </a>
                </div>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2343556177266!2d106.71586447495783!3d10.79335448935645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752926c8354f21%3A0x2eb92902690110fd!2sTi%E1%BA%BFng%20Trung%20SuYan!5e0!3m2!1sen!2s!4v1686304599951!5m2!1sen!2s"
                    width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </footer>

    <!-- ! embed plugin fb -->
    <div id="fb-root"></div>

</body>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0"
    nonce="QbdBG7IO"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script src="js/header.js"></script>
<!-- Tiny MCE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.2/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- ! Swiper js -->
<script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'
</script>

<script src="{{asset('js/swiper.js')}}"></script>

<script src="{{asset('js/carousel.js')}}"></script>
<script src="{{asset('js/login.js')}}"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

</html>
