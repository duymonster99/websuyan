@extends('index')
@section('body')
    <link rel="stylesheet" href="{{ asset('css/library/thanh-ngu.css') }}">
    <main>
        @if (isset($banner))
                <img src="{{ asset($banner->banner) }}" alt="">
            @endif

        <div class="idiom">

            <div class="idiom__wrapper">
                <!-- Yen nhi -->
                <ul class="idiom__carousel">
                    @if (isset($post))
                        @foreach ($post as $item)
                            <li class="idiom__card">
                                <img src="{{asset($item->image)}}" alt="">
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </main>
@endsection
