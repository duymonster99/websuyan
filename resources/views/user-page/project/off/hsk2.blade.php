@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/project/off/hsk2.css') }}">

    <main>
        <div class="pro-h2-off__banner">
            @if (isset($banner))
                <img src="{{ asset($banner->banner) }}" alt="">
            @endif
        </div>

        <div class="pro-h2-off__wrapper">
            <div data-aos="zoom-in-right" data-aos-duration="900" class="pro-h2-off__content">
                @if (isset($post))
                    @foreach ($post as $item)
                        <div class="pro-h2-off__content--title">
                            {{ $item->title }}
                        </div>

                        <div class="pro-h2-off__content--para1">
                            {!! $item->content1 !!}
                        </div>

                        <div class="pro-h2-off__content--para3">
                            {!! $item->content2 !!}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
