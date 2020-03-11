@include('dashboard.header')

<div class="content-wrapper">
  

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
                  <option selected="selected">Select Class</option>
                  

                </select>
              </div>

           

              <div class="col-md-2"> 
                              
                 <input type="text" class="form-control" id="roll_no"  name ="roll_no"  placeholder="Enter Roll No">

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
                  

                  
                  <th>Student Name</th>
                  <th>Total Present (Day)</th>
                  <th>Total Absent (Day)</th>
                  <th>Total Payment (BDT)</th>
                  <th>Due Payment (BDT)</th>
                 

                 

                  
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
    
    var roll_no = $("#roll_no").val();
    var formData= new FormData();
    formData.append('class',class_name);

    
    
    formData.append('roll_no',roll_no);
  
    formData.append('section',section);

    $.ajax({
      processData: false,
      contentType: false,
      type:"POST",
      url:"{{url('show_individual_information')}}",
      
      data:formData,
      success:function(data,status){

          
        $("#myDiv").show();
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