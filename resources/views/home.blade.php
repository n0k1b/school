<!DOCTYPE html>
<html lang="en">



<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- ========== Meta Tags ========== -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SGC- A school management system">

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

            <!-- Start Top Search --
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
                    @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif
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
                            <!--<ul class="dropdown-menu">
                                <li><a href="index-1.html">Home Version One</a></li>
                                <li><a href="index-2.html">Home Version Two</a></li>
                                <li><a href="index-3.html">Home Version Three</a></li>
                                <li><a href="index-4.html">Home Version Four</a></li>
                                <li><a href="index-5.html">Home Version Five</a></li>
                                <li><a href="index-6.html">Home Version Six</a></li>
                                <li><a href="index-onepage.html">Onepage Version One</a></li>
                                <li><a href="index-2-onepage.html">Onepage Version Two</a></li>
                                <li><a href="index-3-onepage.html">Onepage Version Three</a></li>
                                <li><a href="index-4-onepage.html">Onepage Version Four</a></li>
                                <li><a href="index-5-onepage.html">Onepage Version Five</a></li>
                                <li><a href="index-6-onepage.html">Onepage Version Six</a></li>
                            </ul>
                        </li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Gallery</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="gallery-2-colum.html">Gallery Two Colum</a></li>
                                                    <li><a href="gallery-3-colum.html">Gallery Three Colum</a></li>
                                                    <li><a href="gallery-4-colum.html">Gallery Four Colum</a></li>
                                                    <li><a href="gallery-6-colum.html">Gallery Six Colum</a></li>
                                                </ul>
                                            </div>
                                        </div><!-- end col-3 --
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Advisor</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="advisor-carousel.html">Advisor Carousel</a></li>
                                                    <li><a href="advisor-2-colum.html">Advisor Two Colum</a></li>
                                                    <li><a href="advisor-3-colum.html">Advisor Three Colum</a></li>
                                                    <li><a href="advisor-carousel-2.html">Advisor Carousel Two</a></li>
                                                </ul>
                                            </div>
                                        </div><!-- end col-3 --
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">User Pages</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="profile.html">Profile</a></li>
                                                    <li><a href="edit-profile.html">Edit Profile</a></li>
                                                    <li><a href="login.html">login</a></li>
                                                    <li><a href="register.html">register</a></li>
                                                </ul>
                                            </div>
                                        </div><!-- end col-3 --
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Other Pages</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="about-us.html">About Us</a></li>
                                                    <li><a href="faq.html">Faq</a></li>
                                                    <li><a href="pricing-table.html">Pricing Table</a></li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                    <li><a href="404.html">Error Page</a></li>
                                                </ul>
                                            </div>
                                        </div><!-- end col-3 --
                                    </div><!-- end row --
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" >Courses</a>
                            <ul class="dropdown-menu">
                                <li><a href="courses.html">Courses Carousel One</a></li>
                                <li><a href="courses-2.html">Courses Grid One</a></li>
                                <li><a href="courses-3.html">Courses Grid Two</a></li>
                                <li><a href="courses-4.html">Courses Carousel Two</a></li>
                                <li><a href="course-details.html">Course Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" >Teachers</a>
                            <ul class="dropdown-menu">
                                <li><a href="teachers.html">Advisor</a></li>
                                <li><a href="teachers-details.html">Advisor Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" >Event</a>
                            <ul class="dropdown-menu">
                                <li><a href="event.html">Event Mixed Colum</a></li>
                                <li><a href="event-2.html">Event Grid Colum</a></li>
                                <li><a href="event-3.html">Event Carousel</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Blog</a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-standard.html">Blog Standard</a></li>
                                <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                <li><a href="blog-single-standard.html">Single Standard</a></li>
                                <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                                <li><a href="blog-single-right-sidebar.html">Single Right Sidebar</a></li>
                            </ul>
                        </li>-->
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

    <!-- Start Login Form 
    ============================================= --
    <form action="#" id="login-form" class="mfp-hide white-popup-block">
        <div class="col-md-4 login-social">
            <h4>Login with social</h4>
            <ul>
                <li class="facebook">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="twitter">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="linkedin">
                    <a href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-8 login-custom">
            <h4>login to your registered account!</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Email*" type="email">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Password*" type="text">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <label for="login-remember"><input type="checkbox" id="login-remember">Remember Me</label>
                    <a title="Lost Password" href="#" class="lost-pass-link">Lost your password?</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <button type="submit">
                        Login
                    </button>
                </div>
            </div>
            <p class="link-bottom">Not a member yet? <a href="#">Register now</a></p>
        </div>
    </form>
    <!-- End Login Form -->

    <!-- Start Register Form 
    ============================================= --
    <form action="#" id="register-form" class="mfp-hide white-popup-block">
        <div class="col-md-4 login-social">
            <h4>Register with social</h4>
            <ul>
                <li class="facebook">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="twitter">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="linkedin">
                    <a href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-8 login-custom">
            <h4>Register a new account</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Email*" type="email">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Username*" type="text">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Password*" type="text">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Repeat Password*" type="text">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <button type="submit">
                        Sign up
                    </button>
                </div>
            </div>
            <p class="link-bottom">Are you a member? <a href="#">Login now</a></p>
        </div>
    </form>
    <!-- End Register Form -->

    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area content-top-heading less-paragraph text-normal">
        <div id="bootcarousel" class="carousel slide animate_text carousel-fade" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner text-light carousel-zoom">
                <div class="item active">
                    <div class="slider-thumb bg-fixed" style="background-image: url({{asset('frontview')}}/img/banner/1.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">All in One System</h3>
                                            <h1 data-animation="animated slideInUp">To Run Your School More Smoothly</h1>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-thumb bg-fixed" style="background-image: url({{asset('frontview')}}/img/banner/2.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">We're glad to give you</h3>
                                            <h1 data-animation="animated slideInUp">The Best Solution For Your Educational Intitution</h1>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-thumb bg-fixed" style="background-image: url({{asset('frontview')}}/img/banner/3.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">Robust Student Information System & </h3>
                                            <h1 data-animation="animated slideInUp">Perfect School Management Solution</h1>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
    <!-- End Banner -->


        <!-- Start Top Categories 
    ============================================= -->
    <div id="top-categories" class="top-cat-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Top Categories</h2>
                        <p>
                            Shohoz School acts as a helping hand for teachers and parents. Also gives a handy tool for school admins. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="top-cat-items">
                    <div class="col-md-3 col-xs-6">
                        <div class="item">
                            <a href="#">
                                <i class=""><img src="{{asset('frontview')}}/img/category/11.png"></i>
                                <div class="info">
                                    <h4>Attendance management system</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="item">
                            <a href="#">
                                <i class=""><img src="{{asset('frontview')}}/img/category/2.png"></i>
                                <div class="info">
                                    <h4>Notification To parents</h4>
                                   
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="item">
                            <a href="#">
                                <i class=""><img src="{{asset('frontview')}}/img/category/3.png"></i>
                                <div class="info">
                                    <h4>Monthly Fees Management</h4>
                                    
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
                        <div class="item">
                            <a href="#">
                                <i class=""><img src="{{asset('frontview')}}/img/category/4.png"></i>
                                <div class="info">
                                    <h4>Communicate with parents</h4>
                            
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="item">
                            <a href="#">
                                <i class=""><img src="{{asset('frontview')}}/img/category/5.png"></i>
                                <div class="info">
                                    <h4>Result storage & management</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="item">
                            <a href="#">
                                <i class=""><img src="{{asset('frontview')}}/img/category/6.png"></i>
                                <div class="info">
                                    <h4>Monthly Payment confirmation</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="item">
                            <a href="#">
                                <i class=""><img src="{{asset('frontview')}}/img/category/7.png"></i>
                                <div class="info">
                                    <h4>Event Notification</h4>
                                 
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="item">
                            <a href="#">
                                <i class=""><img src="{{asset('frontview')}}/img/category/8.png"></i>
                                <div class="info">
                                    <h4>Classwise Student Information</h4>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Categories -->


    <!-- Start Featured Courses 
    ============================================= -->
    <div id="featured-courses" class="featured-courses-area left-details default-padding">
        <div class="container">
            <div class="row">
                <div class="featured-courses-carousel owl-carousel owl-theme">

                    <!-- Start Single Item -->
                    <div class="item">
                        <div class="col-md-5">
                            <div class="thumb">
                                <img src="{{asset('frontview')}}/img/courses/f1.jpg" alt="Thumb">
                                
                            </div>
                        </div>
                        <div class="col-md-7 info">
                            <h2>
                                A Complete Package For School Management System
                            </h2>
                            <h4>Web Application</h4>
                            <p>
                               Shohoz School Management System is one of the leading open source that offers a number of options at a very low cost to manage complete school functions and activities.<br>
                               With our simple yet elegant dashboard design, you would feel easier to recognize key features and experience convenient navigation. Classified sections on each and every feature adds more transparency to academic administration.
                            </p>
                            <h3>Website Contains</h3>
                            <ul>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Dashing dashboards</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Easy import and export of data</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Well-structured modules</span>
                                </li> 
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>User friendly</span>
                                </li> 
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Security</span>
                                </li>                              
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Start Single Item -->
                    <div class="item">
                        <div class="col-md-5">
                            <div class="thumb">
                                <img src="{{asset('frontview')}}/img/android.jpg" alt="Thumb">
                                
                            </div>
                        </div>
                        <div class="col-md-7 info">
                            <h2>
                                Smart On Mobile
                            </h2>
                            <h4>Android Application</h4>
                            <p>
                               The Mobile version of the shohoz School gives a brand new user experience in the latest mobile platforms. The master brains behind this integrated enterprise computing system have developed the mobile version of the software easily accessible to the users, with the highest level of security. <br>
                               We are aiming towards providing quality services by increasing the customer engagement, making it the best pick in running a scholastic institution with 100% efficacy.
                            </p>
                            <h3>Android application contains</h3>
                            <ul>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Attendance counter</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Academic result, </span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Payment Information</span> 
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Notice of user’s school</span>
                                </li>
                            </ul>
                           
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Start Single Item -->
                    <div class="item">
                        <div class="col-md-5">
                            <div class="thumb">
                                <img src="{{asset('frontview')}}/img/featured.jpg" alt="Thumb">
                               
                            </div>
                        </div>
                        <div class="col-md-7 info">
                            <h2>
                                Need Off-line Service? 
                            </h2>
                            <h4>Featured Phone User</h4>
                            <p>
                               For the Featured Phone User shohoz School Management System includes the USSD system for the parents to get any kind of information and complete school functions and activities.
                            </p>
                            <h3>Operation outcomes</h3>
                            <ul>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Send SMS to 21213 for registering first.</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Get any kind of requirements through dialing USSD code.</span>
                                </li>
                                
                            </ul>
                            
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Featured Courses -->



    <!-- Start Why Chose Us 
    ============================================= -->
    <div class="wcs-area bg-dark text-light">
        <div class="container-full">
            <div class="row">
                <div class="col-md-6 thumb bg-cover" style="background-image: url({{asset('frontview')}}/img/banner/16.jpg);"></div>
                <div class="col-md-6 content">
                    <div class="site-heading text-left">
                        <h2>Why chose us</h2>
                        <p>
                            shohoz School is that one solution you’ve been looking for. It manages all your school management needs with efficiency and ease. This Aplication provides you the top-notch technology and user experience. Our clients state that it solves common educational institution management inefficiencies.<br>
                            Our comprehensive school management and administration software package, Web School, add quality of academic institutions by letting efficient monitoring of the day to day progress and performance. What made us the best is our features that allow parents to stay updated with their kids’ performance levels.

                        </p>
                    </div>

                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                            <img src="{{asset('frontview')}}/img/choose/1.png">
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Cloud access</a>
                            </h4>
                            <p>
                               Users can access shohoz School anywhere from the world from their PC or mobile devices.
                            </p>
                        </div>
                    </div>
                    <!-- item -->

                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                             <img src="{{asset('frontview')}}/img/choose/2.png">
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Easy to use</a>
                            </h4>
                            <p>
                                Creatively designed modules which require minimal training and ease in access.
                            </p>
                        </div>
                    </div>
                    <!-- item -->

                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                            <img src="{{asset('frontview')}}/img/choose/3.png">
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Zero paperwork</a>
                            </h4>
                            <p>
                                Digitalizes the entire school management functions which makes shohoz school 100% green initiative.
                            </p>
                        </div>
                    </div>
                    <!-- item -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Why Chose Us -->



    <!-- Start Event
    ============================================= -->
    <section id="event" class="event-area default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2> How Can We Help You? </h2>
                        <p>
                            shohoz School Gives You Everything If You Need To Manage, Monitor and Coordinate Your Institution. We can help you to create the better culture in your Educational Institution.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="event-items">
                    <!-- Single Item -->
                    <div class="item horizontal col-md-12">
                        <div class="col-md-6 thumb bg-cover" style="background-image: url({{asset('frontview')}}/img/event/1.jpg);">
                            
                        </div>
                        <div class="col-md-6 info">
                            <h4>
                                <a href="#">Administration</a>
                            </h4>
                        
                            <p>
                                shohoz School is present an easily approachable, user-friendly and dynamic school management software that benefits for academic excellence. <br>
                                All the data available in the software can be successfully converted to a document sheet using the data import and export module.The store management module primarily deals with the inventory tracking in the institution. Our fully functional software offers successful export and import of the data. All the students details can be effectively transferred between the frontend and backend of the software, which actually helps in creating a totally new user experience to the emloyees and reduce the load of comprehensive paper work. 
                            </p>
                            
                        </div>
                    </div>
                    <!-- Single Item -->

                    <!-- Single Item -->
                    <div class="item horizontal col-md-12">
                        
                        <div class="col-md-6 info">
                            <h4>
                                <a href="#">Teacher</a>
                            </h4>
                        
                            <p>
                                Teacher can take attendance through the online attendance system and also can track the whole class performance. The results can be published through online by teachers. Moreover simplify the everyday classroom work and never bother about all the paperwork. 
                            </p>
                            
                        </div>
                        <div class="col-md-6 thumb bg-cover" style="background-image: url({{asset('frontview')}}/img/event/2.jpg);"></div>
                    </div>
                    <!-- Single Item -->

                    <!-- Single Item -->
                    <div class="item horizontal col-md-12">
                        <div class="col-md-6 thumb bg-cover" style="background-image: url({{asset('frontview')}}/img/event/3.jpg);">
                            
                        </div>
                        <div class="col-md-6 info">
                            <h4>
                                <a href="#">Parents</a>
                            </h4>
                        
                            <p>
                                 Parents can get confirmation about the attendance and Academic Result of their children.They can have access to the monthly fees status. The system provides all the essential notifications and reminders regarding the school and academics to the every parents. That is to say breaking all the communication barriers, it helps parents to be with their children in every step of education.
                            </p>
                            
                        </div>
                    </div>
                    <!-- Single Item -->

                  

                </div>
            </div>
        </div>
    </section>
    <!-- End Event -->



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

<!-- Mirrored from validthemes.com/themeforest/examin/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 06:29:20 GMT -->
</html>


    <!-- Start Registration 
    ============================================= --
    <div class="reg-area default-padding-top bg-gray">
        <div class="container">
            <div class="row">
                <div class="reg-items">
                    <div class="col-md-6 reg-form default-padding-bottom">
                        <div class="site-heading text-left">
                            <h2>Get a Free online Registration</h2>
                            <p>
                                written on charmed justice is amiable farther besides. Law insensible middletons unsatiable for apartments boy delightful unreserved. 
                            </p>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="First Name" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Last Name" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email*" type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Chose Subject</option>
                                            <option>Computer Engineering</option>
                                            <option>Accounting Technologies</option>
                                            <option>Web Development</option>
                                            <option>Machine Language</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Phone" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit">
                                        Rigister Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 thumb">
                        <img src="{{asset('frontview')}}/img/contact.png" alt="Thumb">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Registration -->

    <!-- Start Testimonials 
    ============================================= --
    <div class="testimonials-area carousel-shadow default-padding bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Students Review</h2>
                        <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clients-review-carousel owl-carousel owl-theme">
                        <!-- Single Item --
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="{{asset('frontview')}}/img/team/2.jpg" alt="Thumb">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant has. Early had add equal china quiet visit. Appear an manner as no limits either praise.. 
                                </p>
                                <h4>Druna Patia</h4>
                                <span>Biology Student</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item --
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="{{asset('frontview')}}/img/team/3.jpg" alt="Thumb">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant has. Early had add equal china quiet visit. Appear an manner as no limits either praise.. 
                                </p>
                                <h4>Astron Brun</h4>
                                <span>Science Student</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item --
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="{{asset('frontview')}}/img/team/4.jpg" alt="Thumb">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant has. Early had add equal china quiet visit. Appear an manner as no limits either praise.. 
                                </p>
                                <h4>Paol Druva</h4>
                                <span>Development Student</span>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item --
                        <div class="item">
                            <div class="col-md-5 thumb">
                                <img src="{{asset('frontview')}}/img/team/7.jpg" alt="Thumb">
                            </div>
                            <div class="col-md-7 info">
                                <p>
                                    Procuring continued suspicion its ten. Pursuit brother are had fifteen distant has. Early had add equal china quiet visit. Appear an manner as no limits either praise.. 
                                </p>
                                <h4>Druna Patia</h4>
                                <span>Biology Student</span>
                            </div>
                        </div>
                        <!-- Single Item --
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

    <!-- Start Blog 
    ============================================= --
    <div id="blog" class="blog-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Trusted By Educational Institution</h2>
                    </div>
                </div>
            </div>
                <!-- Start Sidebar --
                <div class="col-md-12">
                    <div class="sidebar">
                        <aside>
                            <!-- Sidebar Item --
                            <div class="sidebar-item recent-post">     
                                <div class="item">
                                    <div class="content">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="{{asset('frontview')}}/img/blog/1.jpg" alt="Thumb">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4>
                                                <a href="#">Chittagong Collegiate School and College</a>
                                            </h4>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span>4.5 </span>
                                            </div>
                                            <div class="meta">
                                                <i class="fas fa-map"> Chittagong</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="content">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="{{asset('frontview')}}/img/blog/2.jpg" alt="Thumb">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4>
                                                <a href="#">Chittagong Port Authority High School</a>
                                            </h4>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span>4.5</span>
                                            </div>
                                            <div class="meta">
                                                <i class="fas fa-map"> Chittagong</i> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="content">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="{{asset('frontview')}}/img/blog/3.jpg" alt="Thumb">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4>
                                                <a href="#">Chittagong Grammar School</a>
                                            </h4>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-alt"></i>
                                                <span>4</span>
                                            </div>
                                            <div class="meta">
                                                <i class="fas fa-map"> Chittagong</i> 
                                            </div>
                                        </div>
                                    </div>
                                </div>                                

                            </div>
                            <!-- End Sidebar Item --

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
                    <!-- Single Item --

                </div>
            </div>--
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start Clients Area 
    ============================================= --
    <div class="clients-area default-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-4 info">
                    <h4>Our largest education campus</h4>
                    <p>
                        Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.
                    </p>
                </div>
                <div class="col-md-8 clients">
                    <div class="clients-items owl-carousel owl-theme text-center">
                        <div class="single-item">
                            <a href="#"><img src="{{asset('frontview')}}/img/clients/1.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{asset('frontview')}}/img/clients/2.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{asset('frontview')}}/img/clients/3.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{asset('frontview')}}/img/clients/4.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{asset('frontview')}}/img/clients/5.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{asset('frontview')}}/img/clients/6.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{asset('frontview')}}/img/clients/7.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{asset('frontview')}}/img/clients/8.png" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{asset('frontview')}}/img/clients/9.png" alt="Clients"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Area -->

        <!-- Start Featured Courses 
    ============================================= --
    <div id="featured-courses" class="featured-courses-area left-details default-padding">
        <div class="container">
            <div class="row">
                <div class="featured-courses-carousel owl-carousel owl-theme">
                    <!-- Start Single Item --
                    <div class="item">
                        <div class="col-md-5">
                            <div class="thumb">
                                <img src="{{asset('frontview')}}/img/courses/f1.jpg" alt="Thumb">
                                <div class="live-view">
                                    <a href="{{asset('frontview')}}/img/courses/f1.jpg" class="item popup-link">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=vQqZIFCab9o">
                                        <i class="fa fa-video"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 info">
                            <h2>
                                <a href="#">Codecademy software programming</a>
                            </h2>
                            <h4>featured courses</h4>
                            <p>
                                Both rest of know draw fond post as. It agreement defective to excellent. Feebly do engage of narrow. Extensive repulsive belonging depending if promotion be zealously as. Preference inquietude ask
                            </p>
                            <h3>Learning outcomes</h3>
                            <ul>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Over 37 lectures and 55.5 hours of content!</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Testing Training Included.</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Course content designed by considering current software testing</span> 
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Practical assignments at the end of every session.</span>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-theme effect btn-md" data-animation="animated slideInUp">Enroll Now</a>
                            <div class="bottom-info align-left">
                                <div class="item">
                                    <h4>Author</h4>
                                    <a href="#">
                                        <span>Devid Honey</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <h4>Students enrolled</h4>
                                    <span>5455</span>
                                </div>
                                <div class="item">
                                    <h4>Rating</h4>
                                    <span class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Start Single Item --
                    <div class="item">
                        <div class="col-md-5">
                            <div class="thumb">
                                <img src="{{asset('frontview')}}/img/courses/f2.jpg" alt="Thumb">
                                <div class="live-view">
                                    <a href="{{asset('frontview')}}/img/courses/f2.jpg" class="item popup-link">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=vQqZIFCab9o">
                                        <i class="fa fa-video"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 info">
                            <h2>
                                <a href="#">Data analysis and data science</a>
                            </h2>
                            <h4>featured courses</h4>
                            <p>
                                Both rest of know draw fond post as. It agreement defective to excellent. Feebly do engage of narrow. Extensive repulsive belonging depending if promotion be zealously as. Preference inquietude ask
                            </p>
                            <h3>Learning outcomes</h3>
                            <ul>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Over 37 lectures and 55.5 hours of content!</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Testing Training Included.</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Course content designed by considering current software testing</span> 
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Practical assignments at the end of every session.</span>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-theme effect btn-md" data-animation="animated slideInUp">Enroll Now</a>
                            <div class="bottom-info align-left">
                                <div class="item">
                                    <h4>Author</h4>
                                    <a href="#">
                                        <span>Devid Honey</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <h4>Students enrolled</h4>
                                    <span>5455</span>
                                </div>
                                <div class="item">
                                    <h4>Rating</h4>
                                    <span class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Start Single Item --
                    <div class="item">
                        <div class="col-md-5">
                            <div class="thumb">
                                <img src="{{asset('frontview')}}/img/courses/f3.jpg" alt="Thumb">
                                <div class="live-view">
                                    <a href="{{asset('frontview')}}/img/courses/f3.jpg" class="item popup-link">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=vQqZIFCab9o">
                                        <i class="fa fa-video"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 info">
                            <h2>
                                <a href="#">Graphic and interactive design</a>
                            </h2>
                            <h4>featured courses</h4>
                            <p>
                                Both rest of know draw fond post as. It agreement defective to excellent. Feebly do engage of narrow. Extensive repulsive belonging depending if promotion be zealously as. Preference inquietude ask
                            </p>
                            <h3>Learning outcomes</h3>
                            <ul>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Over 37 lectures and 55.5 hours of content!</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Testing Training Included.</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Course content designed by considering current software testing</span> 
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i> 
                                    <span>Practical assignments at the end of every session.</span>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-theme effect btn-md" data-animation="animated slideInUp">Enroll Now</a>
                            <div class="bottom-info align-left">
                                <div class="item">
                                    <h4>Author</h4>
                                    <a href="#">
                                        <span>Devid Honey</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <h4>Students enrolled</h4>
                                    <span>5455</span>
                                </div>
                                <div class="item">
                                    <h4>Rating</h4>
                                    <span class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item --
                </div>
            </div>
        </div>
    </div>
    <!-- End Featured Courses -->

    <!-- Start Popular Courses 
    ============================================= --
    <div class="popular-courses circle bg-gray carousel-shadow default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Popular Courses</h2>
                        <p>
                            Discourse assurance estimable applauded to so. Him everything melancholy uncommonly but solicitude inhabiting projection off. Connection stimulated estimating excellence an to impression. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="popular-courses-items popular-courses-carousel owl-carousel owl-theme">
                        <!-- Single Item --
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{asset('frontview')}}/img/courses/1.jpg" alt="Thumb">
                                </a>
                                <div class="price">Price: Free</div>
                            </div>
                            <div class="info">
                                <div class="author-info">
                                    <div class="thumb">
                                        <a href="#"><img src="{{asset('frontview')}}/img/team/7.jpg" alt="Thumb"></a>
                                    </div>
                                    <div class="others">
                                        <a href="#">Munil Druva</a>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>4.5 (23,890)</span>
                                        </div>
                                    </div>
                                </div>
                                <h4><a href="#">data science and software</a></h4>
                                <p>
                                    Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment.
                                </p>
                                <div class="bottom-info">
                                    <ul>
                                        <li>
                                            <i class="fas fa-user"></i> 6,690
                                        </li>
                                        <li>
                                            <i class="fas fa-clock"></i> 16:00
                                        </li>
                                    </ul>
                                    <a href="#">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item --
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{asset('frontview')}}/img/courses/2.jpg" alt="Thumb">
                                </a>
                                <div class="price">Price: $12</div>
                            </div>
                            <div class="info">
                                <div class="author-info">
                                    <div class="thumb">
                                        <a href="#"><img src="{{asset('frontview')}}/img/team/8.jpg" alt="Thumb"></a>
                                    </div>
                                    <div class="others">
                                        <a href="#">Akua Paul</a>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>5 (867)</span>
                                        </div>
                                    </div>
                                </div>
                                <h4><a href="#">Stanford Engineering</a></h4>
                                <p>
                                    Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment.
                                </p>
                                <div class="bottom-info">
                                    <ul>
                                        <li>
                                            <i class="fas fa-user"></i> 6,690
                                        </li>
                                        <li>
                                            <i class="fas fa-clock"></i> 16:00
                                        </li>
                                    </ul>
                                    <a href="#">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item --
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{asset('frontview')}}/img/courses/3.jpg" alt="Thumb">
                                </a>
                                <div class="price">Price: Free</div>
                            </div>
                            <div class="info">
                                <div class="author-info">
                                    <div class="thumb">
                                        <a href="#"><img src="{{asset('frontview')}}/img/team/9.jpg" alt="Thumb"></a>
                                    </div>
                                    <div class="others">
                                        <a href="#">Jonathom Kiyam</a>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>4.9 (2,655)</span>
                                        </div>
                                    </div>
                                </div>
                                <h4><a href="#">Covers Big Data analysis</a></h4>
                                <p>
                                    Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment.
                                </p>
                                <div class="bottom-info">
                                    <ul>
                                        <li>
                                            <i class="fas fa-user"></i> 6,690
                                        </li>
                                        <li>
                                            <i class="fas fa-clock"></i> 16:00
                                        </li>
                                    </ul>
                                    <a href="#">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item --
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{asset('frontview')}}/img/courses/4.jpg" alt="Thumb">
                                </a>
                                <div class="price">Price: $46</div>
                            </div>
                            <div class="info">
                                <div class="author-info">
                                    <div class="thumb">
                                        <a href="#"><img src="{{asset('frontview')}}/img/team/2.jpg" alt="Thumb"></a>
                                    </div>
                                    <div class="others">
                                        <a href="#">Huma Park</a>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>4.4 (16,465)</span>
                                        </div>
                                    </div>
                                </div>
                                <h4><a href="#">professional web development</a></h4>
                                <p>
                                    Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment.
                                </p>
                                <div class="bottom-info">
                                    <ul>
                                        <li>
                                            <i class="fas fa-user"></i> 6,690
                                        </li>
                                        <li>
                                            <i class="fas fa-clock"></i> 16:00
                                        </li>
                                    </ul>
                                    <a href="#">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item --
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{asset('frontview')}}/img/courses/5.jpg" alt="Thumb">
                                </a>
                                <div class="price">Price: $124</div>
                            </div>
                            <div class="info">
                                <div class="author-info">
                                    <div class="thumb">
                                        <a href="#"><img src="{{asset('frontview')}}/img/team/3.jpg" alt="Thumb"></a>
                                    </div>
                                    <div class="others">
                                        <a href="#">Prokash Timer</a>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>5 (7,890)</span>
                                        </div>
                                    </div>
                                </div>
                                <h4><a href="#">Java Programming Masterclass</a></h4>
                                <p>
                                    Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment.
                                </p>
                                <div class="bottom-info">
                                    <ul>
                                        <li>
                                            <i class="fas fa-user"></i> 6,690
                                        </li>
                                        <li>
                                            <i class="fas fa-clock"></i> 16:00
                                        </li>
                                    </ul>
                                    <a href="#">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item --
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popular Courses -->



    <!-- Start Advisor Area
    ============================================= --
    <section id="advisor" class="advisor-area bg-gray carousel-shadow default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Experience Advisors</h2>
                        <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="advisor-items advisor-carousel-solid owl-carousel owl-theme text-center text-light">
                        <!-- Single Item --
                        <div class="advisor-item">
                            <div class="info-box">
                                <img src="{{asset('frontview')}}/img/advisor/1.jpg" alt="Thumb">  
                                <div class="info-title">
                                    <h4>Professon. Nuri Paul</h4>
                                    <span>Chemistry specialist</span>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item --
                        <div class="advisor-item">
                            <div class="info-box">
                                <img src="{{asset('frontview')}}/img/advisor/2.jpg" alt="Thumb">  
                                <div class="info-title">
                                    <h4>Monayem Pruda</h4>
                                    <span>Senior Developer</span>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item --
                        <div class="advisor-item">
                            <div class="info-box">
                                <img src="{{asset('frontview')}}/img/advisor/3.jpg" alt="Thumb">  
                                <div class="info-title">
                                    <h4>Dr. Bubly Minu</h4>
                                    <span>Science specialist</span>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <!-- Single Item -->
                        <!-- Single Item --
                        <div class="advisor-item">
                            <div class="info-box">
                                <img src="{{asset('frontview')}}/img/advisor/4.jpg" alt="Thumb">  
                                <div class="info-title">
                                    <h4>Professon. John Doe</h4>
                                    <span>Senior Writter</span>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>    
                        </div> 
                        <!-- Single Item -->
                        <!-- Single Item --
                        <div class="advisor-item">
                            <div class="info-box">
                                <img src="{{asset('frontview')}}/img/advisor/5.jpg" alt="Thumb">  
                                <div class="info-title">
                                    <h4>Professon. John Doe</h4>
                                    <span>Senior Writter</span>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <!-- Single Item --
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Advisor Area -->

    <!-- Start Fun Factor 
    ============================================= --
    <div class="fun-factor-area default-padding bottom-less text-center bg-fixed shadow dark-hard" style="background-image: url({{asset('frontview')}}/img/banner/2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="212" data-speed="5000"></span>
                            <span class="medium">National Awards</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-professor"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="128" data-speed="5000"></span>
                            <span class="medium">Best Teachers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-online"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="8970" data-speed="5000"></span>
                            <span class="medium">Students Enrolled</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-reading"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="640" data-speed="5000"></span>
                            <span class="medium">Cources</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fun Factor -->