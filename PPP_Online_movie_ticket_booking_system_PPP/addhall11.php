<?php include("11startform.php");?>
<?php include("checkadmin11.php");?>

<?php

$name = $seats = $nerr1 = $nerr2 = $serr1 =  $serr2 =  "" ;

$goto=1;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
  if (empty($_POST["name"])) {
    $nerr1 = "hall name is required";
	$goto=0;
  }  else {
	$name = test_input($_POST["name"]);
	$result=mysqli_query($conn,"select * from hall where name='$name'");
	if($result->num_rows > 0 ) {   
		$nerr2= "hall name already exists. Try new one";
		$goto=0;
	}
  }
  
	if(empty($_POST["seats"])){
		$serr1 = "required";
	}else{
		if($_POST["seats"]<1 || $_POST["seats"]>1000){
			$serr2 = "seats should be between 1 and 1000 ";
			$goto=0;
		}else{
			$seats = test_input($_POST["seats"]);
		}

	}
  
  
}else{
	$goto=0;
}
  




if($goto==1){


$query = "INSERT INTO hall ( name,seats) VALUES ('$name', '$seats')";

mysqli_query($conn,$query) or die('Error, query failed'); 


for($j=1; $j<=$seats ; $j++)      
{
	$r=1+ floor(($j-1)/10) ;
	$insert=mysqli_query($conn,"insert into seat
							(hall,row,num)
						values('$name','$r','$j')");

}	  


header('Location:dbupdated11.php');

}


?>


<?php include("11midform.php");?>

<div class="display">

<h2>Hall Insert</h2> <br>
  <hr>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

	<label > Name : </label> 
	<input type="text" name="name" id="n" <?php if(isset($_POST["name"])){ ?> 
				value="<?php echo $_POST["name"]; ?>" <?php } ?> >
	<span class="r">*	<?php echo $nerr1; ?> </span>
	<span class="r">	<?php echo $nerr2; ?> </span>
  <br>

					
	<label > # of seats  :  </label> 
	<input type="number" name="seats"  <?php if(isset($_POST["seats"])){ ?>
					value="<?php echo $_POST["seats"]; ?>" <?php } ?> > 
	<span class="r">*	<?php echo $serr1; ?> </span>
	<span class="r">	<?php echo $serr2; ?> </span>
<br>
	

  <hr>
	<input type="submit" name="submit4" value="Insert"  >
  <br>

</form>
</div>


<?php include("11end.php");?>
