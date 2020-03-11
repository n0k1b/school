<?php


 include("connection.php");
  
  //$contact_no ="+8801679636311"; 
 
 $contact_no =$_POST['mobile'];
 //$term_exam_name =$_POST['term_exam_name'];
// $subejct =$_POST['subject'];

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
  
  $sql2 = "Select COUNT(attendance_date) as total_class from attendances where class='$class' and section = '$section' and rollno = $roll and school_id = $school_id ";
  $res2 = mysqli_query($conn,$sql2);
  $row2 = mysqli_fetch_array($res2);
  $total_class= $row2['total_class'];
  
  $sql2 = "Select COUNT(attendance_date) as total_present from attendances where class='$class' and section = '$section' and rollno = $roll and school_id = $school_id and present=1 ";
  
    $res2 = mysqli_query($conn,$sql2);
  $row2 = mysqli_fetch_array($res2);
  $total_present= $row2['total_present'];
  
  
  $sql2 = "Select sum(paid_amount) as total_paid from payment_records where class='$class' and section = '$section' and roll = $roll and school_id = $school_id ";
  $res2 = mysqli_query($conn,$sql2);
  $row2 = mysqli_fetch_array($res2);
  $total_paid= $row2['total_paid'];
  
   $response = array();
   
   array_push($response,array('total_class'=>$total_class,'total_present'=>$total_present,'total_paid'=>$total_paid));
   
   echo json_encode($response);
  
  


?>