@extends('index')
@section('body')
<link rel="stylesheet" href="{{asset('css/project/onl/hsk3.css')}}">

    <main>
        @if (isset($post))
            @foreach ($post as $item)
                <div class="pro-h3__banner">
                    <img src="{{asset($item->banner)}}" alt>
                </div>
            @endforeach
        @endif

        <div class="pro-h3__wrapper">
            <div data-aos="zoom-in-right" data-aos-duration="900" class="pro-h3__content">
                @if(isset($post))
                    @foreach ($post as $item)
                        <div class="pro-h3__content--title">
                            {{$item->title}}
                        </div>

                        <div class="pro-h3__content--para1">
                            {!! $item->content1 !!}
                        </div>

                        <div class="pro-h3__content--para3">
                            {!! $item->content2 !!}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
