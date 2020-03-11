@include("teacher.header")


  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-size:70%">
    
     
     <section class= "content">
         
          <div class="row" style="padding-top:50px;">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Attendance</h4>

              <p> </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('view_add_attendance_interface_teacher')}}" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Notice<sup style="font-size: 20px"></sup></h4>

              <p> </p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('add_notice_interface_teacher')}}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      
        <!-- ./col -->
        
        <!-- ./col -->
      </div>
         
     </section>
    
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  

<!-- ./wrapper -->

<!-- jQuery 3 -->
@include('admin.footer')
