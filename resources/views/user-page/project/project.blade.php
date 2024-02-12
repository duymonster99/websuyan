@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/project/project.css') }}">
    <main>
        <div id="project__container">
            <div class="project__banner">
                @if (isset($banner))
                    <img src="{{ asset( $banner->image ) }}" alt="">
                @endif
            </div>

            @if (isset($post))
                <div class="project__content--page">
                    {{ $post->content }}
                </div>
            @endif

            <div class="wrapper">
                <div class="project__wrapper">
                    <div class="project__content">
                        <div class="project__content--info">
                            @if (isset($post))
                                @foreach ($post as $item)
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
                            @endif
                        </div>
                        {{ $post->links() }}
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
