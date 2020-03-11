<?php

  include("connection.php");
  
// $contact_no ="+8801679636311"; 
//  $month = "January";

  
     $contact_no = $_POST['mobile'];

      $month =$_POST['month'];

   $updated_contact_no = "";
   
   for($i=3;$i<=13;$i++)
   
   {
       $updated_contact_no.=$contact_no[$i];
   }
   
  $sql = "select * from student_lists where contact_no = '$updated_contact_no'";
  $res = mysqli_query($conn,$sql);

  
   $row = mysqli_fetch_array($res);
   
  $class = $row['class'];
 
  $roll = $row['roll_no'];
  $section = $row['section'];
  $school_id = $row['school_id'];
  
  $sql2 = "Select * from payment_records where school_id=$school_id and class='$class' and section = '$section' and payment_month ='$month' and roll='$roll' ";
  $res2 = mysqli_query($conn,$sql2);
  $response = array();
  //file_put_contents('test.txt',mysqli_num_rows($res2));
  
  while($row2 = mysqli_fetch_array($res2))
  {
      if($row2['total_amount']==$row2['paid_amount'])
      {
          $payment_status = 'paid';
      }
      else
      {
          $payment_status = 'unpaid';
      }
      
      $due_amount = $row2['total_amount']-$row2['paid_amount'];
      
     array_push($response,array('total_amount'=>$row2['total_amount'],'paid_amount'=>$row2['paid_amount'],'payment_date'=>$row2['date'],'payment_status'=>$payment_status,'due_amount'=>$due_amount));
      
  }

  
  
 echo json_encode($response);
  
  
  
  
   
 

?>