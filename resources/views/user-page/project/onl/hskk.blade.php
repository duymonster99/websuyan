@extends('index')
@section('body')
<link rel="stylesheet" href="{{asset('css/project/onl/hskk.css')}}">

    <main>
        @if (isset($banner))
            <div class="pro-kk__banner">
                <img src="{{ asset($banner->banner) }}" alt>
            </div>
        @endif

        <div class="pro-kk__wrapper">
            <div data-aos="zoom-in-right" data-aos-duration="900" class="pro-kk__content">
                @if(isset($post))
                    @foreach ($post as $item)
                        <div class="pro-kk__content--title">
                            {{$item->title}}
                        </div>

                        <div class="pro-kk__content--para1">
                            {!! $item->appendix !!}
                        </div>

                        <div class="pro-kk__content--para3">
                            {!! $item->content !!}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
