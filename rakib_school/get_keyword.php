<?php 

     include("connection.php");
     $mobile = "01679636311";
     $sql = "SELECT * from user where mobile_number = '$mobile'";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_array($res);
     
     $keyword = $row['keyword'];
     echo $keyword;
 

?>