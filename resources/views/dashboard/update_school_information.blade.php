@include('dashboard.header')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update School Information
        
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-10 col-sm-offset-1">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url('update_school_information')}}" method="POST">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">School Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="school_name" id="inputEmail3" value="{{$school->school_name}}" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">School Address</label>

                  <div class="col-sm-6">
                     <textarea class="form-control" rows="3" name="school_address">{{$school->school_address}}</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Contact No</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="" name="school_contact_no" value="{{$school->school_contact_no}}" >
                  </div>
                </div>
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
         
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@include('dashboard.footer')