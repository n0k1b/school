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
          <label> Class </label>
          <input type="text" name="email" id="update_class" placeholder="Class" class="form-control">
        </div>

         <div class="form-group">
          <label> Section </label>
          <input type="text" name="section" id="update_section" placeholder="Section" class="form-control">
        </div>

        <div class="form-group">
          <label> Roll No. </label>
          <input type="text" name="mobile" id="update_roll" placeholder="Roll No." class="form-control">
        </div>

        <div class="form-group">
          <label> Mobile Number </label>
          <input type="text" name="mobile" id="update_mobile" placeholder="Mobile Number." class="form-control">
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
        <h3 class="box-title">View Student</h3>
        <p style="float:right;margin-right:10px">Total Student: {{$total}}</p>
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

                  <th>Class</th>
                  <th>Section</th>

                  <th>Roll</th>
                  <th>Mobile Number</th>
                  
                 
                </tr>
              </thead>
              <tbody id ="records_content">
                     @foreach($students as $student)
                     <tr>
                     <td>{{$student->name}}</td>
                     <td>{{$student->class}}</td>
                     <td>{{$student->section}}</td>
                     <td>{{$student->roll_no}}</td>
                     <td>{{$student->contact_no}}</td>
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
      url:"{{url('show_student_table')}}",
      
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
      url:"{{url('show_update_modal')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        

       var user = JSON.parse(data);
        $("#update_name").val(user.name);
        $("#update_class").val(user.class);
        $("#update_roll").val(user.roll_no);
        $("#update_mobile").val(user.contact_no);
         $("#update_section").val(user.section);

        

      

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
      url:"{{url('delete_student_data')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        

        fetch_data();

      

      },

    });

       
  }
  }


  function UpdateUserDetails() {
    var name = $("#update_name").val();
    var class_name = $("#update_class").val();
    var roll = $("#update_roll").val();
    var mobile_number = $("#update_mobile").val();
      var section = $("#update_section").val();
    var hidden_user_id = $("#hidden_user_id").val();
   var formData= new FormData();
    formData.append('id',hidden_user_id);
    
    
    formData.append('class',class_name);
    formData.append('roll_no',roll);
    formData.append('contact_no',mobile_number);
    formData.append('name',name);
      formData.append('section',section);

    $.ajax({
      processData: false,
      contentType: false,
       type:"POST",
      url:"{{url('update_student_data')}}",
     
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
    'ordering' : false,
    'info' : false,
    'autoWidth' : true
  })
 })
</script>