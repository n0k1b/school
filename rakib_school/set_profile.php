<?php
include("connection.php");
	
    
    
    $mobile= $_POST['mobile'];
    $pro_image = $_POST['image'];
    
    $updated_contact_no = "";
   
    for($i=3;$i<=13;$i++)
    {
       $updated_contact_no.=$mobile[$i];
    }
    
    $upload_path = "user_image/".$mobile.".jpg";
    
    $for_old_image = "SELECT * FROM student_lists WHERE contact_no='$updated_contact_no'";
    
    $result = mysqli_query($conn, $for_old_image);
    
    if($result) {
        $row_old_image = mysqli_fetch_assoc($result);
    }
  
   
    $sql2 = "UPDATE student_lists SET image='$mobile.jpg' WHERE contact_no='$updated_contact_no'";
     
       
       if(mysqli_query($conn,$sql2)){
        unlink($row_old_image['image']);
     
        file_put_contents($upload_path,base64_decode($pro_image));
        $status= "ok";
        }

    echo"[". json_encode(array('response'=>$status))."]";
    mysqli_close($con); 
 

?>