@include('dashboard.header')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class = "row">
		<div class="col-md-12 ">

			<!-- general form elements -->

			<div class="box box-primary" >
				<div class="box-header with-border">
					<h3 class="box-title">Add Marks</h3>
                  
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

								<select class="form-control select2" style="width: 100%;" id="section" name= "class">
									<option selected="selected">Select Class First</option>
									

								</select>
							</div>


							<div class = "col-md-2">

								<select class="form-control select2" style="width: 100%;" id="subject" name= "subject">
									<option selected="selected">Select Class First</option>
									

								</select>
							</div>
 


							 <div class="col-md-2"> 
                              
                               <select class="form-control select2" style="width: 100%;" id ="exam_type" name="exam_type">
                                <option selected="selected">Which Term?</option>
                             	<option>First Term</option>
                             	<option>Second Term</option>
                             	<option>Final Term</option>
                             	
                             </select>

							 </div>


							<div class = "col-md-2">
                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">

                  <input class="form-control" type="text" id = "class_test_date" name="class_test_date" required>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" style="color:#097FB2"></i></span>
                </div>

              </div>

              <div class = "col-md-2">
                  <input type="text" class="form-control" id="full_marks"  name ="full_marks"  placeholder="Enter Full Marks">
              </div>



						</div>


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
                  <th>Roll No</th>

                  <th>Name</th>
                  <th>Obtaining Marks</th>

                 
                 
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


	function fetchdata()

	{
   var class_name = $("#class_name").val();
   var section = $("#section").val();

  var formData= new FormData();
formData.append("section",section);
formData.append("class",class_name);

 $.ajax({
	processData: false,
	contentType: false,
	url:"{{url('getStudent')}}",
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



    $('#submit').click(function(){

    	 var rollno = [];            
        $('input[name^=rollno]').each(function(){
            rollno.push($(this).val());
        });
    
        var marks = [];
          $('input[name^=marks]').each(function(){
            marks.push($(this).val());
        });

var class_name = $("#class_name").val();
var section = $("#section").val();
var subject = $("#subject").val();
var class_test_name = $("#exam_type").val();
var class_test_date = $("#class_test_date").val();
var full_marks = $("#full_marks").val();



var formData= new FormData();
formData.append("rollno",rollno);
formData.append('marks',marks);
formData.append('class',class_name);
formData.append('section',section);
formData.append('subject',subject);

formData.append('class_test_name',class_test_name);
formData.append('class_test_date',class_test_date);
formData.append('full_marks',full_marks);






          $.ajax({
	processData: false,
	contentType: false,
	url:"{{url('save_class_test_marks')}}",
	type:'POST',
	data: formData,
	success:function(data, status){

		alert("Marks Added Successfully");

	  location.reload();

	},

});

    });

	$("#myDiv").hide();

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