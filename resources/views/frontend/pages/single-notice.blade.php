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

    @php($department = !empty($_GET['department']) ? $_GET['department'] : '')
    <!-- single page start -->
    <section class="single_page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="page_article">
                        <h3>{{$info->title}}</h3>
                        @if(!empty($info->description))
                        {!! $info->description !!}
                        @endif


                        @php($ext = pathinfo(asset($info->path), PATHINFO_EXTENSION))
                        @if($ext == 'pdf')
                        <iframe src="{{asset('public/uploads/notice/01-1638269635.pdf')}}"></iframe>
                        @else
                        <img src="{{asset($info->path)}}" alt="">
                        @endif

                        <div class="text-left">
                            @if(!empty($info->path))
                                <a href="{{asset($info->path)}}" download="" class="download_btn" target="_blank"> <i class="fas fa-download"></i> Download</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="aside_content panel">
                        <h4>Recent Notice</h4>
                        <div class="panel-body">
                            <ul class="notice_up">
                                @if(!empty($noticeList))
                                    @foreach($noticeList as $row)
                                        @php($link = 'home/notice/show/' . $row->id . (!empty($department) ? '?department=' . $department : ''))
                                        <li>
                                            <a href="{{asset($link)}}" class="title">{{strLimit($row->title, 8)}}</a>
                                            <span>Published : {{ date('d M Y', strtotime($row->created)) }}</span>
                                            @if(!empty($row->path))
                                            <a target="_blank" href="{{asset($row->path)}}" download class="read_more"><i class="fas fa-download"></i> Download</a>
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- single page end -->
@endsection

@push('header-style')
    <link rel="stylesheet" href="{{asset('frontend')}}/style/single.css">
    <style>
        .single_page iframe {
            max-width: 100%;
            border: none;
            height: auto;
            margin: 25px 0;
            min-height: 420px;
        }
        .single_page img {
            max-width: 100%;
            float: inherit;
            width: auto;
            height: auto;
            margin: 25px 0;
        }
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
        .single_page .aside_content {
            box-shadow: 0 8px 8px 8px #ddd;
            margin-bottom: 20px;
            background: #F7F7F7;
        }
        .single_page .aside_content h4 {
            background: #0B499D;
            font-weight: 600;
            font-size: 23px;
            padding: 0 15px;
            color: #fff;
            margin: 0;
            width: 100%;
            height: 60px;
            line-height: 60px;
        }
        .single_page .notice_up {
            min-height: 425px;
            overflow: hidden;
            padding: 0 15px;
            margin: 0;
            max-height: 425px;
            background: #fff;
        }
        .single_page .notice_up li {
            border-bottom: 1px solid #ccc;
            padding: 10px 0 15px;
        }
        .single_page .notice_up .title:hover {color: #000;}
        .single_page .notice_up .title {
            display: inline-block;
            margin-bottom: 5px;
            line-height: 20px;
            font-size: 18px;
            color: #0B499D;
            font-weight: 600;
            transition: all .2s;
        }
        .single_page .notice_up span {
            font-size: 13px;
            display: block;
            margin: 12px 0;
            font-weight: 500;
        }
        .single_page .notice_up .read_more:hover {
            background: #0B499D;
            color: #fff;
        }
        .single_page .notice_up .read_more i {
            vertical-align: middle;
            font-size: 12px;
            margin: -3px 2px 0 0;
        }
        .single_page .notice_up .read_more {
            border: 1px solid #0B499D;
            display: inline-block;
            font-weight: 700;
            font-size: 12px;
            color: #0B499D;
            min-width: 100px;
            padding: 4px 12px;
            text-align: center;
            border-radius: 20px;
            transition: all .2s;
        }
        .single_page .panel {position: relative;}
        .single_page .panel-footer {
            position: absolute;
            top: 3px;
            right: 15px;
        }
        .single_page .panel-footer li {
            line-height: 60px;
            height: 50px;
        }
        .single_page .panel-footer li a {
            display: inline-block;
            position: relative;
            background: #FFF;
            margin-left: 5px;
            height: 18px;
            width: 20px;
        }
        .single_page .panel-footer li a.prev::after {
            transform: rotate(45deg);
            bottom: 6px;
        }
        .single_page .panel-footer li a.next::after {
            transform: rotate(-135deg);
            top: 7px;
        }
        .single_page .panel-footer li a::after {
            border-bottom-style: solid;
            border-bottom-width: 1px;
            border-right-style: solid;
            content: "";
            height: 8px;
            left: 6px;
            width: 8px;
            position: absolute;
            display: inline-block;
            border-color: #0B499D;
            border-right-width: 1px;
        }
    </style>
@endpush


@push('footer-script')
    <script>
        /* marque text slider */
        $(".notice_up").bootstrapNews({
            newsPerPage: 8,
            autoplay: true,
            pauseOnHover: true,
            direction: 'up',
            newsTickerInterval: 2000
        });
    </script>
@endpush
