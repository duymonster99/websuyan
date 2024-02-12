@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/library/thi-hsk.css') }}">
    <main>
        @if (isset($banner))
            <img src="{{ asset($banner->banner) }}" alt="">
        @endif

        @if (isset($post))
            @foreach ($post as $item)
                <div class="exam_content">{!! $item->content !!}</div>
            @endforeach
        @endif
    </main>
@endsection
