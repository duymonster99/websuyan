@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/aboutus/aboutus.css') }}">

    <main>
        <div class="about__banner">
            @if (isset($banner))
                <img src="{{ asset($banner->banner) }}" alt="">
            @endif
        </div>

        <div class="about__wrapper">
            <div data-aos="zoom-in-right" data-aos-duration="900" class="about__content">
                @if (isset($post))
                    @foreach ($post as $item)
                        <div class="about__content--title">
                            {{ $item->title }}
                        </div>

                        <div class="about__content--para1">
                            {!! $item->content1 !!}
                        </div>

                        <div class="about__content--para3">
                            {!! $item->content2 !!}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
