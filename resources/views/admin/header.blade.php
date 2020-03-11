<html>
   <head>
      <meta charset="utf-8">
      <title>Admin Panel</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
      </link>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/Ionicons/css/ionicons.min.css">
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/select2/dist/css/select2.min.css">
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <!-- Ionicons -->
      <!-- daterange picker -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
      <!-- bootstrap datepicker -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- iCheck for checkboxes and radio inputs -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/plugins/iCheck/all.css">
      <!-- Bootstrap Color Picker -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
      <!-- Bootstrap time Picker -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/plugins/timepicker/bootstrap-timepicker.min.css">
      <link rel="stylesheet" href="{{asset('dashboard')}}/css/custom.css">
      <!-- Select2 -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/bower_components/select2/dist/css/select2.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="{{asset('dashboard')}}/dist/css/skins/_all-skins.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    
      <link rel="stylesheet" href="{{asset('dashboard')}}/dist/css/skins/_all-skins.min.css">
      
      <style>
         .example-modal .modal {
         position: relative;
         top: auto;
         bottom: auto;
         right: auto;
         left: auto;
         display: block;
         z-index: 1;
         }
         .example-modal .modal {
         background: transparent !important;
         }
      </style>
      <style type="text/css">
         #datepicker{
         width: 180px; margin: 0 20px 20px 20px;
         position: relative;
         }
         #datepicker > span:hover{
         cursor: pointer;
         }
      </style>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Google Font -->
      <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
      <header class="main-header">
         <a href="#" class="logo">
         <span class="logo-mini"><b></span>
         <span class="logo-lg"><b></span>
         </a>
         <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                  <!-- Notifications: style can be found in dropdown.less -->
                  <!-- User Account: style can be found in dropdown.less -->
                  <!-- Control Sidebar Toggle Button -->
               </ul>
            </div>
         </nav>
      </header>
      <aside class="main-sidebar">
         <!-- sidebar: style can be found in sidebar.less -->
         <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">

               <li>
                  <a href="{{url('school_request')}}">
                  <i class="fa fa-pie-chart"></i>
                  <span>School Request</span>
                  </a>
               </li>

                <li>
                  <a href="{{url('show_school')}}">
                  <i class="fa fa-pie-chart"></i>
                  <span>School List</span>
                  </a>
               </li>
               
                <li>
                  <a href="{{url('view_all_student_interface_admin')}}">
                  <i class="fa fa-pie-chart"></i>
                  <span>Student List</span>
                  </a>
               </li>

                <li>
                  <a href="{{url('view_message')}}">
                  <i class="fa fa-pie-chart"></i>
                  <span>Message</span>
                  </a>
               </li>
               
               <li>
                  <a href="{{url('signout_admin')}}">
                  <i class="fa fa-pie-chart"></i>
                  <span>Sign Out</span>
                  </a>
               </li>
            </ul>
         </section>
         <!-- /.sidebar -->
      </aside>