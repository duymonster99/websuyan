@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/library/vocabulary.css') }}">
    <main>
        @if (isset($banner))
            <img src="{{ asset($banner->banner) }}" alt="">
        @endif

        <div class="vocab">
            <!-- Yen nhi -->
            <ul class="vocab__carousel">
                @if (isset($post))
                    @foreach ($post as $item)
                        <li class="vocab__card">
                            <img src="{{ asset($item->image) }}" alt="">
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </main>
@endsection
