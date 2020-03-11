<html>
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
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
      <div class="wrapper">
      <header class="main-header">
         <a href="#" class="logo" style="background: linear-gradient(to bottom, #ff0404 0%, #990505 90%);" >
         <span class="logo-mini"><b><img src="{{asset('image')}}/logo-wht-1.png" width="120%" height="80%;"></span>
         <span class="logo-lg"><b><img src="{{asset('image')}}/logo-wht.png" width="auto" height="100%" ></span>
         </a>
         <nav class="navbar navbar-static-top" style="background: linear-gradient(to bottom, #ff0404 0%, #990505 90%">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            </a>
            <br>
           
            <a href = "{{url('dashboards')}}" style="color:white;padding-top:100px" >Home</a>
             <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" >
              <span class="hidden-xs">*213*{{ session('keyword') }}*mobile number#</span>
            </a>
           
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
         </nav>
      </header>
      <aside class="main-sidebar">
         <!-- sidebar: style can be found in sidebar.less -->
         <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-th-large"></i>
                  <span style="color:#FDFEFE">Class and Section</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li>  
                        <a href="{{url('class_section')}}">
                        <i class="fa fa-plus-circle"></i>
                        <span >Add</span>
                        </a> 
                     </li>
                     <li><a href="{{url('view_class_section')}}"><i class="fa  fa-circle-o"></i><span>View</span></a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-child"></i>
                  <span style="color:#FDFEFE">Student</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li>  
                        <a href="{{url('student_list')}}">
                        <i class="fa fa-plus-circle"></i>
                        Add
                        </a> 
                     </li>
                     <li><a href="{{url('show_student')}}"><i class="fa fa-circle-o"></i>View</a></li>
                      <li><a href="{{url('view_student_information_interface')}}"><i class="fa fa-info-circle"></i>Information</a></li>
                      <li><a href="{{url('view_all_student_interface')}}"><i class="fa fa-users"></i>All Student</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-clone"></i>
                  <span style="color:#FDFEFE">Subject</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li>  
                        <a href="{{url('subject_add_interface')}}">
                        <i class="fa fa-plus-circle"></i>
                        Add
                        </a> 
                     </li>
                     <li><a href="{{url('view_subject_interface')}}"><i class="fa fa-circle-o"></i>View</a></li>
                  </ul>
               </li>

                <li class="treeview">
                  <a href="#">
                  <i class="fa fa-money"></i>
                  <span style="color:#FDFEFE">Fees</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li>  
                        <a href="{{url('add_fees_interface')}}">
                        <i class="fa fa-plus-circle"></i>
                        Add
                        </a> 
                     </li>
                     <li><a href="{{url('view_fees_interface')}}"><i class="fa fa-circle-o"></i>View</a></li>
                     
                      <li><a href="{{url('view_all_fees_interface')}}"><i class="fa fa-circle-o"></i>All Fees</a></li>
                  </ul>
               </li>




               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-users"></i>
                  <span style="color:#FDFEFE">Student Attendance</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="{{url('view_add_attendance_interface')}}"><i class="fa fa-plus-circle"></i>Add</a></li>
                     <li><a href="{{url('view_attendance_interface')}}"><i class="fa fa-circle-o"></i>View</a></li>
                  </ul>
               </li>


                <li class="treeview">
                  <a href="#">
                  <i class="fa fa-user"></i>
                  <span style="color:#FDFEFE">Teacher Attendance</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="{{url('add_teacher_attendance_interface')}}"><i class="fa fa-plus-circle"></i>Add</a></li>
                     <li><a href="{{url('teacher_attendance_check_interface')}}"><i class="fa fa-circle-o"></i>View</a></li>
                  </ul>
               </li>






              <li class="treeview">
                  <a href="#">
                  <i class="fa fa-newspaper-o"></i>
                  <span style="color:#FDFEFE">News</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="{{url('add_news_interface')}}"><i class="fa fa-plus-circle"></i>Add</a></li>
                     <li><a href="{{url('view_news_interface')}}"><i class="fa fa-circle-o"></i>View</a></li>
                  </ul>
               </li>





               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-list-ol"></i>
                  <span style="color:#FDFEFE">Result</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-plus-circle"></i>
                        <span>Add</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('add_class_test_marks_interface')}}"><i class="fa fa-circle-o"></i>Class Test</a></li>
                           <li><a href="{{url('add_term_exam_marks_interface')}}"><i class="fa fa-circle-o"></i>Term Exam</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-circle-o"></i>
                        <span>View</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('view_class_test_result_interface')}}"><i class="fa fa-circle-o"></i>Class Test Result</a></li>
                           <li><a href="{{url('view_term_exam_marks_interface')}}"><i class="fa fa-circle-o"></i>Term Exam Result</a></li>
                           <li><a href="{{url('view_individual_marks_interface')}}"><i class="fa fa-circle-o"></i>Individual Result</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
                


              <li class="treeview">
                  <a href="#">
                  <i class="fa fa-volume-up"></i>
                  <span style="color:#FDFEFE">Notice</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-plus-circle"></i>
                        <span>Add</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('add_notice_all_interface')}}"><i class="fa fa-circle-o"></i>For ALL</a></li>
                           <li><a href="{{url('add_notice_class_interface')}}"><i class="fa fa-circle-o"></i>For Class</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-circle-o"></i>
                        <span>View</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('view_notice_all_interface')}}"><i class="fa fa-circle-o"></i> For ALL </a></li>
                           <li><a href="{{url('view_notice_class_interface')}}"><i class="fa fa-circle-o"></i>For Class</a></li>
                          
                        </ul>
                     </li>
                  </ul>
               </li>




               
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-credit-card"></i>
                  <span style="color:#FDFEFE">Payment Information</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li>  
                        <a href="{{url('add_payment_interface')}}">
                        <i class="fa fa-plus-circle"></i>
                        Add
                        </a> 
                     </li>

                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-circle-o"></i>
                        <span>View</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('view_class_wise_payment_interface')}}"><i class="fa fa-circle-o"></i> For Class </a></li>
                           <li><a href="{{url('view_school_payment_interface')}}"><i class="fa fa-circle-o"></i>For School</a></li>
                          
                        </ul>
                     </li>



                     
                    
                  </ul>
               </li>
               
                <li class="treeview">
                  <a href="#">
                  <i class="fa fa-credit-card"></i>
                  <span style="color:#FDFEFE">Acounts Information</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li>  
                        <a href="{{url('add_account_interface')}}">
                        <i class="fa fa-plus-circle"></i>
                        Add Expense
                        </a> 
                     </li>
                      <li>  
                        <a href="{{url('add_income_interface')}}">
                        <i class="fa fa-plus-circle"></i>
                        Add Income
                        </a> 
                     </li>
                     
                     
                     
                      <li>  
                        <a href="{{url('view_account_interface')}}">
                        <i class="fa fa-plus-circle"></i>
                        View Expense
                        </a> 
                     </li>
                     
                     <li>  
                        <a href="{{url('view_income_interface')}}">
                        <i class="fa fa-plus-circle"></i>
                        View Income
                        </a> 
                     </li>
                     
                     
                     
                     
                     <li>  
                        <a href="{{url('view_profit_interface')}}">
                        <i class="fa fa-plus-circle"></i>
                        View Profite
                        </a> 
                     </li>

                    



                     
                    
                  </ul>
               </li>
               
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-user"></i>
                  <span style="color:#FDFEFE">Teacher</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="{{url('add_teacher_interface')}}"><i class="fa fa-plus-circle"></i>Add</a></li>
                     <li><a href="{{url('view_teacher_interface')}}"><i class="fa fa-circle-o"></i>View</a></li>
                  </ul>
               </li>
               
               
                <li class="treeview">
                  <a href="#">
                  <i class="fa fa-user"></i>
                  <span style="color:#FDFEFE">Accountant</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="{{url('add_accountant_interface')}}"><i class="fa fa-plus-circle"></i>Add</a></li>
                     <li><a href="{{url('view_accountant_interface')}}"><i class="fa fa-circle-o"></i>View</a></li>
                  </ul>
               </li>
               
               
               
               <li>
                  <a href="{{url('update_school_information_interface')}}">
                  <i class="fa fa-upload"></i>
                  <span style="color:#FDFEFE">Update School Information</span>
                  </a>
               </li>

               <!-- <li>-->
               <!--   <a href="{{url('change_password')}}">-->
               <!--   <i class="fa fa-pie-chart"></i>-->
               <!--   <span style="color:#FDFEFE">Change Password</span>-->
               <!--   </a>-->
               <!--</li>-->


                <li>
                  <a href="{{url('signout')}}">
                  <i class="fa fa-sign-out"></i>
                  <span style="color:#FDFEFE">Sign Out</span>
                  </a>
               </li>
            </ul>
         </section>
         <!-- /.sidebar -->
      </aside>