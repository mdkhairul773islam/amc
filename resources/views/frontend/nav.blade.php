<!-- navbar nav start -->
<nav class="fixed-top">
    <!-- contact nav -->
    <div class="contact_nav">
        <div class="container">
            <div class="cnav_content">
                <div class="contact_access">
                    <a href="mailto:hello@info.com"><i
                            class="icon ion-ios-mail"></i> {{(!empty($siteInfo->email) ? $siteInfo->email : '')}}</a>
                    <a href="tel:01937476716" class="call"><i
                            class="icon ion-ios-call"></i> {{(!empty($siteInfo->mobile) ? $siteInfo->mobile : '')}}</a>
                </div>
                <ul class="auth">
                    <li><a href="" target="_blank">AMC Login</a></li>
                    <li><a href="" target="_blank">Student Login</a></li>
                    @if($siteInfo->admission_form=='yes' || $siteInfo->admission_form_hsc=='yes')
                        <li class="dropdown">
                            <a href="#" class="nav-link admission_btn" data-toggle="dropdown">Admission</a>
                            <ul class="dropdown-menu">
                                @if($siteInfo->admission_form=='yes')
                                    <li><a href="{{asset('home/admission-form')}}" target="_blank">Honors/Masters</a>
                                    </li>
                                @endif

                                @if($siteInfo->admission_form_hsc=='yes')
                                    <li><a href="{{asset('home/admission-form-hsc')}}" target="_blank">HSC</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if($siteInfo->result_publish=='yes')
                        <li><a class="result_btn" href="{{asset('home/result-publish')}}" target="_blank">Result</a>
                        </li>
                    @endif
                </ul>

                <!--<div class="user-dropdown dropdown">-->
                <!--    <div class="user-menu" data-toggle="dropdown">-->
                <!--        <span>Aminur Islam</span>-->
                <!--        <img src="images/user/01.png" alt="">-->
                <!--    </div>-->
                <!--    <ul class="dropdown-menu">-->
                <!--        <li><a href=""><i class="icon ion-ios-speedometer"></i> Dashboard</a></li>-->
                <!--        <li><a href=""><i class="icon ion-md-person"></i> Profile</a></li>-->
                <!--        <li><a href=""><i class="icon ion-md-log-out"></i> Logout</a></li>-->
                <!--    </ul>-->
                <!--</div>-->
                <!--<ul class="social">-->
            <!--    <li><a href="{{(!empty($siteInfo->youtube) ? $siteInfo->youtube : '')}}" target="_blank" class="youtube"><i class="icon ion-logo-youtube"></i></a></li>-->
            <!--    <li><a href="{{(!empty($siteInfo->facebook) ? $siteInfo->facebook : '')}}" target="_blank" class="facebook"><i class="icon ion-logo-facebook"></i></a></li>-->
                <!--</ul>-->
            </div>
        </div>
    </div>
    <!-- main nav -->
    <div class="navbar navbar-expand-lg">
        <div class="container">
            <a class="brand" href="{{asset('/')}}">
                <img src="{{asset(!empty($siteInfo->nav_logo) ?$siteInfo->nav_logo : '')}}" alt="">
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav">
                <i class="icon ion-ios-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav">
                    @php($department = !empty($_GET['department']) ? $_GET['department'] : '')
                    @if(empty($department))
                        <li><a class="nav-link active" href="{{asset('/')}}">Home</a></li>
                        <li class="dropdown sm_dropdown">
                            <span class="nav-link" data-toggle="dropdown">About Us</span>
                            <ul class="dropdown-menu">
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/teachers-post-information')}}"><i
                                            class="fas fa-angle-double-right"></i> Teachers Post Information</a></li>
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/college-history')}}"><i
                                            class="fas fa-angle-double-right"></i> History Of College</a></li>
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/college-informations')}}"><i
                                            class="fas fa-angle-double-right"></i> College Information</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="{{route('home.department-list')}}">Department</a></li>
                        <li class="dropdown sm_dropdown">
                            <span class="nav-link" data-toggle="dropdown">Facilities</span>
                            <ul class="dropdown-menu">
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/transport-facilities')}}"><i
                                            class="fas fa-angle-double-right"></i> Transport Facilities</a></li>
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/residential')}}"><i
                                            class="fas fa-angle-double-right"></i> Residential</a></li>
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/library')}}"><i
                                            class="fas fa-angle-double-right"></i> Library</a></li>
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/hostel')}}"><i
                                            class="fas fa-angle-double-right"></i> Hostel</a></li>
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/health-care')}}"><i
                                            class="fas fa-angle-double-right"></i> Health Care</a></li>
                            </ul>
                        </li>
                        <li class="dropdown sm_dropdown">
                            <span class="nav-link" data-toggle="dropdown">Co-Curriculum</span>
                            <ul class="dropdown-menu">
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/debating-club')}}"><i
                                            class="fas fa-angle-double-right"></i> Debating Club</a></li>
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/sports')}}"><i
                                            class="fas fa-angle-double-right"></i> Sports</a></li>
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/bncc')}}"><i
                                            class="fas fa-angle-double-right"></i> BNCC</a></li>
                                <li style="padding: 0 10px;"><a href="{{asset('home/page/rover-scout')}}"><i
                                            class="fas fa-angle-double-right"></i> Rover Scout</a></li>
                            </ul>
                        </li>

                        <li class="dropdown sm_dropdown">
                            <span class="nav-link" data-toggle="dropdown">Gallery</span>
                            <ul class="dropdown-menu">
                                <li style="padding: 0 10px;"><a href="{{route('home.image-gallery')}}"><i
                                            class="fas fa-angle-double-right"></i> Image Gallery</a></li>
                                <li style="padding: 0 10px;"><a href="{{route('home.video-gallery')}}"><i
                                            class="fas fa-angle-double-right"></i> Video Gallery</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="{{route('home.notice')}}">Notice</a></li>
                        <li><a class="nav-link" href="{{route('home.news')}}">News</a></li>
                        <li><a class="nav-link" href="{{route('home.contact')}}">Contact</a></li>

                    @else
                        <?php
                        $homePage = 'home/department?department=' . $department;
                        $aboutPage = 'home/about-department?department=' . $department;
                        $teacherPage = 'home/teacher?department=' . $department;
                        $staffPage = 'home/staff?department=' . $department;
                        $imagePage = 'home/image-gallery?department=' . $department;
                        $videoPage = 'home/video-gallery?department=' . $department;
                        $noticePage = 'home/notice?department=' . $department;
                        $newsPage = 'home/news?department=' . $department;
                        $contactPage = 'home/contact?department=' . $department;
                        ?>

                        <li><a class="nav-link active" href="{{asset($homePage)}}">Home</a></li>
                        <li><a class="nav-link" href="{{asset($aboutPage)}}">About</a></li>
                        <li><a class="nav-link" href="{{asset($teacherPage)}}">Teacher</a></li>
                        <li><a class="nav-link" href="{{asset($staffPage)}}">Office Staff</a></li>
                        <li class="dropdown sm_dropdown">
                            <span class="nav-link" data-toggle="dropdown">Gallery</span>
                            <ul class="dropdown-menu">
                                <li style="padding: 0 10px;"><a href="{{asset($imagePage)}}"><i
                                            class="fas fa-angle-double-right"></i> Image Gallery</a></li>
                                <li style="padding: 0 10px;"><a href="{{asset($videoPage)}}"><i
                                            class="fas fa-angle-double-right"></i> Video Gallery</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="{{asset($noticePage)}}">Notice</a></li>
                        <li><a class="nav-link" href="{{asset($newsPage)}}">News</a></li>
                        <li><a class="nav-link" href="{{asset($contactPage)}}">Contact</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- navbar nav end -->
