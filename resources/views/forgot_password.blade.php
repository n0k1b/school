<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from validthemes.com/themeforest/examin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 06:32:44 GMT -->
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
                    <a href="#">Apply Now</a>
                </div>-->
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

    <!-- Start Login 
    ============================================= -->
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @if(count($errors)>0)

                      @foreach($errors->all() as $error)

                         <p class="alert alert-danger" >{{$error}}</p>
                      @endforeach
                    @endif

                    @if (Session::has('message'))
                            <div class="alert alert-danger">{{ Session::get('message') }}</div>
                            @endif
                      
                    <form action="{{url('school_forgot_password')}}" id="login-form" class="white-popup-block" method="post">
                        {{csrf_field()}}
                        <div class="col-md-4 login-social">
                            
                        </div>
                        <div class="col-md-8 login-custom">
                            <h4>Enter your registered Email!</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email*" type="email" name="school_email">
                                    </div>
                                </div>
                            </div>
                            
                           
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit">
                                        Enter
                                    </button>
                                </div>
                            </div>
                            <p class="link-bottom">Not a member yet? <a href="{{url('registration')}}">Register now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Area -->

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

<!-- Mirrored from validthemes.com/themeforest/examin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2019 06:32:44 GMT -->
</html>