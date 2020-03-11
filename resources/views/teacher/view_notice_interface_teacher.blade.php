@include('teacher.header')

  <div class="content-wrapper">


    <div class="modal fade" id="update_user_modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="form-group">
            <label> Notice Title </label>
            <input type="text" id="update_title"  class="form-control">
          </div>

      <!--  <div class="form-group">
          <label> Last Name </label>
          <input type="text" name="lastname" id="update_lastname" placeholder="Last Name" class="form-control">
        </div> -->

       <div class="form-group">
                  <label>Textarea</label>
                  <textarea class="form-control" id="update_notice" rows="7" ></textarea>
         </div>
         





      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Update</button>
        <input type="hidden" id="hidden_user_id">
      </div>



    </div>
  </div>
</div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Notice
       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
        
         <div class="row">
                  <div class = "col-md-2">

                <select class="form-control select2" style="width: 100%;" id="class_name" name= "class">
                  <option selected="selected">Enter Class</option>
                  @foreach($class_sections as $class)
                                       
                                        <option value="{{$class->class}}" name= "{{$class->class}}">{{$class->class}}</option>
                  @endforeach
                </select>
              </div>


                 <div class = "col-md-2">

                <select class="form-control select2" style="width: 100%;" id="section" name= "class">
                  <option selected="selected">Enter Section</option>
                  

                </select>
              </div>

              <div class ="col-md-2">
              <button type="button" class="btn btn-primary" onclick="fetch_data()">Apply</button>
            </div>


            </div>
      <!-- row -->
     <br>
     <br>
    <div id ="myDiv">
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline" id= "records_content">
            <!-- timeline time label -->
            
            <!-- /.timeline-label -->
            <!-- timeline item -->

            
           

            
            <!-- END timeline item -->
            <!-- timeline item -->
           
          </ul>
        </div>
        <!-- /.col -->
      </div>
    </div>
      <!-- /.row -->

      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  


@include('teacher.footer')

<script type="text/javascript">
  
      $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    
    function fetch_data()
   {
     var class_name = $("#class_name").val();
   
    var section = $("#section").val();
    var formData= new FormData();
    formData.append('class',class_name);
    
  
    formData.append('section',section);

    $.ajax({
      processData: false,
      contentType: false,
      type:"POST",
      url:"{{url('show_notice_list_teacher')}}",
      
      data:formData,
      success:function(data,status){

          
        $("#myDiv").show();
        $('#records_content').html(data);

      },

    });
   }


 function GetUserDetails(id){
   $("#hidden_user_id").val(id);
    var formData= new FormData();
    formData.append('id',id);

     $.ajax({
      processData: false,
      contentType: false,
      url:"{{url('show_notice_modal')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        

       var notices = JSON.parse(data);
        $("#update_title").val(notices.notice_title);
        $("#update_notice").val(notices.notice);
       

        

      

      },

    });

    $("#update_user_modal").modal("show");


  }

  function delete_data(id)
  {
   var formData= new FormData();
  
    formData.append('id',id);


    var conf = confirm("Are you sure");
     if(conf == true) {
       $.ajax({
      processData: false,
      contentType: false,
      url:"{{url('delete_notice')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        

        fetch_data();

      

      },

    });

       
  }
  }


  function UpdateUserDetails() {
    var notice = $("#update_notice").val();
    var notice_title = $("#update_title").val();
    
    var hidden_user_id = $("#hidden_user_id").val();
   var formData= new FormData();
    formData.append('id',hidden_user_id);
    
    formData.append('notice',notice);
    formData.append('notice_title',notice_title);
   

    $.ajax({
      processData: false,
      contentType: false,
       type:"POST",
      url:"{{url('update_notice')}}",
     
      data:formData,
      success:function(data,status){
        
    fetch_data();

        

      

      },

    });


$("#update_user_modal").modal("hide");

   
}

 $(function () {

        $("#myDiv").hide();

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
                url:'{{url('getSectionTeacher')}}',
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