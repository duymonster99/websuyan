@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/project/project.css') }}">
    <main>
        <div id="project__container">
            <div class="project__banner">
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

            <div class="wrapper">
                <div class="project__wrapper">
                    <div class="project__content">
                        <div class="project__content--info">
                            <div class="project__content--info-img">
                                <img src="image/project/content.jpg" alt>
                            </div>

                            <div class="project__content--info-about">
                                <div class="project__content--about-title">
                                    <h3>KHÓA HỌC HSK 0 - 2</h3>
                                </div>

                                <div class="project__content--about-horizontal"></div>

                                <div class="project__content--about--para">
                                    Gorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Nunc vulputate libero et
                                    velit interdum, ac aliquet odio mattis.
                                    Class aptent taciti sociosqu ad litora
                                    torquent per conubia nostra, per inceptos
                                    himenaeos.
                                </div>
                            </div>
                        </div>

                        <div class="project__content--info">
                            <div class="project__content--info-img">
                                <img src="image/project/content.jpg" alt>
                            </div>

                            <div class="project__content--info-about">
                                <div class="project__content--about-title">
                                    <h3>KHÓA HỌC HSK3</h3>
                                </div>

                                <div class="project__content--about-horizontal"></div>

                                <div class="project__content--about--para">
                                    Gorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Nunc vulputate libero et
                                    velit interdum, ac aliquet odio mattis.
                                    Class aptent taciti sociosqu ad litora
                                    torquent per conubia nostra, per inceptos
                                    himenaeos.
                                </div>
                            </div>
                        </div>

                        <div class="project__content--info">
                            <div class="project__content--info-img">
                                <img src="image/project/content.jpg" alt>
                            </div>

                            <div class="project__content--info-about">
                                <div class="project__content--about-title">
                                    <h3>KHÓA HỌC HSK4</h3>
                                </div>

                                <div class="project__content--about-horizontal"></div>

                                <div class="project__content--about--para">
                                    Gorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Nunc vulputate libero et
                                    velit interdum, ac aliquet odio mattis.
                                    Class aptent taciti sociosqu ad litora
                                    torquent per conubia nostra, per inceptos
                                    himenaeos.
                                </div>
                            </div>
                        </div>

                        <div class="project__content--info">
                            <div class="project__content--info-img">
                                <img src="image/project/content.jpg" alt>
                            </div>

                            <div class="project__content--info-about">
                                <div class="project__content--about-title">
                                    <h3>KHÓA HỌC HSK5</h3>
                                </div>

                                <div class="project__content--about-horizontal"></div>

                                <div class="project__content--about--para">
                                    Gorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Nunc vulputate libero et
                                    velit interdum, ac aliquet odio mattis.
                                    Class aptent taciti sociosqu ad litora
                                    torquent per conubia nostra, per inceptos
                                    himenaeos.
                                </div>
                            </div>
                        </div>



                        <!-- todo ==================== PAGINATION -->

                    </div>

                    <!-- vertical line -->
                    <div class="vertical-line"></div>

                    <div class="project__news">
                        <div class="project__news--hashtag">
                            BÀI VIẾT MỚI
                        </div>

                        <div class="project__news--content">
                            <div class="project__news--img">
                                <img src="image/grammar/content.jpg" alt>
                            </div>

                            <div class="project__news--para">
                                Qorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Nunc vulputate libero et velit
                                interdum, ac aliquet odio mattis.
                            </div>
                        </div>

                        <hr>

                        <div class="project__news--content">
                            <div class="project__news--img">
                                <img src="image/grammar/content.jpg" alt>
                            </div>

                            <div class="project__news--para">
                                Qorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Nunc vulputate libero et velit
                                interdum, ac aliquet odio mattis.
                            </div>
                        </div>

                        <hr>

                        <div class="project__news--content">
                            <div class="project__news--img">
                                <img src="image/grammar/content.jpg" alt>
                            </div>

                            <div class="project__news--para">
                                Qorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Nunc vulputate libero et velit
                                interdum, ac aliquet odio mattis.
                            </div>
                        </div>

                        <hr>

                        <div class="project__news--content">
                            <div class="project__news--img">
                                <img src="image/grammar/content.jpg" alt>
                            </div>

                            <div class="project__news--para">
                                Qorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Nunc vulputate libero et velit
                                interdum, ac aliquet odio mattis.
                            </div>
                        </div>

                        <hr>

                        <div class="project__news--content">
                            <div class="project__news--img">
                                <img src="image/grammar/content.jpg" alt>
                            </div>

                            <div class="project__news--para">
                                Qorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Nunc vulputate libero et velit
                                interdum, ac aliquet odio mattis.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
