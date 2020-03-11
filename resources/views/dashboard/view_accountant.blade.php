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
            <label> Name </label>
            <input type="text" name="firstname" id="update_name" placeholder="Name" class="form-control">
          </div>

      <!--  <div class="form-group">
          <label> Last Name </label>
          <input type="text" name="lastname" id="update_lastname" placeholder="Last Name" class="form-control">
        </div> -->

        

      
        
        

        <div class="form-group">
          <label> Email </label>
          <input type="text"  id="update_email" placeholder="Email" class="form-control">
        </div>

        <div class="form-group">
          <label> Password </label>
          <input type="text" name="mobile" id="update_password" placeholder="Password" class="form-control">
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
<div class = "row">
  <div class="col-md-12 ">

    <!-- general form elements -->

    <div class="box box-primary" >
      <div class="box-header with-border">
        <h3 class="box-title">Accountant</h3>
        <br>
        <br>

       
        </div>


        <!-- /.box-header -->
        <!-- form start -->
        <div id="myDiv">

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>

                  <th>Email</th>
                  <th>Password</th>
                  
                 
                  <th></th>
                  <th></th>
                  
                 
                </tr>
              </thead>
              <tbody id ="records_content">
                     @foreach($accountants as $accountant)
                     <tr>
                     <td>{{$accountant->name}}</td>
                     <td>{{$accountant->email}}</td>
                     <td>{{$accountant->password}}</td>
                    
                     <td>
                    <button onclick="GetUserDetails({{$accountant->id}})" class="btn btn-success ">Edit</button>
                </td>
               <td>
                    <button onclick="delete_data({{$accountant->id}})" class="btn btn-danger ">Delete</button>
                </td>
                     
                     </tr>
                     
                     @endforeach
                    
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
    var formData= new FormData();
    formData.append('class',class_name);
    
  
    formData.append('section',section);

    $.ajax({
      processData: false,
      contentType: false,
      type:"POST",
      url:"{{url('show_teacher_table')}}",
      
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
      url:"{{url('show_update_modal_accountant')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        

      var user = JSON.parse(data);
       
        $("#update_name").val(user.name);
       
          $("#update_email").val(user.email);
            $("#update_password").val(user.password);

        

      

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
      url:"{{url('delete_accountant_data')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        

        location.reload();

      

      },

    });

       
  }
  }


  function UpdateUserDetails() {
    var name = $("#update_name").val();

      var email = $("#update_email").val();
      var password = $("#update_password").val();
    var hidden_user_id = $("#hidden_user_id").val();
   var formData= new FormData();
    formData.append('id',hidden_user_id);
    
    
   
    formData.append('name',name);
      formData.append('email',email);
      formData.append('password',password);
      
      

    $.ajax({
      processData: false,
      contentType: false,
       type:"POST",
      url:"{{url('update_accountant_data')}}",
     
      data:formData,
      success:function(data,status){
        
     location.reload();

        

      

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


  

   
   $('#datepicker').datepicker({
    autoclose: true,
    todayHighlight: true
  }).datepicker('update', new Date())

   $('#example2').DataTable()
   $('#example1').DataTable({
    'paging' : true,
    'lengthChange': true,
    'searching' : true,
    'ordering' : true,
    'info' : false,
    'autoWidth' : true
  })
 })
</script>