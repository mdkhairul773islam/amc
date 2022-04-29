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
                        <li>{{(!empty($info->featured_image) ? $info->title : 'Slider')}}</li>
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
                
                @if(!empty($info->path))
                    <a href="{{asset($info->path)}}" download="download" class="download_btn" target="_blank"> <i class="fas fa-download"></i> Download</a>
                @endif
            </div>
        </div>
    </section>
    <!-- single page end -->
@endsection

@push('header-style')
    <link rel="stylesheet" href="{{asset('frontend')}}/style/single.css">
    <style>
        .single_page .download_btn:hover {
            background: #08336D;
            color: #fff;
        }
        .single_page .download_btn {
            display: inline-block;
            background: #0B499D;
            transition: all .2s;
            align-items: center;
            color: #fff;
            font-size: 13px;
            padding: 8px 15px;
            border-radius: 2px;
        }
        .single_page .download_btn i {
            display: inline-block;
            font-size: 10px;
            margin-top: -3px;
            margin-right: 5px;
            vertical-align: middle;
        }
    </style>
@endpush
