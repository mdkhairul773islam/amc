@extends('layouts.frontend')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>Department of {{(!empty($pageInfo->department) ? $pageInfo->department->name : '')}}</h2>
                    <ul>
                        <li><a href="{{asset('/')}}">Home</a></li>
                        <li>{{$pageInfo->title}}</li>
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
                @if(!empty($pageInfo->featured_image))
                    <img src="{{asset($pageInfo->featured_image)}}" alt="">
                @endif
                {!! $pageInfo->description !!}
            </div>
        </div>
    </section>
    <!-- single page end -->
@endsection

@push('header-style')
    <link rel="stylesheet" href="{{asset('frontend')}}/style/single.css">
@endpush
