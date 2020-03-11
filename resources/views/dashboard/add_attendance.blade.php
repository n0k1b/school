

@include('dashboard.header')


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class = "row">
    <div class="col-md-12 ">

      <!-- general form elements -->

      <div class="box box-primary" >
        <div class="box-header with-border">
          <h3 class="box-title">Add Attendance</h3>

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
                  <option selected="selected">Enter Section</option>
                  

                </select>
              </div>


              <div class = "col-md-2">
                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">

                  <input class="form-control" type="text" id = "attendance_date" name="attendance_date" required>
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
          <div id="myDiv">

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Roll</th>

                    <th>Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                  </tr>
                </thead>
                <tbody id ="records_content">

                </tbody>

              </table>

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
<!-- ./wrapper -->

<!-- jQuery 3 -->

@include('dashboard.footer')
<!-- page script -->
<script>
    
  function present_check(id)
  {
      //id = student_table id;
    var class_name = $("#class_name").val();
    var section = $("#section").val();
    var attendance_date = $("#attendance_date").val();

    if($('#absent'+id).data('clicked') == true)
    {

      $('#absent'+id).html("<td align ='center' id = 'absent'"+id+" ><button type='button' class='btn btn-warning btn-circle' onClick= 'absent_check("+ id +")'><i class='glyphicon glyphicon-remove'></i></button></td>");

      $('#absent'+id).data('clicked', false);


    }

    $('#present'+id).html("present");

    $('#present'+id).data('clicked', true);
    
    var formData= new FormData();
    formData.append("id",id);
    formData.append("class_name",class_name);
    formData.append("section",section);
    formData.append("attendance_date",attendance_date);



    $.ajax({
      processData: false,
      contentType: false,
      url:"{{url('present_check')}}",
      type:'POST',
      data: formData,


    });

// $('#present').css('color', 'green');

}

function absent_check(id)
{

  var class_name = $("#class_name").val();
  var section = $("#section").val();
  var attendance_date = $("#attendance_date").val();

  if($('#present'+id).data('clicked') == true)
  {
    $('#present'+id).html("<td align ='center' id = 'present'"+id+" ><button type='button' class='btn btn-info btn-circle' onClick= 'present_check("+id+")'><i class='glyphicon glyphicon-ok'></i></button></td>");
    $('#present'+id).data('clicked', false);

  }


  $('#absent'+id).html("absent");


  $('#absent'+id).data('clicked', true);

  var formData= new FormData();
  formData.append("id",id);
  formData.append("class_name",class_name);
  formData.append("section",section);
  formData.append("attendance_date",attendance_date);


  $.ajax({
    processData: false,
    contentType: false,
    url:"{{url('absent_check')}}",
    type:'POST',
    data: formData,


  });

// $('#present').css('color', 'green');

}


$(function () {
 

 $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


  $('#submit').click(function(){

  var class_name = $("#class_name").val();
  var section = $("#section").val();
  var attendance_date = $("#attendance_date").val();
//alert(class_name);



    var formData= new FormData();
    formData.append("class_name",class_name);
  formData.append("section",section);
  formData.append("attendance_date",attendance_date);

    $.ajax({
      processData: false,
      contentType: false,
      url:"{{url('submit_attendance')}}",
      type:'POST',
      data: formData,
      success:function(data, status){

      alert("Attendance taken Successfully");
      $("#myDiv").hide();
     },

  });

  });

  $("#myDiv").hide();


 
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



  $("#show").click(function(){
    
    var class_name = $("#class_name").val();
    var attendance_date = $("#attendance_date").val();
    var section = $("#section").val();
    var formData= new FormData();
    formData.append('class',class_name);
    formData.append("attendance_date",attendance_date);
    formData.append('section',section);
    // formData.append('show_attendance',"show_attendance");
    

    $.ajax({
      processData: false,
      contentType: false,
      url:"{{url('add_attendance')}}",
      type:"POST",
      data:formData,
      success:function(data,status){
        var msg=$.trim(data);
        if(msg=="existing")
        {
        alert("Attendance already taken");
      }

      else{
        $("#myDiv").show();
        $('#records_content').html(data);
      }
      },

    });
  });
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
    'autoWidth' : false
  })
})
</script>
</body>
</html>