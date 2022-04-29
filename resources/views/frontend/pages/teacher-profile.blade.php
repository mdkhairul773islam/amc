@extends('layouts.frontend')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>Teacher Profile</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Teacher</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->



    <!-- teacher section start -->
    <section class="teacher_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="teacher_box">
                        <img src="{{asset($info->avatar)}}" alt="">
                        <h5>{{$info->name}}</h5>
                        <p>{{(!empty($info->designation) ? $info->designation->name : '')}}</p>
                        <p>{{(!empty($row->department) ? $row->department->name : '')}}</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="teacher_info">
                        {!! $info->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- teacher page end -->
@endsection

@push('header-style')
    <link rel="stylesheet" href="{{asset('frontend')}}/style/teacher_profile.css">
@endpush
