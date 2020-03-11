      @include('dashboard.header')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>

            Add News
            
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
             
                 
                    <div class = "row">

              <div class = "col-md-6">
                   <label>News Title:</label>
                   <input type="text" class="form-control" id="news_title"  name ="notice_title"  placeholder="Enter Notice title">

              </div>


            </div>


            
              <!-- /.box-header -->
            
                
                <div class="row">

                  <div class ="col-md-12">
                
                <label>News Details:</label>
                  <textarea  class="form-control" id="notice_field"  rows="10" cols="10" placeholder="Enter News Here"></textarea>
                  
                  <br>
                  
                  <div class="file-upload">
  

  <div class="image-upload-wrap">
    <input class="file-upload-input" id="upload"  type='file' onchange="readURL(this);" accept="image/*" multiple />
    <div class="drag-text">
      <h3>Drag and drop a file or select add Image</h3>
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" src="#" alt="your image" />
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
    </div>
  </div>
</div>
    <br>
                  <div class ="row">
                    

                    <div class ="col-md-12" style="text-align:center;" >
                      <button type="button" onClick = send_notice()   class="btn btn-primary" >Send</button>
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
     <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
       <script>
       
       function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});





           function send_notice()
  {

   
     var notice = document.getElementById("notice_field").value.trim();
    var news_title = $("#news_title").val();
 
     
   
    

    
     
    
    var formData= new FormData();
    formData.append("notice",notice);
    formData.append("news_title",news_title);
   formData.append('file',$('#upload')[0].files[0]);
    
   
   



    $.ajax({
      processData: false,
      contentType: false,
      url:"{{url('submit_news')}}",
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
