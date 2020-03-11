@include('admin.header')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Read Message
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              

             
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>{{$messages->message_title}}</h3>
              
                  <span class="mailbox-read-time pull-right">{{$messages->date}}</span></h5>
              </div>
              <!-- /.mailbox-read-info -->
             
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                  {{$messages->message_body}}

                
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 

@include('admin.footer')