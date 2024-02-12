@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/khai-giang/khai-giang.css') }}">
    <main>
        <div class="sche_banner">
            @if (isset($banner))
                <img src="{{ asset($banner->banner) }}" alt="">
            @endif
        </div>

        <div class="container-fluid">
            @if (isset($post))
                @foreach ($post as $item)
                    <div class="content">
                        <img src="{{ asset($item->image) }}" alt="">
                        {!! $item->content !!}
                    </div>
                @endforeach
            @endif
        </div>
    </main>
@endsection
