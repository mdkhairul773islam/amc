@extends('layouts.frontend')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>Department Page</h2>
                    <ul>
                        <li><a href="{{asset('/')}}">Home</a></li>
                        <li>Department</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->


    <!--department card start-->
    <section class="department_card">
        <div class="container">
            <div class="row">
                @if(!empty($departmentList) && $departmentList->isNotEmpty())
                    @foreach($departmentList as $row)
                        <div class="col-lg-4 col-md-6">
                            <div class="card_box">
                                <figure class="card_img">
                                    @if(!empty($row->page->featured_image))
                                        <img src="{{asset($row->page->featured_image)}}" alt="">
                                    @else
                                        <img src="{{asset('public/frontend/images/bg_images/01.jpg')}}" alt="">
                                    @endif
                                </figure>
                                <div class="card_article">
                                    @php($url = 'home/department?department=' . strEncode($row->id))
                                    <h4><a target="_blank" href="{{asset($url)}}">Department of {{$row->name}}</a></h4>
                                    <a target="_blank" href="{{asset($url)}}" class="btn">Visit Department <i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--department card end-->
@endsection

@push('header-style')
    <link rel="stylesheet" href="{{asset('frontend')}}/style/department_list.css">
@endpush
