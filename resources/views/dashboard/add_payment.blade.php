@include('dashboard.header')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class = "row">
		<div class="col-md-12 ">

			<!-- general form elements -->

			<div class="box box-primary" >
				<div class="box-header with-border">
					<h3 class="box-title">Add Payment</h3>
                  
					<div class ="row">
						<form method="post" action="">

                  <div class = "col-md-2">
                  <input type="text" class="form-control" id="roll"  name ="roll"  placeholder="Enter Roll Number">
              </div>
                              

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
									<option selected="selected">Select Class First</option>
									

								</select>
							</div>


							


							 <div class="col-md-2"> 
                              
                             <select class="form-control select2" style="width: 100%;" id ="month" name="month">
                                <option selected="selected">Month</option>
                             	<option>January</option>
                             	<option>February</option>
                             	<option>March</option>
                             	<option>April</option>
                             	<option>May</option>
                             	<option>June</option>
                             	<option>July</option>
                             	<option>August</option>
                             	<option>September</option>
                             	<option>October</option>
                             	<option>November</option>
                             	<option>December</option>
                             	
                             </select>

							 </div>



              



						</div>

                      <br>
						<div class="row">
                           <div class ="col-md-1">
								<button type="button" class="btn btn-primary" onclick = "fetchdata()" >Apply</button>
							</div>
						</div>
					</div>


					<!-- /.box-header -->
					<!-- form start -->
					<div  id="myDiv">

						<div class="box-body">

              <div class="row">

              	<div class="col-md-12">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Fees Name</th>

                  <th>Payable Amount</th>
                  
                
                 
                 
                </tr>
              </thead>
              <tbody id ="records_content">

              </tbody>

            </table>

        </div>

        </div>

          </div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="button" name="student_entry" onclick="show_total()" class="btn btn-primary">Show Total</button>
							</div>
					
					</div>


					<div  id="myDiv2">

						<div class="box-body">

              <div class="row">

              	<div class="col-md-12">

            <table id="example1" class="table table-bordered">
             
              <tbody id ="records_content2">
                  
              </tbody>

            </table>

        </div>

        </div>

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

   function show_total()

   {

var class_name = $("#class_name").val();
var section = $("#section").val();
var roll = $("#roll").val();
var month = $("#month").val();
    var paid_amount = [];
          $('input[name^=paid_amount]').each(function(){
            paid_amount.push($(this).val());
          

        });
         
         var fees_id = [];            
        $('input[name^=fees_name]').each(function(){
            fees_id.push($(this).val());
        });


 var formData= new FormData();
formData.append("roll",roll);
formData.append('class',class_name);
formData.append('section',section);
formData.append('month',month);
formData.append('paid_amount',paid_amount.filter(Number));
formData.append('fees_id',fees_id.filter(Number));

$.ajax({
	processData: false,
	contentType: false,
	url:"{{url('show_total_form')}}",
	type:'POST',
	data: formData,
	success:function(data, status){
      $('#myDiv2').show();
      $('#records_content2').html(data);
	
		
	},

});


   }
	function fetchdata()

	{

 
var class_name = $("#class_name").val();
var section = $("#section").val();
var roll = $("#roll").val();



  var formData= new FormData();
  formData.append("roll",roll);

formData.append('class_name',class_name);
formData.append('section',section);



 $.ajax({
	processData: false,
	contentType: false,
	url:"{{url('get_payment_form')}}",
	type:'POST',
	data: formData,
	success:function(data, status){
      $('#myDiv').show();
      $('#records_content').html(data);
	
		
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
                   

                    
                }
            }); 


            
        }
    });



    $('#submit').click(function(){

    	//var total_amount = 0;
    
        var paid_amount = [];
          $('input[name^=paid_amount]').each(function(){
            paid_amount.push($(this).val());
          

        });
         
         var fees_id = [];            
        $('input[name^=fees_name]').each(function(){
            fees_id.push($(this).val());
        });
      

      //alert(fees_name);
        
var total_amount = $("#total_amount").val();
var paid = $("#paid_amount").val();
var class_name = $("#class_name").val();
var section = $("#section").val();
var roll = $("#roll").val();
var month = $("#month").val();



// var subject = $("#subject").val();
// var exam_type = $("#exam_type").val();

// var full_marks = $("#full_marks").val();



var formData= new FormData();
formData.append("roll",roll);

formData.append('class',class_name);
formData.append('section',section);
formData.append('month',month);
formData.append('total_amount',total_amount);
formData.append('paid',paid);

formData.append('paid_amount',paid_amount.filter(Number));

formData.append('fees_id',fees_id.filter(Number));






          $.ajax({
	processData: false,
	contentType: false,
	url:"{{url('save_payment_info')}}",
	type:'POST',
	data: formData,
	success:function(data, status){

		alert("Payment added successfully");

	  location.reload();

	},

});

    });

	$("#myDiv").hide();

	$("#myDiv2").hide();

	$('#datepicker').datepicker({
		autoclose: true,
		todayHighlight: true
	}).datepicker('update', new Date())



	$('#example2').DataTable()
	$('#example1').DataTable({
		'paging' : false,
		'lengthChange': false,
		'searching' : false,
		'ordering' : false,
		'info' : false,
		'autoWidth' : true
	})
})
</script>