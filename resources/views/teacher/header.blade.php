<html>
   <head>
      <meta charset="utf-8">
      <title>School Panel</title>
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
      <div class="wrapper" style="background-size:70%;">
      <header class="main-header">
         <a href="#" class="logo" style="background: linear-gradient(to bottom, #ff0404 0%, #990505 90%)";>
        
         <span class="logo-lg"><b><img src="{{asset('image')}}/logo-wht.png" width="auto" height="100%"></span>
         </a>
         <nav class="navbar navbar-static-top" style="background: linear-gradient(to bottom, #ff0404 0%, #990505 90%)";>
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            </a>
            <h1  align="center" style="margin-top:20px;padding-right:60px; color:#fff; font-size: 25px; font-weight:800;">Teacher Panel</h1>
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
         <section class="sidebar" style="padding-top:50px;">
            <ul class="sidebar-menu" data-widget="tree">

               
               
                 <li class="treeview">
                  <a href="#">
                  <i class="fa fa-plus-circle"></i>
                  <span>Attendance In</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="{{url('view_add_attendance_interface_teacher')}}"><i class="fa fa-plus-circle"></i>Add</a></li>
                     <li><a href="{{url('view_attendance_interface_teacher')}}"><i class="fa fa-circle-o"></i>View</a></li>
                  </ul>
               </li>
               
               
                 <li class="treeview">
                  <a href="#">
                  <i class="fa  fa-minus-circle"></i>
                  <span>Attendance Out</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="{{url('view_add_attendance_interface_teacher_out')}}"><i class="fa fa-plus-circle"></i>Add</a></li>
                     <li><a href="{{url('view_attendance_interface_teacher_out')}}"><i class="fa fa-circle-o"></i>View</a></li>
                  </ul>
               </li>
               
               
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-volume-up"></i>
                  <span>Notice</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="{{url('add_notice_interface_teacher')}}"><i class="fa fa-plus-circle"></i>Add</a></li>
                     <li><a href="{{url('view_notice_interface_teacher')}}"><i class="fa fa-circle-o"></i>View</a></li>
                  </ul>
               </li>
               
                
               

                
               
               <li>
                  <a href="{{url('signout_teacher')}}">
                  <i class="fa fa-sign-out"></i>
                  <span>Sign Out</span>
                  </a>
               </li>
            </ul>
         </section>
         <!-- /.sidebar -->
      </aside>