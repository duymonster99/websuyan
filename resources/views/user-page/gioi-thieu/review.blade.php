@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/aboutus/review.css') }}">
    <main>
        @if (isset($banner))
            <img src="{{ asset($banner->banner) }}" alt="" class="bg">
        @endif

        <div class="feel__container">
            <!-- TITLE -->
            <div class="feel__container--title">
                <span>FEEDBACK CỦA HỌC VIÊN</span>
            </div>
            <!-- slider feedback -->
            <div class="feel__container--slider">
                <!-- Additional required wrapper -->
                <ul class="feel_slider-wrapper">
                    <!-- Slides -->
                    @if (isset($post))
                        @foreach ($post as $item)
                            <li class="feel_slider_details">
                                <img src="{{ asset($item->image) }}" alt>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            @if (isset($post))
                @foreach ($post as $item)
                    <div class="feel_container--content">
                        {!! $item->content !!}
                    </div>
                @endforeach
            @endif
        </div>
    </main>
@endsection
