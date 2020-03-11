@include('dashboard.header')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Change Password
        
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
            
              @if(count($errors)>0)

                      @foreach($errors->all() as $error)

                         <p class="alert alert-danger" >{{$error}}</p>
                      @endforeach
                    @endif

                    @if (Session::has('message'))
                            <div class="alert alert-danger">{{ Session::get('message') }}</div>
                            @endif
                            
                            @if (Session::has('success_message'))
                            <div class="alert alert-success">{{ Session::get('success_message') }}</div>
                            @endif
                            
                            
            <form class="form-horizontal" action="{{url('change_password_update')}}" method="POST">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Previous Password</label>

                  <div class="col-sm-6">
                    <input type="password" class="form-control" name = "previous_password"  >
                  </div>

                </div>

               

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-6">
                    <input type="password" class="form-control"  name="password" >
                  </div>

                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Re-type Password</label>

                  <div class="col-sm-6">
                    <input type="password" class="form-control" name="password_confirmation"  >
                  </div>
                </div>
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Change</button>
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