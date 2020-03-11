<?php

  include("connection.php");
  
// $contact_no ="+8801845318609"; 
  //$term_exam_name  = "First Term";
 //  $subject = "Bangla";
  
 $contact_no =$_POST['mobile'];
 $term_exam_name =$_POST['term_exam_name'];
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
  
  $sql2 = "Select * from term_exam_marks where school_id=$school_id and class='$class' and section = '$section' and rollno = '$roll' and exam_type = '$term_exam_name' ";
  $res2 = mysqli_query($conn,$sql2);
  $response = array();
  $total_gpa = '';
  while($row2 = mysqli_fetch_array($res2))
  {  
      $subject = $row2['subject'];
      $sql3 = "select MAX(total_marks) as highest_marks from term_exam_marks where school_id=$school_id and class='$class' and section = '$section'  and exam_type = '$term_exam_name' and subject = '$subject' ";
      $res3 = mysqli_query($conn,$sql3);
      $row3 = mysqli_fetch_array($res3);
      $highest_marks = $row3['highest_marks'];
      
      $total_marks = $row2['total_marks'];
       if($total_marks>=80)
                $gpa = 5.00;
            else if($total_marks>=70 && $total_marks<=79 )
                $gpa = 4.00;
            else if($total_marks>=60 && $total_marks<=69)
                $gpa = 3.5;
            else if($total_marks>=50 && $total_marks<=59)
                $gpa = 3.00;
            else if($total_marks>=40 && $total_marks<=49)
                $gpa = 2.00;
            else
                $gpa = 0.00;

        
         
      
      
     array_push($response,array('full_marks'=>$row2['full_marks'],'subject'=>$row2['subject'],'obtaining_marks_subjective'=>$row2['obtaining_marks_subjective'],'obtaining_marks_objective'=>$row2['obtaining_marks_objective'],'total_marks'=>$row2['total_marks'],'highest_marks'=>$highest_marks,'gpa'=>$gpa,'ranking'=>"1"));
      
  }
  
 
  
  
 echo json_encode($response);
  
  
  
  
   
 

?>