@extends('layouts.frontend')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{$info->title}}</h2>
                    <ul>
                        <li><a href="{{asset('/')}}">Home</a></li>
                        <li>{{(!empty($info->featured_image) ? $info->title : 'Page')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->

    <!-- single page start -->
    <section class="single_page">
        <div class="container">
            <div class="page_article">
                @if(!empty($info->featured_image))
                    <img src="{{asset($info->featured_image)}}" alt="">
                @endif

                {!! $info->description !!}
            </div>
        </div>
    </section>
    <!-- single page end -->
@endsection

@push('header-style')
    <link rel="stylesheet" href="{{asset('frontend')}}/style/single.css">
@endpush
