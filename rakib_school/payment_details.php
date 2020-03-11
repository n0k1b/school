<?php


 include("connection.php");
  
  //$contact_no ="+8801679636311"; 
  //$month ="January";
 
 $contact_no =$_POST['mobile'];
 //$term_exam_name =$_POST['term_exam_name'];
// $subejct =$_POST['subject'];

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
  
  
  $sql2 ="Select * from payments where school_id = $school_id and class = '$class' and section  = '$section' and roll='$roll' and month = '$month'";
  $res2 = mysqli_query($conn,$sql2);
  $data = "";
  $response = array();
  while($row2 = mysqli_fetch_array($res2))
  {
      
      
      $data.=''.$row2["fees_name"].':'.$row2['paid_amount'].' ';
    //   $data = nl2br($data."\n");
      $data = $data."\n";
    // $data = "hi";
  }
  
  array_push($response,array('text'=>$data));
  echo json_encode($response);

  
  


?>