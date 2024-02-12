@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/aboutus/aboutus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/project/project.css') }}">

    <main>
        @if (isset($post))
            <div class="about__banner">
                @foreach ($post as $item)
                    <img src="{{ asset($item->banner) }}" alt="">
                @endforeach
            </div>

            <div class="about__wrapper">
                <div data-aos="zoom-in-right" data-aos-duration="900" class="about__content">
                    @foreach ($post as $item)
                        <div class="about__content--title">
                            {{ $item->title }}
                        </div>

                        @if (isset($item->appendix))
                            <div class="about__content--para1">
                                {!! $item->appendix !!}
                            </div>
                        @endif

                        <div class="about__content--para3">
                            {!! $item->content !!}
                        </div>
                    @endforeach
                </div>
            </div>
        @elseif (isset($post_chung))
            <div id="project__container">
                <div class="project__banner">
                    @foreach ($post_chung as $item)
                        <img src="{{ asset($item->banner) }}" alt="">
                    @endforeach
                </div>

                <div class="project__content--page">
                    {{ $post_chung->content }}
                </div>

                <div class="wrapper">
                    <div class="project__wrapper">
                        <div class="project__content">
                            <div class="project__content--info">
                                    @foreach ($post_chung as $item)
                                        <div class="project__content--info-img">
                                            <img src="{{ asset($item->image) }}" alt>
                                        </div>

                                        <div class="project__content--info-about">
                                            <div class="project__content--about-title">
                                                <h3>{{ $item->title }}</h3>
                                            </div>

                                            <div class="project__content--about-horizontal"></div>

                                            <div class="project__content--about--para">
                                                {!! $item->meta_description !!}
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                            {{ $post_chung->links() }}
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
        @endif
    </main>
@endsection
