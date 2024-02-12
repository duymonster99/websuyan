@extends('index')
@section('body')
<link rel="stylesheet" href="{{asset('css/project/onl/hsk3.css')}}">

    <main>
        @if (isset($banner))
            <div class="pro-h3__banner">
                <img src="{{ asset($banner->banner) }}" alt>
            </div>
        @endif

        <div class="pro-h3__wrapper">
            <div data-aos="zoom-in-right" data-aos-duration="900" class="pro-h3__content">
                @if(isset($post))
                    @foreach ($post as $item)
                        <div class="pro-h3__content--title">
                            {{$item->title}}
                        </div>

                        <div class="pro-h3__content--para1">
                            {!! $item->appendix !!}
                        </div>

                        <div class="pro-h3__content--para3">
                            {!! $item->content !!}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
