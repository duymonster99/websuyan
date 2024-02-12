@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/library/du-hoc.css') }}">
    <main>
        @if (isset($banner))
            <img src="{{ asset($banner->banner) }}" alt="">
        @endif

        @if (isset($post))
            @foreach ($post as $item)
                <div class="study_content">{!! $item->content !!}</div>
            @endforeach
        @endif
    </main>
@endsection
