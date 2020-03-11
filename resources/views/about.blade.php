<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from validthemes.com/themeforest/examin/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 06:32:44 GMT -->
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <!-- ========== Page Title ========== -->
    <title>Shohoz School</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{asset('frontview')}}/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{asset('frontview')}}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/flaticon-set.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/magnific-popup.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/animate.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/css/bootsnav.css" rel="stylesheet" />
    <link href="{{asset('frontview')}}/style.css" rel="stylesheet">
    <link href="{{asset('frontview')}}/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{asset('frontview')}}/js/html5/html5shiv.min.js"></script>
      <script src="{{asset('frontview')}}/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Start Header Top 
    ============================================= -->
    <div class="top-bar-area address-two-lines bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 address-info">
                    <div class="info box">
                        <ul>
                            <li>
                                <span><i class="fas fa-envelope-open"></i> Email</span>surfbd85@gmail.com
                            </li>
                            <li>
                                <span><i class="fas fa-phone"></i> Contact</span>+88 018 50 317 496
                            </li>
                        </ul>
                    </div>
                </div>
                <!--<div class="user-login text-right col-md-4">
                    <a class="popup-with-form" href="#register-form">
                        <i class="fas fa-edit"></i> Register
                    </a>
                    <a  class="popup-with-form" href="#login-form">
                        <i class="fas fa-user"></i> Login
                    </a>
                </div>-->

                <div class="user-login text-right col-md-4">
                    <a href="{{url('registration')}}">
                        <i class="fas fa-edit"></i> Register
                    </a>
                    <a  href="{{url('login')}}">
                        <i class="fas fa-user"></i> Login
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky bootsnav">

            <!-- Start Top Search -->
            <div class="container">
                <div class="row">
                    <div class="top-search">
                        <div class="input-group">
                            <form action="#">
                                <input type="text" name="text" class="form-control" placeholder="Search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container">

                <!-- Start Atribute Navigation --
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>        
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a href="#">
                        <img style="height: 60px; width: 193px; margin-top: 10px; margin-bottom: 10px;" src="{{asset('frontview')}}/img/logo.png" class="logo" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li class="dropdown">
                            <a href="{{url('/')}}" >Home</a>

                        <li>
                            <a href="{{url('about')}}">About</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->


    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url({{asset('frontview')}}/img/1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start About 
    ============================================= -->
    <div class="about-area default-padding">
        <div class="container">
            <div class="row">
                <div class="about-info">
                    <div class="col-md-6 thumb">
                        <img src="{{asset('frontview')}}/img/about.jpg" alt="Thumb">
                    </div>
                    <div class="col-md-6 info">
                        <h5>Introduction</h5>
                        <h2>“MANAGE ALL ASPECTS OF YOUR SCHOOL WITH CHEAP OPEN SOURCE SCHOOL MANAGEMENT APPLICATION”</h2>
                        <p>
                            With modren education it is also required that the school management is done using modern ways.School Management Software are helping schools manage all aspects of school from fees collection to online services and student summary in an efficient way.A school admin can get a bird eye view of all the activities of school at a centralized place and plan and manage accordingly. 
                        </p>
                        <p>
                            We take care of all aspects of implementation from software to hardware as well as employee training with continuous tech support.Our open source solution provide all the benefits and features of any commercial application along with low implementation cost and flexibility in updation.
                        </p>
                        <p>
                        For a custom quotation or to discuss the benefits of School Management Application for your organisation.</p>
                        
                    </div>
                </div>
                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>
                <!--<div class="our-features">
                    <div class="col-md-4 col-sm-4">
                        <div class="item mariner">
                            <div class="icon">
                                <i class="flaticon-faculty-shield"></i>
                            </div>
                            <div class="info">
                                <h4>Expert faculty</h4>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item java">
                            <div class="icon">
                                <i class="flaticon-book-2"></i>
                            </div>
                            <div class="info">
                                <h4>Online learning</h4>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item malachite">
                            <div class="icon">
                                <i class="flaticon-education"></i>
                            </div>
                            <div class="info">
                                <h4>Scholarship</h4>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <!-- End About -->


    <!-- Start Video Area
    ============================================= -->
    <div class="video-area padding-xl text-center bg-fixed text-light shadow dark-hard" style="background-image: url({{asset('frontview')}}/img/banner/16.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="video-heading">
                        <h2>Take a short tour of our system</h2>
                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="video-info">
                    <div class="overlay-video">
                        <a class="popup-youtube video-play-button" href="{{asset('frontview')}}/img/school-sajid.mp4">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Video Area -->


   <!-- Start Blog 
    ============================================= -->
    <div id="blog" class="blog-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Trusted By Educational Institution</h2>
                    </div>
                </div>
            </div>
                <!-- Start Sidebar -->
                <div class="col-md-12">
                    <div class="sidebar">
                        <aside>
                            <!-- Sidebar Item -->
                            <div class="sidebar-item recent-post"> 
                            
                            @foreach($schools as $school)
                                <div class="item">
                                    <div class="content">
                                        <div class="thumb">
                                            
                                        </div>
                                        <div class="info">
                                            <h4>
                                                <a href="#">{{$school->school_name}}</a>
                                            </h4>
                                            
                                            <div class="meta">
                                                <i class="fas fa-map"> {{$school->school_address}}</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                
                             

                            </div>
                            <!-- End Sidebar Item -->

                        </aside>
                    </div>
                </div>
                <!-- End Sidebar -->            
            <!--<div class="row">
                <div class="blog-items">

                    <!-- Single Item --
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="#"><img src="{{asset('frontview')}}/img/blog/1.jpg" alt="Thumb"></a>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#">Chittagong Collegiate School and College</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Item -->
                    <!-- Single Item --
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="#"><img src="{{asset('frontview')}}/img/blog/2.jpg" alt="Thumb"></a>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#">Chittagong Port Authority High School</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Item -->
                    <!-- Single Item --
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="#"><img src="{{asset('frontview')}}/img/blog/3.jpg" alt="Thumb"></a>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#">Chittagong Grammar School</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single Item -->

                </div>
            </div>-->
        </div>
    </div>
    <!-- End Blog -->    

    <!-- Start Portfolio
    ============================================= --
    <div id="portfolio" class="portfolio-area default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Our Gallery</h2>
                        <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="portfolio-items-area text-center">
                <div class="row">
                    <div class="col-md-12 portfolio-content">
                        <div class="mix-item-menu active-theme">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".campus">Campus</button>
                            <button data-filter=".teachers">Teachers</button>
                            <button data-filter=".education">Education</button>
                            <button data-filter=".ceremony">Ceremony</button>
                            <button data-filter=".students">Students</button>
                        </div>
                        <!-- End Mixitup Nav--

                        <div class="row magnific-mix-gallery masonary text-light">
                            <div id="portfolio-grid" class="portfolio-items col-3">
                                <div class="pf-item ceremony students">
                                    <div class="item-effect">
                                        <img src="{{asset('frontview')}}/img/gallery/1.jpg" alt="thumb" />
                                        <div class="overlay">
                                            <a href="{{asset('frontview')}}/img/gallery/1.jpg" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item teachers ceremony">
                                    <div class="item-effect">
                                        <img src="{{asset('frontview')}}/img/gallery/2.jpg" alt="thumb" />
                                        <div class="overlay">
                                            <a href="{{asset('frontview')}}/img/gallery/2.jpg" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item campus education">
                                    <div class="item-effect">
                                        <img src="{{asset('frontview')}}/img/gallery/3.jpg" alt="thumb" />
                                        <div class="overlay">
                                            <a href="{{asset('frontview')}}/img/gallery/3.jpg" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item education students">
                                    <div class="item-effect">
                                        <img src="{{asset('frontview')}}/img/gallery/4.jpg" alt="thumb" />
                                        <div class="overlay">
                                            <a href="{{asset('frontview')}}/img/gallery/4.jpg" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item ceremony campus">
                                    <div class="item-effect">
                                        <img src="{{asset('frontview')}}/img/gallery/5.jpg" alt="thumb" />
                                        <div class="overlay">
                                            <a href="{{asset('frontview')}}/img/gallery/5.jpg" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item ceremony teachres">
                                    <div class="item-effect">
                                        <img src="{{asset('frontview')}}/img/gallery/6.jpg" alt="thumb" />
                                        <div class="overlay">
                                            <a href="{{asset('frontview')}}/img/gallery/6.jpg" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Portfolio -->

    <!-- Start Footer 
    ============================================= -->
    <footer class="bg-dark default-padding-top text-light">
        <div class="container">
            <div class="row">
                <div class="f-items">
                    <div class="col-md-4 item">
                        <div class="f-item">
                            <img src="{{asset('frontview')}}/img/courses/2.jpg" alt="Logo">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 item">
                        <div class="f-item link">
                            <h4>Links</h4>
                            <ul>
                                <li>
                                    <a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                    <a href="Register.html">Register</a>
                                </li>
                                <li>
                                    <a href="Login.html">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 item">
                        <div class="f-item address">
                            <h4>Address</h4>
                            <ul>
                                <li>
                                    <i class="fas fa-envelope"></i> 
                                    <p>Email <span><a href="mailto:surfbd85@gmail.com">surfbd85@gmail.com</a></span></p>
                                </li>
                                <li>
                                    <i class="fas fa-map"></i> 
                                    <p>Office <span>Ground Floor, 205 Shulokbahar, Dada Tower, Muradpur,Chattagram-4203</span></p>
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i> 
                                    <p>Contact <span>+88 018 50 317 496</span></p>
                                </li>                                
                            </ul>
                            <div class="opening-info">
                                <h5>Contact Hours</h5>
                                <ul>
                                    <li> <span> Saturday - Fiday :  </span>
                                      <div class="pull-right"> 6.00 am - 10.00 pm </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p>&copy; Copyright 2019. All Rights Reserved by <a href="http://www.xitbangladesh.com">XiT Bangladesh</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{asset('frontview')}}/js/jquery-1.12.4.min.js"></script>
    <script src="{{asset('frontview')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontview')}}/js/equal-height.min.js"></script>
    <script src="{{asset('frontview')}}/js/jquery.appear.js"></script>
    <script src="{{asset('frontview')}}/js/jquery.easing.min.js"></script>
    <script src="{{asset('frontview')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('frontview')}}/js/modernizr.custom.13711.js"></script>
    <script src="{{asset('frontview')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontview')}}/js/wow.min.js"></script>
    <script src="{{asset('frontview')}}/js/isotope.pkgd.min.js"></script>
    <script src="{{asset('frontview')}}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('frontview')}}/js/count-to.js"></script>
    <script src="{{asset('frontview')}}/js/bootsnav.js"></script>
    <script src="{{asset('frontview')}}/js/main.js"></script>

</body>

<!-- Mirrored from validthemes.com/themeforest/examin/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 06:32:50 GMT -->
</html>