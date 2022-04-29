<!-- header slider start -->
<header class="header_slider carousel slide carousel-fade" id="header_slider" data-ride="carousel">
    <div class="carousel-inner">
        @if(!empty($sliders))
            @foreach($sliders as $key =>  $row)
                <div class="carousel-item {{($key == 0 ? 'active' : '')}}">
                    <img src="{{asset($row->avatar)}}" alt="">
                    <div class="carousel_cover">
                        <div class="container">
                            <article class="header_article animate__animated animate__slideInLeft">
                                <h2>{{$row->title}}</h2>
                                <p>{{strLimit($row->description, 15)}}</p>
                                @if(!empty($row->link))
                                    <a target="_blank" href="{{$row->link}}">Read More</a>
                                @else
                                    <a target="_blank" href="{{route('home.slider', $row->url)}}">Read More</a>
                                @endif
                            </article>
                            <article class="header_title animate__animated animate__slideInUp">
                                <div class="first_title">
                                    <h4>Faculty Members : 220</h4>
                                    <h4>Students : 30000 +</h4>
                                </div>
                                <div style="margin-left: 15px;">
                                    <h4>Department : 20</h4>
                                    <h4>Founded : 1908</h4>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</header>
<!-- header slider end -->


<!-- latest news start -->
<div class="latest_news">
    <div class="container">
        <div class="bn-breaking-news" id="newsTicker14">
            <div class="bn-label">Latest Notice</div>
            <div class="bn-news">
                <ul>
                    @if(!empty($noticeList))
                        @foreach($noticeList as $row)
                            <li><a href="{{route('home.notice.show', $row->id)}}">{{$row->title}}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="bn-controls">
                <button style="border-right: 1px solid rgba(255,255,255,.3);"><span class="bn-arrow bn-prev"></span></button>
                <button><span class="bn-arrow bn-next"></span></button>
            </div>
        </div>
    </div>
</div>
<!-- latest news end -->

@push('footer-script')
    <script>
        /* news text slider */
        $('#newsTicker14').breakingNews({
            scrollSpeed: '2',
            radius: '0'
            // effect: 'fade',
            // delayTimer: '3000'
        });
    </script>
@endpush