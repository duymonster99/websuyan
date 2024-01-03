@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/aboutus/achievement.css') }}">
    <main>
        @if (isset($banner))
            <img src="{{ asset($banner->banner) }}" alt="" class="bg">
        @endif


        <div class="achievement">
            <div data-aos="zoom-out" data-aos-duration="900" class="achievement__title">
                <span>THÀNH TÍCH HỌC VIÊN</span>
            </div>

            @if (isset($post))
                @foreach ($post as $item)
                    <div class="achievement__wrapper">
                        <!-- Yen nhi -->
                        <ul class="achievement__carousel">
                            <li data-aos="fade-down" data-aos-duration="900" class="achievement__card">
                                <div class="achievement__name">{{$item->title}}</div>
                                <div class="achievement__image">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                            </li>
                        </ul>
                    </div>
                @endforeach
            @endif

            @if (isset($post))
                @foreach ($post as $item)
                    <div class="achievement__content">
                        {!! $item->content2 !!}
                    </div>
                @endforeach
            @endif
        </div>
    </main>
@endsection
