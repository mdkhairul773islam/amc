@extends('layouts.frontend')

@section('content')
    @include('frontend.slider')

    <!-- speech section start -->
    <section class="speech_section">
        <div class="container">
            @if(!empty($principleSpeech))
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="designation_box" data-aos="fade-right">
                            <img src="{{asset($principleSpeech->avatar)}}" alt="">
                            <h5>{{strFilter($principleSpeech->name)}}</h5>
                            <p>{{(!empty($principleSpeech->designation) ? $principleSpeech->designation->name : '')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="article" data-aos="fade-left">
                            <h4>{{$principleSpeech->title}}</h4>
                            <?php $readMore = '<div><a href="' . route('home.speech', $principleSpeech->slug) . '" class="read_more"><i class="fas fa-plus"></i> Read More</a></div>'; ?>
                            {!! strLimit($principleSpeech->description, 130, $readMore) !!}
                        </div>
                    </div>
                </div>
            @endif

            @if(!empty($vicePrincipleSpeech))
                <div class="row">
                    <div class="col-lg-8 col-md-6 order-md-1 order-2">
                        <div class="article" data-aos="fade-right">
                            <h4>{{$vicePrincipleSpeech->title}}</h4>
                            <?php $readMore = '<div><a href="' . route('home.speech', $vicePrincipleSpeech->slug) . '" class="read_more"><i class="fas fa-plus"></i> Read More</a></div>'; ?>
                            {!! strLimit($vicePrincipleSpeech->description, 130, $readMore) !!}
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 order-md-2 order-1">
                        <div class="designation_box" data-aos="fade-left">
                            <img src="{{asset($vicePrincipleSpeech->avatar)}}" alt="">
                            <h5>{{strFilter($vicePrincipleSpeech->name)}}</h5>
                            <p>{{(!empty($vicePrincipleSpeech->designation) ? $vicePrincipleSpeech->designation->name : '')}}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(!empty($departmentHeads) && $departmentHeads->isNotEmpty())
                <div class="owl-carousel headof_department" data-aos="fade-up">
                    @foreach($departmentHeads as $key => $row)
                        <a href="{{route('home.teacher.profile', $row->id)}}" class="designation_box">
                            <img src="{{asset($row->avatar)}}" alt="">
                            <h5>{{$row->name}}</h5>
                            <p style="color: #0B499D; font-weight: 600;">{{(!empty($row->designation) ? $row->designation->name : '')}}</p>
                            <p>{{(!empty($row->department) ? $row->department->name : '')}}</p>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!-- speech section end -->



    <!-- welcome section start -->
    <section class="welcome_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="video_area" data-aos="fade-right">
                        <div class="cover">
                            <a href="https://www.youtube.com/watch?v=Bct76gIquWg" class="bla-1">
                                <i class="ion-ios-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="welcome_article" data-aos="fade-left">
                        <h3>Welcome to Ananda Mohan College</h3>
                        @if(!empty($welcomePage))
                            <?php $readMore = '<div><a href="' . asset('home/page/welcome-page') . '" class="read_more"><i class="fas fa-plus"></i> Read More</a></div>'; ?>
                            {!! strLimit($welcomePage->description, 120, $readMore) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- welcome section end -->



    <!-- skill section start -->
    <section class="skill_section">
        <div class="cover">
            <div class="container">
                <div class="owl-carousel skill_carousel" data-aos="fade-up">
                    <div class="skill_box">
                        <i class="fas fa-university"></i>
                        <div class="title">
                            <h4>Founded</h4>
                            <p><span>1908</span></p>
                        </div>
                    </div>
                    <div class="skill_box">
                        <i class="fas fa-user-shield"></i>
                        <div class="title">
                            <h4>Faculty</h4>
                            <p><span>220</span></p>
                        </div>
                    </div>
                    <div class="skill_box">
                        <i class="fas fa-user-graduate"></i>
                        <div class="title">
                            <h4>Department</h4>
                            <p><span>20</span></p>
                        </div>
                    </div>
                    <div class="skill_box">
                        <i class="fas fa-user-graduate"></i>
                        <div class="title">
                            <h4>Students</h4>
                            <p><span>30000</span> +</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- skill section end -->



    <!-- notice section start -->
    <section class="notice_section">
        <div class="container">
            <div class="section_title">
                <h3>Notice Board</h3>
                <a href="{{asset('home/notice')}}" class="btn"><i class="fas fa-plus"></i> View All</a>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="row" data-aos="fade-right">
                        @php($results = $noticeList->take(2))
                        @if(!empty($results))
                            @foreach($results as $row)
                                <div class="col-lg-6">
                                    <div class="notice_content">
                                        <figure class="notice_summary">
                                            <img src="{{asset('public/frontend/images/bg_images/notice.png')}}" alt="">
                                            @if(!empty($row->path))
                                            <a href="{{asset($row->path)}}" download class="download" target="_blank">
                                                <i class="fas fa-download"></i> Download</a>
                                            @endif
                                        </figure>
                                        <div class="notice_article">
                                            <div class="date">
                                                <h2>{{date('d', strtotime($row->created))}}</h2>
                                                <p>{{date('M', strtotime($row->created))}}</p>
                                            </div>
                                            <h4><a href="{{route('home.notice.show', $row->id)}}">{{$row->title}}</a>
                                            </h4>
                                            <?php $readMore = '<a href="' . route('home.notice.show', $row->id) . '" class="read_more">Read More &rarr;</a>'; ?>
                                            {!! strLimit($row->description, 25, $readMore) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="aside_content panel" data-aos="fade-left">
                        <h4>Recent Notice</h4>
                        <div class="panel-body">
                            <ul class="notice_up">
                                @if(!empty($noticeList))
                                    @foreach($noticeList as $row)
                                        <li>
                                            <a href="{{route('home.notice.show', $row->id)}}" class="title">{{strLimit($row->title, 8)}}</a>
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
    <!-- notice section end -->



    <!-- video section start -->
    <section class="video_section">
        <div class="cover">
            <div class="container">
                <h2>Welcome to Ananda Mohan College</h2>
                <h4>Our Campus</h4>
                <a href="https://www.youtube.com/watch?v=Bct76gIquWg" class="bla-1">
                    <i class="ion-ios-play"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- video section end -->



    <!-- news section start -->
    <section class="news_section">
        <div class="container">
            <div class="section_title">
                <h3>Latest News and Events</h3>
                <a href="{{asset('home/news')}}" class="btn"><i class="fas fa-plus"></i> View All</a>
            </div>
            <div class="row">
                @php($newsAndEvent = $postList->take(3))
                @if(!empty($noticeList))
                    @foreach($newsAndEvent as $row)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up">
                            <div class="news_content">
                                <figure class="news_summary">
                                    <img src="{{asset($row->featured_image)}}" alt="">
                                </figure>
                                <div class="news_article">
                                    <div class="date">
                                        <h2>{{date('d', strtotime($row->created))}}</h2>
                                        <p>{{date('M', strtotime($row->created))}}</p>
                                    </div>
                                    <h4>
                                        <a href="{{route('home.news.show', $row->id)}}">{{strFilter($row->title)}}</a>
                                    </h4>
                                    <?php $readMore = '<a href="' . route('home.news.show', $row->id) . '" class="read_more">Read More &rarr;</a>'; ?>
                                    {!! strLimit($row->description, 25, $readMore) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- news section end -->
@endsection

@push('header-style')
    <link rel="stylesheet" href="{{asset('frontend')}}/style/home.css">
@endpush


@push('footer-script')
    <!-- owl carousel js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- youbube popup -->
    <script src="{{asset('frontend')}}/vendors/youtube_popup/js/YouTubePopUp.jquery.js"></script>
    <!-- news ticker js -->
    <script src="{{asset('frontend')}}/vendors/ticker/js/breaking-news-ticker.min.js"></script>
    <!-- jquery.counterup.min js -->
    <script src="{{asset('frontend')}}/vendors/counterup/jquery.counterup.min.js"></script>
    <script src="{{asset('frontend')}}/vendors/counterup/jquery.waypoints.min.js"></script>
    <!-- newsbox js -->
    <script src="{{asset('frontend')}}/vendors/marque-text/jquery.bootstrap.newsbox.min.js"></script>


    <script>
        /* carousel js */
        $('.carousel').carousel({
            interval: false,
            interval: 5000,
            pause: "false"
        });

        /* marque text slider */
        $(".notice_up").bootstrapNews({
            newsPerPage: 8,
            autoplay: true,
            pauseOnHover: true,
            direction: 'up',
            newsTickerInterval: 2000
        });

        /* headof department carousel */
        $('.headof_department').owlCarousel({
            autoplayTimeout: 5000,
            autoplay: true,
            margin: 30,
            dots: false,
            loop: true,
            nav: true,
            responsive: {
                991: {items: 3},
                768: {items: 2},
                0: {items: 1}
            }
        });

        /* counter js */
        $(function () {
            $('.skill_section .skill_box p span').countUp({
                delay: 10,
                time: 1500
            });
        });

        /* YouTubePopUp */
        jQuery("a.bla-1").YouTubePopUp();

        /* skill carousel */
        $('.skill_carousel').owlCarousel({
            autoplay: true,
            loop: false,
            nav: false,
            dots: false,
            margin: 20,
            autoplayTimeout: 5000,
            responsive: {
                991: {items: 3},
                768: {items: 2},
                0: {items: 1}
            }
        });
    </script>
@endpush
