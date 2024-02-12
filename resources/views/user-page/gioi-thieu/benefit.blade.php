@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/aboutus/benefit.css') }}">
    <main>
        @if (isset($banner))
            <img src="{{ asset($banner->banner) }}" alt="" class="bg">
        @endif

        <div class="benefits">
            <div class="benefits__title">
                <span>QUYỀN LỢI HỌC VIÊN</span>
            </div>

            <div class="benefits__wrapper">
                <!-- Yen nhi -->
                <ul class="benefits__carousel">
                    @if (isset($post))
                        @foreach ($post as $item)
                            <li class="benefits__card">
                                <div class="benefits__name">{{ $item->title }}</div>
                                <div class="benefits__image">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            @if (isset($post))
                @foreach ($post as $item)
                    <div class="benefits__content">
                        {!! $item->content !!}
                    </div>
                @endforeach
            @endif
        </div>
    </main>
@endsection
