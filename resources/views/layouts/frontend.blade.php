<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@php($siteInfo = settings())
<!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title -->
    <title>{{ (!empty($siteInfo->site_name) ? $siteInfo->site_name : '') }}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset(!empty($siteInfo->favicon) ? $siteInfo->favicon : '') }}">

    <!-- ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- lightbox css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">
    <!-- youbube popup -->
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/youtube_popup/css/YouTubePopUp.css">
    <!-- ticker style -->
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/ticker/css/breaking-news-ticker.min.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <!-- animated css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- aos animate css -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <!-- include css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/style/master.css">

    @stack('header-style')
    @stack('header-script')
</head>

<body>
@include('frontend/nav')

@yield('content')

<!-- footer section start -->
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="company_info">
                    <a href="" class="footer_brand">
                        <img src="{{(!empty($siteInfo->logo) ? asset($siteInfo->logo) : '')}}" alt="">
                        <div class="title">
                            <h5>{{(!empty($siteInfo->site_name) ? $siteInfo->site_name : '')}}</h5>
                        </div>
                    </a>
                    <p><i class="fas fa-map-marker-alt"></i> {{(!empty($siteInfo->address) ? $siteInfo->address : '')}}
                    </p><br>
                    <p><strong>Phone</strong> : <a
                            href="tel:{{(!empty($siteInfo->mobile) ? $siteInfo->mobile : '')}}">{{(!empty($siteInfo->mobile) ? $siteInfo->mobile : '')}}</a>
                    </p>
                    <p><strong>Email</strong> : <a
                            href="mailto:{{(!empty($siteInfo->email) ? $siteInfo->email : '')}}">{{(!empty($siteInfo->email) ? $siteInfo->email : '')}}</a>
                    </p>
                    <ul class="social_link">
                        <li><a href="{{(!empty($siteInfo->facebook) ? $siteInfo->facebook : '')}}" target="_blank"
                               class="facebook"><i class="icon ion-logo-facebook"></i></a></li>
                        <li><a href="{{(!empty($siteInfo->youtube) ? $siteInfo->youtube : '')}}" target="_blank"
                               class="youtube"><i class="icon ion-logo-youtube"></i></a></li>
                        <li><a href="{{(!empty($siteInfo->twitter) ? $siteInfo->twitter : '')}}" target="_blank"
                               class="twitter"><i class="icon ion-logo-twitter"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6">
                <div class="company_info">
                    <h3>Important Links</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="quick_link">
                                <li><a href="{{asset('home/page/college-history')}}">History Of College</a></li>
                                <li><a href="{{route('home.department-list')}}">Department</a></li>
                                @php($department = !empty($_GET['department']) ? $_GET['department'] : '')
                                @if(empty($department))
                                    <li><a href="{{route('home.staff')}}">Office Staff</a></li>
                                    <li><a href="{{route('home.teacher')}}">Teachers</a></li>
                                    <li><a href="{{route('home.contact')}}">Contact Us</a></li>
                                @else
                                    <?php
                                    $staffPage = 'home/staff?department=' . $department;
                                    $teacherPage = 'home/teacher?department=' . $department;
                                    $contactPage = 'home/contact?department=' . $department;
                                    ?>
                                    <li><a href="{{asset($staffPage)}}">Office Staff</a></li>
                                    <li><a href="{{asset($teacherPage)}}">Teachers</a></li>
                                    <li><a href="{{asset($contactPage)}}">Contact Us</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="quick_link">
                                <li><a href="{{asset('home/page/transport-facilities')}}">Transport Facilities</a></li>
                                <li><a href="{{asset('home/page/rover-scout')}}">Rover Scout</a></li>
                                <li><a href="{{asset('home/page/health-care')}}">Health Care</a></li>
                                <li><a href="{{asset('home/page/hostel')}}">Hostel</a></li>
                                <li><a href="{{asset('home/page/residential')}}">Residential</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="company_info">
                    <h3>Useful Links</h3>
                    <ul class="quick_link">
                        <li><a href="https://www.nu.ac.bd/" target="_blank">National University</a></li>
                        <li><a href="">Emergency Info</a></li>
                        <li><a href="">Complain Box</a></li>
                        <li><a href="">Leave List</a></li>
                        <li><a href="">Help and Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer section end -->


<!-- second footer start -->
<footer class="second_footer">
    <div class="container">
        <div class="ft_content">
            <p>{{(!empty($siteInfo->copy_right) ? $siteInfo->copy_right : '')}}</p>
            <p>Developed By <a href="https://freelanceitlab.com/" target="_blank">Freelance iT Lab</a></p>
        </div>
    </div>
</footer>
<!-- second footer end -->

<!-- jQuery js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
<!-- owl carousel js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- lightbox js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>
<!-- youbube popup -->
<script src="{{asset('frontend')}}/vendors/youtube_popup/js/YouTubePopUp.jquery.js"></script>
<!-- news ticker js -->
<script src="{{asset('frontend')}}/vendors/ticker/js/breaking-news-ticker.min.js"></script>
<!-- jquery.counterup.min js -->
<script src="{{asset('frontend')}}/vendors/counterup/jquery.counterup.min.js"></script>
<script src="{{asset('frontend')}}/vendors/counterup/jquery.waypoints.min.js"></script>
<!-- aos animate js -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- newsbox js -->
<script src="{{asset('frontend')}}/vendors/marque-text/jquery.bootstrap.newsbox.min.js"></script>

<!-- include js -->
<script src="{{asset('frontend')}}/js/app.js"></script>

<script>
    /* aos animate */
    AOS.init({
        duration: 700,
    })
</script>

@stack('footer-style')
@stack('footer-script')
</body>
</html>
