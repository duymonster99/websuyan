@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/tuyen-dung/tuyen-dung.css') }}">
    <main>
        @if (isset($post))
            @foreach ($post as $item)
                <img src="{{ $item->banner }}" alt="">
            @endforeach
        @endif

        <div class="emp_container">
            @if (isset($post))
                @foreach ($post as $item)
                    <img class="content" src="{{ $item->image }}" alt="">
                @endforeach
            @endif
        </div>
    </main>
@endsection
