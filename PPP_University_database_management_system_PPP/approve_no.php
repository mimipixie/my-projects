<?php

          $DATABASE="localhost";
		 $username="root";
		 $password="";
		 $dbname = "university";
		 $connection= mysqli_connect($DATABASE, $username, $password, $dbname);
		 if(!$connection)
		 {
			die("Connection failed: " . mysqli_connect_error());
			 
		 }    
    
		  
		  
if(isset($_GET['id']) != "") {
        $sid = $_GET['id'];
        
        $approve_no = mysqli_query($connection, "update aid set approval='no' WHERE sid ='$_GET[id]' ");
        if($approve_no) {
            header("Location:show_aid.php");
            echo "not accepted";
        } 
    else {
            mysqli_error($connection);
        }
    
        
            
        
    }
?>