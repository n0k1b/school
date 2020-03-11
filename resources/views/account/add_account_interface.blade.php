@include('account.header')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class = "row">
		<div class="col-md-12 ">

			<!-- general form elements -->

			<div class="box box-primary" >
				<div class="box-header with-border">
					<h3 class="box-title">Add Expense Information</h3>
				
                  
					<div class ="row">
						
							<br>

							
                     <div class = "col-md-2">
                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">

                  <input class="form-control" type="text" id = "expense_date" name="expense_date" required>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" style="color:#097FB2"></i></span>
                </div>

              </div>
							

							

							
							<div class ="col-md-2">
								<button type="button" class="btn btn-primary" id = "show">Apply</button>
							</div>





						</div>
					</div>


					<!-- /.box-header -->
					<!-- form start -->
					<div  id="myDiv">

						<div class="box-body">

							<table  class="table table-bordered table-striped" id="tb">
								<tr class="tr-header">
									<th>Expense Name</th>

									<th>Expense Amount</th>
									
								    <th>Comment</th>
									
									<th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th>
									<tr>
										
										<td><input type="text" name="expense_name[]" class="form-control"></td>
										
										<td><input type="text" name="expense_amount[]" class="form-control"></td>
										
									  <td><input type="text" name="comment[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
								</table>
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
								<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
								<script>
									$(function(){
										$('#addMore').on('click', function() {
											var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
											data.find("input").val('');
										});
										$(document).on('click', '.remove', function() {
											var trIndex = $(this).closest("tr").index();
											if(trIndex>1) {
												$(this).closest("tr").remove();
											} else {
												alert("Sorry!! Can't remove first row!");
											}
										});
									});      
								</script>


							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="button" name="student_entry" id= "submit" class="btn btn-primary">Submit</button>
							</div>
						
					</div>

				</div>
				<!-- /.box -->


				<!-- /.box -->

				<!-- Input addon -->

				<!-- /.box -->

			</div>
		</div>

	</div>




	<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
	immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>




@include('dashboard.footer')


<script>

	function addRecord(){





		var name = $("#name").val();
		var class_name = $("#class").val();
		var section = $("#section").val();
		var roll = $("#roll").val();
		var mobile = $("#mobile").val();
//var pimage = $("#file").prop("files")[0];


var formData= new FormData();
formData.append("name",name);
formData.append("class",class_name);
formData.append("section", section);
formData.append("roll", roll);
formData.append("mobile",mobile);

$.ajax({
	processData: false,
	contentType: false,
	url:"backend/add_mark.php",
	type:'POST',
	data: formData,
	success:function(data, status){

		alert("Student Record Added Successfully"),
		readRecords();
	},

});

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



    $('#submit').click(function(){

    	 var expense_name = [];            
        $('input[name^=expense_name]').each(function(){
            expense_name.push($(this).val());
        });
      var expense_amount = [];
         $('input[name^=expense_amount]').each(function(){
            expense_amount.push($(this).val());
        });

        var comment = [];
          $('input[name^=comment]').each(function(){
            comment.push($(this).val());
        });

var expense_date = $("#expense_date").val();



var formData= new FormData();
formData.append("expense_name",expense_name);
formData.append('expense_amount',expense_amount);
formData.append('comment',comment);
formData.append('expense_date',expense_date);







          $.ajax({
	processData: false,
	contentType: false,
	url:"{{url('save_account_information')}}",
	type:'POST',
	data: formData,
	success:function(data, status){

		alert("Account Information Added Successfully");

	  location.reload();

	},

});

    });

	$("#myDiv").hide();
	$("#show").click(function(){
		$("#myDiv").show();
	});
	$('#datepicker').datepicker({
		autoclose: true,
		todayHighlight: true
	}).datepicker('update', new Date())

	$('#example1').DataTable()
	$('#example2').DataTable({
		'paging' : true,
		'lengthChange': false,
		'searching' : false,
		'ordering' : true,
		'info' : true,
		'autoWidth' : false
	})
})
</script>