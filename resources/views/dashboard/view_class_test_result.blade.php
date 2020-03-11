@include('dashboard.header')

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
            <label> Obtaining Marks </label>
            <input type="text" name="update_marks" id="update_marks" placeholder="Obtaining Marks" class="form-control">
          </div>

      <!--  <div class="form-group">
          <label> Last Name </label>
          <input type="text" name="lastname" id="update_lastname" placeholder="Last Name" class="form-control">
        </div> -->

        





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
<div class = "row">
  <div class="col-md-12 ">

    <!-- general form elements -->

    <div class="box box-primary" >
      <div class="box-header with-border">
        <h3 class="box-title">View Student</h3>
        <br>
        <br>

        <div class ="row">
          <form method="post" action="">
            <div class = "col-md-2">

								<select class="form-control select2" style="width: 100%;" id="class_name" name= "class">
									<option selected="selected">Enter Class</option>
									@foreach($class_sections as $class)
                                       
                                        <option value="{{$class->class}}" name= "{{$class->class}}">{{$class->class}}</option>
									@endforeach
								</select>
							</div>

							<div class = "col-md-2">

								<select class="form-control select2" style="width: 100%;" id="section" name= "section">
									<option selected="selected">Enter Section</option>
									

								</select>
							</div>

              <div class = "col-md-2">

                <select class="form-control select2" style="width: 100%;" id="subject" name= "subject">
                  <option selected="selected">Select Class First</option>
                  

                </select>
              </div>


              <div class = "col-md-2">

                <select class="form-control select2" style="width: 100%;" id="class_test_name" name= "class_test_name">
                  <option selected="selected">Select Class First</option>
                  

                </select>
              </div>







 



            <div class ="col-md-2">
              <button type="button" class="btn btn-primary" onclick="fetch_data()">Apply</button>
            </div>

          </div>
        </div>


        <!-- /.box-header -->
        <!-- form start -->
        <div id="myDiv">

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  

                  <th>Roll</th>
                  <th>Name</th>
                  <th>Obtaining Marks</th>
                  <th>Full Marks</th>
                  <th></th>
                  <th></th>
                 
                </tr>
              </thead>
              <tbody id ="records_content">

              </tbody>

            </table>

          </div>



          <!-- /.box-body -->


        </form>


      </div>

    </div>
    <!-- /.box -->

    <!-- /.box -->

    <!-- Input addon -->

    <!-- /.box -->

  </div>
</div>

</div>


<!-- Control Sidebar -->

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

@include('dashboard.footer')


<script>
   function fetch_data()
   {
     var class_name = $("#class_name").val();
   
    var section = $("#section").val();
    var subject = $("#subject").val();
    var class_test_name = $("#class_test_name").val();
    var formData= new FormData();
    formData.append('class',class_name);
    formData.append('subject',subject);
    formData.append('class_test_name',class_test_name);
  
    formData.append('section',section);

    $.ajax({
      processData: false,
      contentType: false,
      type:"POST",
      url:"{{url('show_class_test_marks')}}",
      
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
      url:"{{url('show_class_test_marks_modal')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        

       var user = JSON.parse(data);
        $("#update_marks").val(user.obtaining_marks);
        
        

      

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
      url:"{{url('delete_class_test_marks')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        

        fetch_data();

      

      },

    });

       
  }
  }


  function UpdateUserDetails() {
    var update_marks = $("#update_marks").val();
    
    var hidden_user_id = $("#hidden_user_id").val();
   var formData= new FormData();
    formData.append('id',hidden_user_id);
    
    
    formData.append('update_marks',update_marks);
   

    $.ajax({
      processData: false,
      contentType: false,
       type:"POST",
      url:"{{url('update_class_test_marks')}}",
     
      data:formData,
      success:function(data,status){
        
     fetch_data();

        

      

      },

    });


$("#update_user_modal").modal("hide");

   
}


  
  

  $(function () {

  $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    $('#section').on('change',function(){
        var section = $(this).val();
        var class_name = $("#class_name").val();

 var formData= new FormData();
formData.append('section',section);
formData.append('class',class_name);



        if(section){
           

             

           $.ajax({
              processData: false,
  contentType: false,
                type:'POST',
                url:'{{url('getClassTest')}}',
               data: formData,
                success:function(data,status){
                     $('#class_test_name').html(data);
                   

                    
                }
            });



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

             $.ajax({
              processData: false,
  contentType: false,
                type:'POST',
                url:'{{url('getSubject')}}',
               data: formData,
                success:function(data,status){
                     $('#subject').html(data);
                   

                    
                }
            });

          



        }
    });


   $("#myDiv").hide();

   
   $('#datepicker').datepicker({
    autoclose: true,
    todayHighlight: true
  }).datepicker('update', new Date())

   $('#example2').DataTable()
   $('#example1').DataTable({
    'paging' : true,
    'lengthChange': false,
    'searching' : false,
    'ordering' : false,
    'info' : false,
    'autoWidth' : true
  })
 })
</script>