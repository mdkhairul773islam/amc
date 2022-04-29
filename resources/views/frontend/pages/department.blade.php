@extends('layouts.frontend')

@section('content')
    <!-- department header start -->
    @php($department = !empty($_GET['department']) ? $_GET['department'] : '')
    @if(!empty($sliderList) && $sliderList->isNotEmpty())
        <header class="department_header carousel slide carousel-fade" id="header_slider" data-ride="carousel">
            @foreach($sliderList as $key => $row)
                <div class="carousel-inner">
                    <div class="carousel-item {{($key == 0 ? 'active' : '')}}">
                        <img src="{{asset($row->avatar)}}" alt="">
                        <div class="cover">
                            <div class="container">
                                <div class="header_content">
                                    <h2>Welcome
                                        to {{(!empty($pageInfo->department) ? $pageInfo->department->name : '')}}
                                        Department</h2>
                                    <h3>Ananda Mohan College</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </header>
    @else
        <header class="department_header carousel slide carousel-fade" id="header_slider" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('frontend')}}/images/bg_images/01.jpg" alt="">
                    <div class="cover">
                        <div class="container">
                            <div class="header_content">
                                <h2>Welcome to {{(!empty($pageInfo->department) ? $pageInfo->department->name : '')}}
                                    Department</h2>
                                <h3>Ananda Mohan College</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endif
    <!-- department header end -->

    <!-- about department start -->
    <section class="about_department">
        <div class="container">
            <div class="row">
                @if(!empty($departmentHead))
                    <div class="col-md-6">
                        <div class="speech_box">
                            <h4>Head Of Department</h4>
                            <div class="article">
                                <img src="{{asset($departmentHead->avatar)}}" alt="">

                                <?php $link = '<div class="text-left"><a href="' . asset('home/teacher/profile/' . $departmentHead->id) . (!empty($department) ? '?department=' . $department : '') . '" class="read_more"><i class="fas fa-plus"></i> Read More</a></div>'; ?>
                                <p>{!! strLimit($departmentHead->description, 127, $link) !!}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-{{(!empty($departmentHead) ? '6' : '12')}}">
                    <div class="article_box">
                        <h4>Department Of {{ (!empty($pageInfo->department) ? $pageInfo->department->name : '') }}</h4>
                        <?php $link = '<div class="text-left"><a href="' . asset('home/about-department') . (!empty($department) ? '?department=' . $department : '') . '" class="read_more"><i class="fas fa-plus"></i> Read More</a></div>'; ?>

                        <p>{!! strLimit($pageInfo->description, 140, $link) !!}</p>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($speechInfo) || !empty($teacherList) && $teacherList->isNotEmpty())
            <div class="container">
                @if(!empty($teacherList) && $teacherList->isNotEmpty())
                    <div class="owl-carousel speech_carousel">
                        @foreach($teacherList as $key => $row)
                            @php($link = 'home/teacher/profile/' . $row->id . (!empty($department) ? '?department' . $department : ''))
                            <a href="{{asset($link)}}" class="designation_box">
                                <img src="{{asset($row->avatar)}}" alt="">
                                <h5>{{$row->name}}</h5>
                                <p>{{(!empty($row->designation) ? $row->designation->name : '')}}</p>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
    </section>
    <!-- about department end -->



    <!-- skill section start -->
    <section class="skill_section">
        <div class="cover">
            <div class="container">
                <div class="owl-carousel skill_carousel">
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



    <!-- news section start -->
    @if(!empty($newList) && $newList->isNotEmpty())
        <section class="news_section">
            <div class="container">
                <div class="section_title">
                    <h3>Latest News and Events</h3>
                    @php($link = 'home/news' . (!empty($department) ? '?department=' . $department : ''))
                    <a href="{{asset($link)}}" class="btn"><i class="fas fa-plus"></i>
                        View All</a>
                </div>
                <div class="row">
                    @foreach($newList as $row)
                        <div class="col-lg-4 col-md-6">
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
                                        @php($link = 'home/news/show/' . $row->id . (!empty($department) ? '?department=' . $department : ''))
                                        <a href="{{asset($link)}}">{{strFilter($row->title)}}</a>
                                    </h4>
                                    <?php $readMore = '<a href="' . asset('home/news/show/' . $row->id) . (!empty($department) ? '?department=' . $department : '') . '" class="read_more">Read More &rarr;</a>'; ?>
                                    {!! strLimit($row->description, 25, $readMore) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- news section end -->
@endsection

@push('header-style')
    <link rel="stylesheet" href="{{asset('frontend')}}/style/department.css">
@endpush

@push('footer-script')
    <script>
        /* speech carousel */
        $('.speech_carousel').owlCarousel({
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

        /* carousel js */
        $('.carousel').carousel({
            interval: false,
            interval: 5000,
            pause: "false"
        });

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
