@include('admin.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mailbox
      
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

             
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
              
                <!-- /.btn-group -->
                
                
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>

                  	 @foreach($messages as $message)
                  <tr>
                    <td></td>
                    <td></td>
                    <td class="mailbox-name"><a href="{{url('read_admin_message',$message->id)}}">{{$message->name}}</a></td>
                    <td class="mailbox-subject"><b>{{$message->message_title}}</b>  
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{$message->date}}</td>
                  </tr>
                  @endforeach
                 
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            
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