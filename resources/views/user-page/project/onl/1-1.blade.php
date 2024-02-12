@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/project/onl/1-1.css') }}">

    <main>
        @if (isset($banner))
            <div class="pro-11__banner">
                <img src="{{ asset($banner->banner) }}" alt>
            </div>
        @endif

        <div class="pro-11__wrapper">
            <div data-aos="zoom-in-right" data-aos-duration="900" class="pro-11__content">
                @if (isset($post))
                    @foreach ($post as $item)
                        <div class="pro-11__content--title">
                            {{ $item->title }}
                        </div>

                        <div class="pro-11__content--para1">
                            {!! $item->appendix !!}
                        </div>

                        <div class="pro-11__content--para3">
                            {!! $item->content !!}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
