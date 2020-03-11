<?php
include("connection.php");
	mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	
	
	        $version_code = $_POST['version_code'];
	        
            $sql = "Select active from version_control Where version = $version_code ";
            $res=mysqli_query($conn,$sql);
            $response=array();
            while($data = mysqli_fetch_array($res))
                {
                    if($data['active'] == 0){
                          array_push($response,array('response'=>'0')); 
                      }else if($data['active'] == 2){
                          array_push($response,array('response'=>'2')); 
                      }else {
                          array_push($response,array('response'=>'1')); 
                      }
                    
                    
                  }
                echo json_encode($response);
           
   
   


?>