<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php($siteInfo = settings())
        <!-- required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ (!empty($siteInfo->site_name) ? $siteInfo->site_name : '') }}</title>
    
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset(!empty($siteInfo->favicon) ? $siteInfo->favicon : '') }}">
    
        <!-- ionicons css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <!-- toastr css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <!-- selectpicker css -->
        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <!-- datepicker css -->
        <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
        <!-- perfect scrollbar css -->
        <link rel="stylesheet" href="{{asset('backend')}}/vendors/scrollbar/perfect-scrollbar.css">
        <!-- include style -->
        <link rel="stylesheet" href="{{asset('backend')}}/style/master.css">
    
        @stack('header-style')
        @stack('header-script')
    </head>
    <body>
        {{--@dd($mainMenu)--}}
        <section class="wrapper" data-menu="{{(!empty($asideMenu) ? $asideMenu : '')}}" data-submenu="{{(!empty($asideSubmenu) ? $asideSubmenu : '')}}">
            <!-- panel aside start -->
            <aside class="panel_aside">
                <div class="brand">
                    <span class="brand_icon"><i class="icon ion-md-home"></i></span>
                    <h3>Freelance It Lab</h3>
                    <a href="#" id="panelClose_btn">
                        <i class="icon ion-ios-close io-36"></i>
                    </a>
                    <a href="#" id="panelOpen_btn">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <!-- aside nav start -->
                <ul class="aside_nav">
                    <!-- dashboard -->
                    <li id="dashboard">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="menu_title">Dashboard</span>
                        </a>
                    </li>
        
                    <!-- Media Gallery -->
                    <li id="media" class="dropdown">
                        <a href="#">
                            <i class="fas fa-images"></i>
                            <span class="menu_title">Media Gallery</span>
                            <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="imageGallery"><a href="{{route('admin.media.image')}}">Image Gallery</a></li>
                            <li class="videoGallery"><a href="{{route('admin.media.video')}}">Video Gallery</a></li>
                        </ul>
                    </li>
                    
                    <!-- Slider -->
                    <li id="slider">
                        <a href="{{route('admin.slider')}}">
                            <i class="fas fa-sliders-h"></i>
                            <span class="menu_title">Slider</span>
                        </a>
                    </li>
        
                    <!-- Department -->
                    @if(Auth::user()->privilege != 'user')
                    <li id="department">
                        <a href="{{route('admin.department')}}">
                            <i class="fas fa-book"></i>
                            <span class="menu_title">Department</span>
                        </a>
                    </li>
                    @endif
        
                    <!-- Notice -->
                    <li id="notice" class="dropdown">
                        <a href="#">
                            <i class="fas fa-file"></i>
                            <span class="menu_title">Notice</span>
                            <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="addNotice"><a href="{{route('admin.notice.create')}}">Add Notice</a></li>
                            <li class="allNotice"><a href="{{route('admin.notice')}}">All Notice</a></li>
                        </ul>
                    </li>
        
                    <!-- Speech -->
                    @if(Auth::user()->privilege != 'user')
                    <li id="speech" class="dropdown">
                        <a href="#">
                            <i class="fas fa-file"></i>
                            <span class="menu_title">Speech</span>
                            <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="addSpeech"><a href="{{route('admin.speech.create')}}">Add Speech</a></li>
                            <li class="allSpeech"><a href="{{route('admin.speech')}}">All Speech</a></li>
                        </ul>
                    </li>
                    @endif
        
                    <!-- Page -->
                    <li id="page" class="dropdown">
                        <a href="#">
                            <i class="fas fa-file"></i>
                            <span class="menu_title">Page</span>
                            <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                        </a>
                        <ul>
                            @if(Auth::user()->privilege == 'super')
                                <li class="addPage"><a href="{{route('admin.page.create')}}">Add Page</a></li>
                            @endif
                            <li class="allPage"><a href="{{route('admin.page')}}">All Page</a></li>
                        </ul>
                    </li>
        
                    <!-- Post -->
                    <li id="post" class="dropdown">
                        <a href="#">
                            <i class="fas fa-file"></i>
                            <span class="menu_title">Post</span>
                            <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="addPost"><a href="{{route('admin.post.create')}}">Add Post</a></li>
                            <li class="allPost"><a href="{{route('admin.post')}}">All Post</a></li>
                        </ul>
                    </li>
        
                    <!-- Teacher -->
                    <li id="teacher" class="dropdown">
                        <a href="#">
                            <i class="fas fa-people-arrows"></i>
                            <span class="menu_title">Teacher</span>
                                <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="addTeacher"><a href="{{route('admin.teacher.create')}}">Add Teacher</a></li>
                            <li class="allTeacher"><a href="{{route('admin.teacher')}}">All Teacher</a></li>
                            <li class="allDesignation"><a href="{{route('admin.teacher.designation')}}">Designation</a></li>
                        </ul>
                    </li>
        
                    <!-- Staff -->
                    <li id="staff" class="dropdown">
                        <a href="#">
                            <i class="fas fa-people-arrows"></i>
                            <span class="menu_title">Staff</span>
                            <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="addStaff"><a href="{{route('admin.staff.create')}}">Add Staff</a></li>
                            <li class="allStaff"><a href="{{route('admin.staff')}}">All Staff</a></li>
                            <li class="allDesignation"><a href="{{route('admin.staff.designation')}}">Designation</a></li>
                        </ul>
                    </li>

                    <!-- Student -->
                    <li id="online-admission" class="dropdown">
                        <a href="#">
                            <i class="fas fa-people-arrows"></i>
                            <span class="menu_title">Online Admission</span>
                            <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                        </a>
                        
                        <ul>
                            <li class="allOnlineStudentHsc"><a href="{{route('admin.online-admission')}}">All Student (HSC)</a></li>
                            <li class="allOnlineStudentHonrs"><a href="{{route('admin.online-admission.honrs')}}">All Student (Honrs)</a></li>
                        </ul>
                    </li>
        
                    <!-- Student -->
                    <li id="student" class="dropdown">
                        <a href="#">
                            <i class="fas fa-people-arrows"></i>
                            <span class="menu_title">Student</span>
                            <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="addStudent"><a href="{{route('admin.student.create')}}">Add Student</a></li>
                            <li class="allStudent"><a href="{{route('admin.student')}}">All Student</a></li>
                        </ul>
                    </li>
        
                    <!-- Mobile Sms -->
                    {{--<li id="sms" class="dropdown">
                        <a href="#">
                            <i class="fas fa-comment-dots"></i>
                            <span class="menu_title">Mobile Sms</span>
                            <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="customSms"><a href="{{route('admin.sms.custom_sms')}}">Custom SMS</a></li>
                            <li class="sendSms"><a href="{{route('admin.sms.send_sms')}}">Send SMS</a></li>
                            <li class="smsReport"><a href="{{route('admin.sms')}}">SMS Report</a></li>
                        </ul>
                    </li>--}}
        
        
                    <!-- User -->
                    @if(Auth::user()->privilege != 'user')
                        <li id="user" class="dropdown">
                            <a href="#">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="menu_title">User</span>
                                <span class="menu_arrow">
                                <i class="icon ion-ios-arrow-forward right"></i>
                                <i class="icon ion-ios-arrow-down down"></i>
                            </span>
                            </a>
                            <ul>
                                <li class="add_user"><a href="{{route('admin.user.create')}}">Add User</a></li>
                                <li class="all_user"><a href="{{route('admin.user')}}">All User</a></li>
                            </ul>
                        </li>
                        <!-- privilege -->
                        {{--<li id="privilege">
                            <a href="{{route('admin.privilege')}}">
                                <i class="fas fa-tachometer-alt"></i>
                                <span class="menu_title">Privilege</span>
                            </a>
                        </li>--}}
        
        
                        <!-- Frontend message -->
                        <li id="frontendMessage">
                            <a href="{{route('admin.frontend-message')}}">
                                <i class="fas fa-envelope-open-text"></i>
                                <span class="menu_title">Frontend Message</span>
                            </a>
                        </li>
        
                        <!-- Settings -->
                        <li id="settings">
                            <a href="{{route('admin.settings')}}">
                                <i class="fas fa-cogs"></i>
                                <span class="menu_title">Settings</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </aside>
            <!-- panel aside end -->
        
        
            <!-- body section start -->
            <div class="main_body">
                <!-- main nav start -->
                <nav class="main_nav">
                    <ul class="function_menu">
                        <li class="user_dropdown">
                            <a href="#" id="aside-toggle">
                                <i class="icon ion-ios-menu io-23"></i>
                            </a>
                        </li>
                        <li class="visit_site">
                            <a href="{{asset('/')}}" target="_blank" style="width: auto; padding: 0 10px; margin-left: 10px;"><i class="fas fa-eye"></i> <span style="font-size: 12px; font-weight: bold; text-transform: uppercase;">Visit WebSite</span></a>
                        </li>
                    </ul>
        
                    <ul class="user_menu">
                        <!-- message -->
                        <li class="user_dropdown">
                            <a href="#" class="menu-button">
                                <i class="icon ion-ios-mail io-21"></i>
                            </a>
                            <ul class="sub_menu">
                                <li class="head">
                                    <a href="#">
                                        <h6>You have 2 Message</h6>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Awesome aminmate.css</span>
                                        <small>10 minit ago</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Awesome aminmate.css</span>
                                        <small>10 minit ago</small>
                                    </a>
                                </li>
                            </ul>
                        </li>
        
                        <!-- profile -->
                        <li class="user_dropdown">
                            <a href="#" class="menu-button">
                                @if(!empty(Auth::user()->avatar))
                                    <img src="{{asset(Auth::user()->avatar)}}" alt="">
                                @else
                                    <img src="{{asset('backend')}}/images/user/02.png" alt="">
                                @endif
                            </a>
                            <ul class="sub_menu">
                                <li class="head">
                                    <a href="">
                                        <h6>{{strFilter(Auth::user()->name)}}</h6>
                                        <small>{{strFilter(Auth::user()->privilege)}}</small>
                                    </a>
                                </li>
                                <li><a href="{{route('admin.user.show', Auth::user()->id)}}">Profile</a></li>
                                <li>
                                    <a href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- main nav end -->
        
                @yield('content')
            </div>
            <!-- body section end -->
        
        
            <!-- footer start -->
            <!--<div class="developer">-->
            <!--    <p>Developed By : <a href="https://freelanceitlab.com/" target="_blank">Freelance It Lab</a></p>-->
            <!--</div>-->
            <div class="wrapper_background"></div>
        </section>
        
        <!-- jQuery js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
        <!-- selectpicker js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <!-- toastr js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <!-- ckeditor4 js -->
        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
        <!-- datepicker js -->
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
        <!-- perfect scrollbar js -->
        <script src="{{asset('backend')}}/vendors/scrollbar/perfect-scrollbar.min.js"></script>
        <!-- include js -->
        <script src="{{asset('backend')}}/js/app.js"></script>
        
        @include('components.toastr')
        
        @stack('footer-style')
        @stack('footer-script')
    </body>
</html>
