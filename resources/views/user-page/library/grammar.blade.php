@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/library/grammar.css') }}">
    <main>

        <div class="grammar__sidebar">
            @if (isset($banner))
                <img src="{{ asset($banner->banner) }}" alt="">
            @endif
        </div>

        <div class="grammar__wrapper">
            <div class="grammar__content">
                @if (isset($post))
                    @foreach ($post as $item)
                        <div class="grammar__content--title">
                            {{ $item->title }}
                        </div>

                        <div class="grammar__content--para1">
                            {!! $item->appendix !!}
                        </div>

                        <div class="grammar__content--para3">
                            {!! $item->content !!}
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- vertical line -->
            <div class="vertical-line"></div>

            <div class="grammar__news">
                <div class="grammar__news--title"></div>

                <div class="grammar__news--hashtag">
                    BÀI VIẾT MỚI
                </div>

                <div class="grammar__news--content">
                    <div class="grammar__news--img">
                        <img src="image/grammar/content.jpg" alt="">
                    </div>

                    <div class="grammar__news--para">
                        Qorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac
                        aliquet odio mattis.
                    </div>
                </div>

                <hr>

                <div class="grammar__news--content">
                    <div class="grammar__news--img">
                        <img src="image/grammar/content.jpg" alt="">
                    </div>

                    <div class="grammar__news--para">
                        Qorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac
                        aliquet odio mattis.
                    </div>
                </div>

                <hr>

                <div class="grammar__news--content">
                    <div class="grammar__news--img">
                        <img src="image/grammar/content.jpg" alt="">
                    </div>

                    <div class="grammar__news--para">
                        Qorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac
                        aliquet odio mattis.
                    </div>
                </div>

                <hr>

                <div class="grammar__news--content">
                    <div class="grammar__news--img">
                        <img src="image/grammar/content.jpg" alt="">
                    </div>

                    <div class="grammar__news--para">
                        Qorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac
                        aliquet odio mattis.
                    </div>
                </div>

                <hr>

                <div class="grammar__news--content">
                    <div class="grammar__news--img">
                        <img src="image/grammar/content.jpg" alt="">
                    </div>

                    <div class="grammar__news--para">
                        Qorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac
                        aliquet odio mattis.
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
