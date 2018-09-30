<?php
    
    if($_POST)                         
    {
        $sid=$_POST['sid'];
		$rsn_of_aid=$_POST['rsn_of_aid'];		
		
        $approval='null';
			$errors = array();

        //start validation
        if(empty($_POST['sid']))
        {
            $errors['sid1'] = "Your ID cannot be empty";
        }
                
        
        if(empty($_POST['rsn_of_aid']))
        {
            $errors['rsn_of_aid1'] = "Your reason cannot be empty";
        }
        
        
		
            //start validation
        

        //check errors
        if(count($errors) == 0)
        {
         $DATABASE="localhost";
		 $username="root";
		 $password="";
		 $dbname = "university";
		 $connection= mysqli_connect($DATABASE, $username, $password, $dbname);
		 if(!$connection)
		 {
			die("Connection failed: " . mysqli_connect_error());
			 
		 }    
    
		  $query="insert into aid(sid,rsn_of_aid,approval)values('$sid','$rsn_of_aid','$approval')";
		  $query1="insert into aid1(sid,rsn_of_aid,approval)values('$sid','$rsn_of_aid','$approval')";
		  mysqli_query($connection,$query);
           mysqli_query($connection,$query1);
                  
         // header("Location:approve.php");
          exit();
    
        
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
<style>
body {
    border-style: solid;
    border-width: 1px;
    height:500px;
    width:200px;
    text-align:center;
}
</style>
    </head>
    <body>
<p>APPLICATION</p>

        <form method="post" target="">
           
            <p>
            <label for="Student Id">Student ID</label><br>
            <input type="text" name="sid" id="Name" value="<?php if(isset($_POST['sid'])) echo $_POST['sid']; ?>" /> <!-- output the field value -->
            </p>
            <p><?php if(isset($errors['sid1'])) echo $errors['sid1']; ?></p>   <!-- output errors if error occurs -->
            <p>
            <label for="Reason for aid">Reason for aid</label><br>
            <input type="text" name="rsn_of_aid" />
            </p>

            <p><?php if(isset($errors['rsn_of_aid1'])) echo $errors['rsn_of_aid1']; ?></p>
            
            <p><input type="submit" value="Register" />  </p>

        </form>
    </body>
</html>