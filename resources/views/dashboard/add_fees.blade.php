@include('dashboard.header')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class = "row">
		<div class="col-md-12 ">

			<!-- general form elements -->

			<div class="box box-primary" >
				<div class="box-header with-border">
					<h3 class="box-title">Add Fees Of Your School</h3>
					<br>
					<br>
                           <div class = "col-md-2">

								<select class="form-control select2" style="width: 100%;" id="class_name" name= "class">
									<option selected="selected">Enter Class</option>
									@foreach($class_sections as $class)
                                       
                                        <option value="{{$class->class}}" name= "{{$class->class}}">{{$class->class}}</option>
									@endforeach
								</select>
							</div>

							<div class ="col-md-2">
								<button type="button" class="btn btn-primary" onclick="fetch_data()">Apply</button>
							</div>
					
					</div>


					<!-- /.box-header -->
					<!-- form start -->
					<div  id="myDiv">

						<div class="box-body">
                          <div class="row">
                            
                            <div class="col-md-4 col-lg-4">

							<table  class="table table-bordered table-striped" id="tb">
								<tr>
									<th>Fees Name</th>
									<th>Fees Amount</th>

									<th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th>
								</tr>	


									<tr>
										
										<td><input type="text" name="fees[]" class="form-control"></td>
										<td><input type="text" name="amount[]" class="form-control"></td>
										
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

                              </div>
							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="button" name="student_entry" id= "submit" class="btn btn-primary">Submit</button>
							</div>
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




	<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
	immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>




@include('dashboard.footer')


<script>

	
function fetch_data()
{
	$("#myDiv").show();
}
    

	

$(function () {
      
      $("#myDiv").hide();
	$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $('#submit').click(function(){

    	 var fees = [];            
        $('input[name^=fees]').each(function(){
            fees.push($(this).val());
        });

         var amount = [];            
        $('input[name^=amount]').each(function(){
            amount.push($(this).val());
        });
      

    var class_name = $("#class_name").val();




var formData= new FormData();
formData.append('fees',fees);
formData.append('amount',amount);
formData.append('class',class_name);


 


          $.ajax({
	processData: false,
	contentType: false,
	type:'POST',
	url:"{{url('submit_fees')}}",
	
	data: formData,
	
	success:function(data, status){

		alert("Fees Added Successfully");

	  location.reload();

	},

});

    });

	
	$("#show").click(function(){
        
        var class_name = $("#class_name").val();
        if(!class_name)
        {
        	alert("Please enter a class name");
        }

        else{
             $("#myDiv").show();
        }

		//
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