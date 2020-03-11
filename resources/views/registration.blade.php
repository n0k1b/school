<!DOCTYPE html>
<html lang="en">



<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <!-- ========== Page Title ========== -->
    <title>School Guardian Communication</title>

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
    
    <!-- End Header Top -->

     <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky bootsnav">

        

        </nav>
      
    </header>
    
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    @if(count($errors)>0)

                      @foreach($errors->all() as $error)

                         <p class="alert alert-danger" >{{$error}}</p>
                      @endforeach
                      
                    @endif
                    <form action="{{url('school_registration')}}" id="register-form" class="white-popup-block" method="post" >
                        {{csrf_field()}}
                        <div class="col-md-4 login-social" style="padding-top:25%">

                            <img src="{{asset('image')}}/logo.png">
                            
                        </div>
                        <div class="col-md-8 login-custom">
                            <h4>Register a new account</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email*" value ="{{old('school_email')}}" type="email" name="school_email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Institution Name*" type="text" value ="{{old('school_name')}}" name="school_name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Address*" type="text" value ="{{old('school_address')}}" name="school_address" >
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                             <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="District*" type="text" name="school_district" value ="{{old('school_district')}}">
                                    </div>
                                </div>
                            </div>  
                            
                             <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Thana*" type="text" name="school_thana" value ="{{old('school_thana')}}">
                                    </div>
                                </div>
                            </div>  
                            
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Post Code*" type="text" name="school_post_code" value ="{{old('school_post_code')}}">
                                    </div>
                                </div>
                            </div>  
                             <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Contact No*" type="text" value ="{{old('school_contact_no')}}" name="school_contact_no" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password*" type="Password" name="school_password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Repeat Password*" type="Password" name="school_password_confirmation">
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
                            <p class="link-bottom">Are you a member? <a href="{{url('login')}}">Login now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Area -->

    <!-- Start Footer 
    ============================================= -->

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

</html>