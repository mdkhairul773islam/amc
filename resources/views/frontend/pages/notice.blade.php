@extends('layouts.frontend')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>Notice Board</h2>
                    <ul>
                        <li><a href="{{asset('/')}}">Home</a></li>
                        <li>Notice</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->


    <!-- notice section start -->
    @php($department = !empty($_GET['department']) ? $_GET['department'] : '')
    <section class="notice_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="notice_board">
                        <ul class="notice_list">
                            @if(!empty($results))
                                @foreach($results as $key => $row)
                                    @php($link = 'home/notice/show/' . $row->id . (!empty($department) ? '?department=' . $department : ''))
                                    <li>
                                        <a href="{{asset($link)}}"
                                           class="title">{{$row->title}}</a>
                                        <span>Published : {{ date('d M Y', strtotime($row->created)) }}</span>
                                        @if(!empty($row->path))
                                            <a href="{{asset($row->path)}}" download class="read_more"
                                               target="_blank"><i class="fas fa-download"></i> Download</a>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="aside_content">
                        <h4>Select Department</h4>
                        @if(!empty($departmentList))
                            <ul class="aside_list">
                                @foreach($departmentList as $key => $row)
                                    @if(!empty($department))
                                        @if($row->id == 1 || $row->id == strDecode($department))
                                            @php($link = 'home/notice/?search='. strEncode($row->id).'&department='.$department)
                                            <li><a href="{{asset($link)}}"
                                                   class="title {{($active == $row->id ? 'active' : '')}}">{{$row->name}}
                                                    <small>{{$row->total_post}}</small></a></li>
                                        @endif
                                    @else
                                        @php($link = 'home/notice?search='.strEncode($row->id))
                                        <li><a href="{{asset($link)}}"
                                               class="title {{($active == $row->id ? 'active' : '')}}">{{$row->name}}
                                                <small>{{$row->total_post}}</small></a></li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- notice section end -->
@endsection

@push('header-style')
    <link rel="stylesheet" href="{{asset('frontend')}}/style/notice.css">
@endpush
