@include('account.header')

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
            <label> Income Name </label>
            <input type="text" name="firstname" id="update_expense_name" placeholder="Expense Name" class="form-control">
          </div>

      <!--  <div class="form-group">
          <label> Last Name </label>
          <input type="text" name="lastname" id="update_lastname" placeholder="Last Name" class="form-control">
        </div> -->

        <div class="form-group">
          <label> Income Amount </label>
          <input type="text" name="email" id="update_expense_amount" placeholder="Expense Amount" class="form-control">
        </div>

         <div class="form-group">
          <label> Comment </label>
          <input type="text" name="section" id="update_comment" placeholder="Comment" class="form-control">
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
        <h3 class="box-title">View Profit Information</h3>
        <br>
        <br>

        <div class ="row">
          <form method="post" action="">
            
							  <div class = "col-md-2">
							         <lable>Start Date</lable>
                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">

                  <input class="form-control" type="text" id = "start_date" name="expense_date" required>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" style="color:#097FB2"></i></span>
                </div>

              </div>
						
						
						  <div class = "col-md-2">
						      <lable>End Date</lable>
                <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
        
                  <input class="form-control" type="text" id = "end_date" name="expense_date" required>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" style="color:#097FB2"></i></span>
                </div>

              </div>
						



            <div class ="col-md-2">
                <br>
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
                  <th>Total Income</th>

                  <th>Total Expense</th>

                  <th>Profit</th>
                 
                
                 
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
     var start_date = $("#start_date").val();
   
    var end_date = $("#end_date").val();
    var formData= new FormData();
    formData.append('start_date',start_date);
    
  
    formData.append('end_date',end_date);

    $.ajax({
      processData: false,
      contentType: false,
      type:"POST",
      url:"{{url('show_profit_table')}}",
      
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
      url:"{{url('show_income_update_modal')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        

       var user = JSON.parse(data);
        $("#update_expense_name").val(user.income_name);
        $("#update_expense_amount").val(user.income_amount);
        $("#update_comment").val(user.comment);
       

        

      

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
      url:"{{url('delete_income_information')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        

        fetch_data();

      

      },

    });

       
  }
  }


  function UpdateUserDetails() {
    var expense_name = $("#update_expense_name").val();
    var expense_amount = $("#update_expense_amount").val();
    var comment = $("#update_comment").val();
     var hidden_user_id = $("#hidden_user_id").val();
   
   var formData= new FormData();
    formData.append('id',hidden_user_id);
    
    
    formData.append('expense_name',expense_name);
    formData.append('expense_amount',expense_amount);
    formData.append('comment',comment);
    

    $.ajax({
      processData: false,
      contentType: false,
       type:"POST",
      url:"{{url('update_income_information')}}",
     
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


   $("#myDiv").hide();

   
   $('#datepicker').datepicker({
    autoclose: true,
    todayHighlight: true
  }).datepicker('update', new Date())
  
  
   $('#datepicker2').datepicker({
    autoclose: true,
    todayHighlight: true
  }).datepicker('update', new Date())

   $('#example2').DataTable()
   $('#example1').DataTable({
    'paging':false,
    'lengthChange': false,
    'searching' : false,
    'ordering' : false,
    'info' : false,
    'autoWidth' : true
  })
 })
</script>