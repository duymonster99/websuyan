@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/aboutus/teacher.css') }}">
    <main>
        @if (isset($banner))
            <img src="{{ asset($banner->banner) }}" alt="" class="bg">
        @endif

        <div class="profile-teacher">
            <div class="profile-teacher__title">
                <span class="title">GIẢNG VIÊN Ở SUYAN</span>
            </div>

            <div class="profile-teacher__wrapper">
                <!-- Yen nhi -->
                <ul class="profile-teacher__carousel">
                    @if (isset($post))
                        @foreach ($post as $item)
                            <li class="profile-teacher__card">
                                <div class="profile-teacher__name">{{ $item->title }}</div>
                                <div class="profile-teacher__image">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        @if (isset($post))
            @foreach ($post as $item)
                <div class="teacher__content">
                    {!! $item->content !!}
                </div>
            @endforeach
        @endif
    </main>
@endsection
