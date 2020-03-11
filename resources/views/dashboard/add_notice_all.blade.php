      @include('dashboard.header')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>

            Notice Board
            
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                 <div class="box-header">
                     
                     
                 

            <div class = "row">

              <div class = "col-md-6">
                   <label>Notice Title:</label>
                   <input type="text" class="form-control" id="notice_title"  name ="notice_title"  placeholder="Enter Notice title">

              </div>


            </div>

                <!-- tools box -->

                <!-- /. tools -->
              </div>
                   


              <!-- /.box-header -->
              <div class="box-body pad">
                <label>Notice Details:</label>
                  <textarea class="form-control" id="notice_field"  rows="15" cols="150"></textarea>
                  
                  <br>
                  <div class ="row">
                    

                    <div class ="col-md-12" >
                      <button type="button" onClick = send_notice()   class="btn btn-primary" style="float:right;">Send</button>
                    </div>


                  </div>
            
              </div>


            </div>
            <!-- /.box -->


          </div>
          <!-- /.col-->
        </div>

        <!-- ./row -->
      </section>


      <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
     

      <!-- Control Sidebar -->
    
      <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
         <div class="control-sidebar-bg"></div>
       </div>
       <!-- ./wrapper -->
       

       <!-- jQuery 3 -->
     @include("dashboard.footer")
       <script>
           function send_notice()
  {

   
     var notice = document.getElementById("notice_field").value.trim();

     var notice_title = $("#notice_title").val();
     
   
    

    
     
    
    var formData= new FormData();
    formData.append("notice",notice);
    formData.append("notice_title",notice_title);
    
   
   



    $.ajax({
      processData: false,
      contentType: false,
      url:"{{url('submit_notice_all')}}",
      type:'POST',
      data: formData,
      success:function(data, status){

     alert("Notice send successfully");
     location.reload();
  },



    });

// $('#present').css('color', 'green');

}
       </script>
       
       
       <script>
        $(function () {



 $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


 $('#class_name').on('change',function(){
        var class_name = $(this).val();

 var formData= new FormData();
formData.append('class',class_name);



        if(class_name){
            $.ajax({
              processData: false,
  contentType: false,
                type:'POST',
                url:'{{url('getSection')}}',
               data: formData,
                success:function(data,status){
                     $('#section').html(data);

                   // alert(data);


                    

                    
                }
            }); 
        }
    });
            
  
            
            
          // Replace the <textarea id="editor1"> with a CKEditor
          // instance, using default configuration.
          CKEDITOR.replace('editor1')
          //bootstrap WYSIHTML5 - text editor
          $('.textarea').wysihtml5()
        })
      </script>
      </body>
      </html>
