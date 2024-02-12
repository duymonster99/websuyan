<?php
function renderMenuNavbar($categories, $parent_id = 0, $liClass = 'list-item__child')
{
    foreach ($categories as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<li class="' . $liClass . '">';
            if (isset($item->slug)) {
                echo '<a href="' . url("/$item->slug") . '">' . $item->name . '</a>';
            } else {
                echo '<span>' . $item->name . '</span>';
            }

            $hasChildren = false;

            // Kiểm tra xem có menu con không
            foreach ($categories as $itemChild) {
                if ($itemChild->parent_id == $item->id) {
                    $hasChildren = true;
                    break;
                }
            }

            // Nếu có menu con, thực hiện đệ quy để hiển thị menu con
            if ($hasChildren) {
                echo '<i class="fa-solid fa-chevron-down"></i>';
                echo '<ul class="list-item__expand">';

                unset($categories[$key]);
                foreach ($categories as $key => $valueChild) {
                    if ($valueChild->parent_id == $item->id) {
                        $title = $item->name;
                        $slug = Str::slug($title);

                        echo '<li class="list-item__expand--child">';
                            if (isset($valueChild->slug)) {
                                echo '<a href="' . url("$slug/$valueChild->slug") . '">' . $valueChild->name . '</a>';
                            } else {
                                echo '<span>' . $valueChild->name . '</span>';
                            }

                            $hasChild = false;

                            // Kiểm tra xem có menu con không
                            foreach ($categories as $itemChildren) {
                                if ($itemChildren->parent_id == $valueChild->id) {
                                    $hasChild = true;
                                    break;
                                }
                            }

                            if ($hasChild) {
                                echo '<i class="fa-solid fa-angle-right"></i>';
                                echo '<ul class="expand__project">';
                                foreach ($categories as $key => $valueChild3) {
                                    if ($valueChild3->parent_id == $valueChild->id) {
                                        $title_lv_2 = $valueChild->name;
                                        $slug_lv_2 = Str::slug($title_lv_2);

                                        echo '<li class="list-item__expand--child">';
                                        if (isset($valueChild3->slug)) {
                                            echo '<a href="' . url("$slug/$slug_lv_2/$valueChild3->slug") . '">' . $valueChild3->name . '</a>';
                                        } else {
                                            echo '<span>' . $valueChild3->name . '</span>';
                                        }
                                        echo '</li>';
                                    }
                                }
                                echo '</ul>';
                            }
                        echo '</li>';
                    }
                }
                echo '</ul>';
            }

            echo '</li>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiếng Trung SuYan</title>
    <!-- ! icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo_new.png') }}">
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
    <link rel="stylesheet" href="{{ asset('css/layout/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
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
                <a href="{{ route('user.home') }}" id="home">
                    <img src="{{ asset('img/logo_new.png') }}" alt width="60px" height="60px">
                    <span>Tiếng Trung SuYan</span>
                </a>
            </div>

            <!--! tool-bar -->
            <div class="nav-toolbar">
                <!-- procedure -->
                <ul class="list-item">
                    {{-- @if (isset($categories))
                        @foreach ($categories as $item)
                            @if ($item->parent_id == 0)
                                <li class="list-item__child">
                                    @if (isset($item->slug))
                                        <a href="{{ url("/$item->slug") }}">{{ $item->name }}</a>
                                    @else
                                        <span>{{ $item->name }}</span>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    @endif

                                    <ul class="list-item__expand">
                                        @foreach ($categories as $item_child)
                                            @if ($item_child->parent_id == $item->id)
                                                @php
                                                    $title = $item->name;
                                                    $slug = Str::slug($title);
                                                @endphp
                                                <li class="list-item__expand--child">
                                                    @if (isset($item_child->slug))
                                                        <a href="{{ url("/$slug/$item_child->slug") }}">
                                                            {{ $item_child->name }}
                                                        </a>
                                                    @else
                                                        <span>{{ $item_child->name }}</span>
                                                        <i class="fa-solid fa-angle-right"></i>
                                                    @endif

                                                    <ul class="expand__project">
                                                        @foreach ($categories as $item_child2)
                                                            @if ($item_child2->parent_id == $item_child->id)
                                                                @php
                                                                    $title_lv_2 = $item_child->name;
                                                                    $slug_lv_2 = Str::slug($title_lv_2);
                                                                @endphp
                                                                <li><a style="width: 100%"
                                                                        href="{{ url("$slug/$slug_lv_2/$item_child2->slug") }}">{{ $item_child2->name }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    @endif --}}

                    @if (isset($categories))
                        @php renderMenuNavbar($categories) @endphp
                    @endif
                </ul>

            </div>
            <!-- controller -->
            <div class="list-item controller">
                <!-- Search -->
                <div class="list-item search" id="search">
                    <button style="border: none; background: transparent"><i class="fa fa-search"></i></button>
                </div>

                <div class="search-box">
                    <div class="search-input d-flex">
                        <input type="text" class="form-control mx-1" placeholder="Search...">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>

                @if (session('accountLogin'))
                    <div class="dropdown">
                        <a href="#"
                            class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                            <strong>{{ session('accountLogin')['fullname'] }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('acc.logout') }}">Sign out</a></li>
                        </ul>
                    </div>
                @else
                    <!-- Login -->
                    <div class="list-item login login_responsive">
                        <a href="{{ route('user.login.form') }}">
                            <button class="signin">
                                Đăng nhập
                            </button>
                        </a>
                    </div>
                @endif

            </div>

            <!-- !responsive -->
            <button class="btn ham-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight">
                <i class="bi bi-x-lg"></i>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <main class="d-flex flex-nowrap">
                        <div class="flex-shrink-0 p-3 bg-white" style="width: 100%;">
                            <ul class="list-unstyled ps-0">
                                @if (isset($categories))
                                    @foreach ($categories as $key => $item)
                                        @if ($item->parent_id == 0)
                                            <li class="mb-1">
                                                <button
                                                    class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#dashboard-{{ $key }}"
                                                    aria-expanded="false">
                                                    @if (isset($item->slug))
                                                        <a href="{{ url("/$item->slug") }}"
                                                            class="link-dark d-inline-flex text-decoration-none rounded">{{ $item->name }}</a>
                                                    @else
                                                        {{ $item->name }}
                                                    @endif
                                                </button>
                                                @foreach ($categories as $item_lv_2)
                                                    @if ($item_lv_2->parent_id == $item->id)
                                                        <div class="collapse" id="dashboard-{{ $key }}">
                                                            <ul
                                                                class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                                <li>
                                                                    <button
                                                                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target=".collapse-child"
                                                                        aria-expanded="false">
                                                                        @if (isset($item_lv_2->slug))
                                                                            <a href="{{ url("/$item_lv_2->slug") }}"
                                                                                class="link-dark d-inline-flex text-decoration-none rounded">{{ $item_lv_2->name }}</a>
                                                                        @else
                                                                            {{ $item_lv_2->name }}
                                                                        @endif
                                                                    </button>
                                                                    @foreach ($categories as $item_lv_3)
                                                                        @if ($item_lv_3->parent_id == $item_lv_2->id)
                                                                            <div class="collapse"
                                                                                class="collapse-child">
                                                                                <ul
                                                                                    class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                                                    <li><a href="{{ url("/$item_lv_3->slug") }}"
                                                                                            class="link-dark d-inline-flex text-decoration-none rounded">{{ $item_lv_3->name }}</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                                {{-- <li class="mb-1">
                                    <button
                                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#home-collapse"
                                        aria-expanded="false">
                                        Giới thiệu
                                    </button>
                                    <div class="collapse" id="home-collapse">
                                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                            <li><a href="{{ route('user.aboutus') }}"
                                                    class="link-dark d-inline-flex text-decoration-none rounded">Về
                                                    chúng tôi</a></li>
                                            <li><a href="{{ route('user.benefit') }}"
                                                    class="link-dark d-inline-flex text-decoration-none rounded">Quyền
                                                    lợi của học viên</a></li>
                                            <li><a href="{{ route('user.achievement') }}"
                                                    class="link-dark d-inline-flex text-decoration-none rounded">Thành
                                                    tích học viên</a></li>
                                            <li><a href="{{ route('user.review') }}"
                                                    class="link-dark d-inline-flex text-decoration-none rounded">Review
                                                    từ học viên</a></li>
                                            <li><a href="{{ route('user.teacher') }}"
                                                    class="link-dark d-inline-flex text-decoration-none rounded">Giảng
                                                    viên</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <button
                                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#dashboard-collapse"
                                        aria-expanded="false">
                                        <a href="{{ route('user.project') }}"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Khóa học</a>
                                    </button>
                                    <div class="collapse" id="dashboard-collapse">
                                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                            <li>
                                                <button
                                                    class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                                    data-bs-toggle="collapse" data-bs-target="#proj-onl-collapse"
                                                    aria-expanded="false">
                                                    Khóa học online
                                                </button>
                                                <div class="collapse" id="proj-onl-collapse">
                                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                        <li><a href="{{ route('user.project.h2') }}"
                                                                class="link-dark d-inline-flex text-decoration-none rounded">Sơ
                                                                cấp HSK0 - HSK2</a></li>
                                                        <li><a href="{{ route('user.project.h3') }}"
                                                                class="link-dark d-inline-flex text-decoration-none rounded">HSK3</a>
                                                        </li>
                                                        <li><a href="{{ route('user.project.h4') }}"
                                                                class="link-dark d-inline-flex text-decoration-none rounded">HSK4</a>
                                                        </li>
                                                        <li><a href="{{ route('user.project.h5') }}"
                                                                class="link-dark d-inline-flex text-decoration-none rounded">HSK5</a>
                                                        </li>
                                                        <li><a href="{{ route('user.project.h6') }}"
                                                                class="link-dark d-inline-flex text-decoration-none rounded">HSK6</a>
                                                        </li>
                                                        <li><a href="{{ route('user.project.11') }}"
                                                                class="link-dark d-inline-flex text-decoration-none rounded">Khóa
                                                                học 1-1</a></li>
                                                        <li><a href="{{ route('user.project.kk') }}"
                                                                class="link-dark d-inline-flex text-decoration-none rounded">Khẩu
                                                                ngữ</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <button
                                                    class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                                    data-bs-toggle="collapse" data-bs-target="#proj-onf-collapse"
                                                    aria-expanded="false">
                                                    Khóa học offline
                                                </button>
                                                <div class="collapse" id="proj-onf-collapse">
                                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                        <li><a href="{{ route('user.project.hsk2.off') }}"
                                                                class="link-dark d-inline-flex text-decoration-none rounded">Sơ
                                                                cấp HSK0 - HSK2</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <button
                                                    class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                                    data-bs-toggle="collapse" data-bs-target="#proj-yct-collapse"
                                                    aria-expanded="false">
                                                    Khóa học cho trẻ em
                                                </button>
                                                <div class="collapse" id="proj-yct-collapse">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <button
                                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed">
                                        <a href="{{ route('user.lich') }}">Lịch khai giảng</a>
                                    </button>
                                </li>

                                <li class="mb-1">
                                    <button
                                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#lib-collapse"
                                        aria-expanded="false">
                                        Thư viện
                                    </button>
                                    <div class="collapse" id="lib-collapse">
                                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                            <li><a href="{{ route('user.vocab') }}"
                                                    class="link-dark d-inline-flex text-decoration-none rounded">Từ
                                                    vựng Tiếng Trung</a>
                                            </li>
                                            <li><a href="{{ route('user.grammar') }}"
                                                    class="link-dark d-inline-flex text-decoration-none rounded">Ngữ
                                                    pháp Tiếng Trung</a>
                                            </li>
                                            <li><a href="{{ route('user.thanh.ngu') }}"
                                                    class="link-dark d-inline-flex text-decoration-none rounded">Thành
                                                    ngữ Tiếng trung</a>
                                            </li>
                                            <li><a href="{{ route('user.duhoc') }}"
                                                    class="link-dark d-inline-flex text-decoration-none rounded">Du học
                                                    Trung Quốc</a>
                                            </li>
                                            <li><a href="{{ route('user.thi.hsk') }}"
                                                    class="link-dark d-inline-flex text-decoration-none rounded">Kinh
                                                    nghiệm thi HSK</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="mb-1">
                                    <button
                                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed">
                                        <a href="{{ route('user.employ') }}">Tuyển dụng</a>
                                    </button>
                                </li>

                                <li class="mb-1">
                                    <button
                                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed">
                                        <a href="{{ route('user.contact') }}">Liên hệ</a>
                                    </button>
                                </li> --}}

                                <li class="border-top my-3"></li>
                                <li class="mb-1">
                                    @if (session('accountLogin'))
                                        <button
                                            class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#account-collapse"
                                            aria-expanded="false">
                                            {{ session('accountLogin')['fullname'] }}
                                        </button>
                                        <div class="collapse" id="account-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li><a href="#"
                                                        class="link-dark d-inline-flex text-decoration-none rounded">New...</a>
                                                </li>
                                                <li><a href="#"
                                                        class="link-dark d-inline-flex text-decoration-none rounded">Profile</a>
                                                </li>
                                                <li><a href="#"
                                                        class="link-dark d-inline-flex text-decoration-none rounded">Settings</a>
                                                </li>
                                                <li><a href="#"
                                                        class="link-dark d-inline-flex text-decoration-none rounded">Sign
                                                        out</a></li>
                                            </ul>
                                        </div>
                                    @else
                                        <!-- Login -->
                                        <div class="list-item login">
                                            <a href="{{ route('user.login.form') }}">
                                                <button class="signin">
                                                    Đăng nhập
                                                </button>
                                            </a>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </main>
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
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0"
    nonce="QbdBG7IO"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<script src="js/header.js"></script>
<!-- Tiny MCE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.2/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- ! Swiper js -->
<script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'
</script>

<script src="{{ asset('js/swiper.js') }}"></script>

<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/login.js') }}"></script>
<script src="{{ asset('js/slick-slider.js') }}"></script>
<script src="{{ asset('js/login.js') }}"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}


</html>
