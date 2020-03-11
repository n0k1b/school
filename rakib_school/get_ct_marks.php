<?php

  include("connection.php");
  
//  $contact_no ="+8801845318609"; 
//   $ct_name = "ct1";
//   $subject = "Bangla";
  
    $contact_no = $_POST['mobile'];
    $ct_name    = $_POST['ct_name'];
    $subject    = $_POST['subject'];

//   $month =$_POST['month'];

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
  
  $sql2 = "Select * from class_test_marks where school_id=$school_id and class='$class' and section = '$section' and class_test_name = '$ct_name' and subject = '$subject' and student_roll='$roll' ";
  $res2 = mysqli_query($conn,$sql2);
  $response = array();
  
  while($row2 = mysqli_fetch_array($res2))
  {
      
     array_push($response,array('full_marks'=>$row2['full_marks'],'obtaining_marks'=>$row2['obtaining_marks'],'class_test_date'=>$row2['class_test_date']));
      
  }

  
  
 echo json_encode($response);
  
  
  
  
   
 

?>