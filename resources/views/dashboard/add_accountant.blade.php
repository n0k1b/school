@include('dashboard.header')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class = "row">
    <div class="col-md-12 ">

      <!-- general form elements -->

      <div class="box box-primary" >
        <div class="box-header with-border">
          <h3 class="box-title">Add Accountant</h3>
                  
          

       
          
          </div>


          <!-- /.box-header -->
          <!-- form start -->
        <div  id="myDiv">

            <div class="box-body">

              <table  class="table table-bordered table-striped" id="tb">
                <tr class="tr-header">
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                 
                  
                  <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th>
                  <tr>
                    <td><input type="text" name="name[]" class="form-control"></td>
                    <td><input type="text" name="email[]" class="form-control"></td>
                    <td><input type="text" name="password[]" class="form-control"></td>
                    
                
                  

                
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


  function fetchdata()

  {
   $("#myDiv").show();

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

       var name = [];            
        $('input[name^=name]').each(function(){
            name.push($(this).val());
        });
    
        var email = [];
          $('input[name^=email]').each(function(){
            email.push($(this).val());
        });
        
        var password = [];
          $('input[name^=password]').each(function(){
            password.push($(this).val());
        });
        
       



//alert(subject);
 // alert(name+email+password+subject+class_name+section);


var formData= new FormData();
formData.append("name",name);
formData.append('email',email);
formData.append('password',password);



          $.ajax({
  processData: false,
  contentType: false,
  url:"{{url('add_accountant')}}",
  type:'POST',
  data: formData,
  success:function(data, status){

    alert("Accountant Added Successfully");

    location.reload();

  },

});

    });

 

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