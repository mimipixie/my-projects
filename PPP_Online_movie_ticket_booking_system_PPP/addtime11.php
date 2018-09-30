<?php include("11startform.php");?>
<?php include("checkadmin11.php");?>

<?php

$start = $hall = $nerr1 = $nerr2 = $nerr3 = $nerr4 = $terr1 =  $pr = $end=  "" ;

$goto=1;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
	if(!empty($_POST["hall"])){
			$hall = test_input($_POST["hall"]);
	}

	if (empty($_POST["start"])) {
		$nerr1 = "required";
		$goto=0;
	}else {
		$start = test_input($_POST["start"]);
		$result=mysqli_query($conn,"select * from showtime where hall='$hall' and start<='$start' and end>'$start'");
		if($result->num_rows > 0 ) { 
			$nerr2= "hall is booked for this time period. Try new one";
			$goto=0;
		}
	}

	if (empty($_POST["end"])) {
		$nerr3 = "required";
		$goto=0;
	}else {
		$end = test_input($_POST["end"]);
		$result=mysqli_query($conn,"select * from showtime where hall='$hall' and end>='$end' and start<'$end'");
		if($result->num_rows > 0 ) { 
			$nerr4= "hall is booked for this time period. Try new one";
			$goto=0;
		}
	}

	
  
}else{
	$goto=0;
}
  




if($goto==1){

$query = "INSERT INTO showtime ( start,end,hall) VALUES ('$start', '$end', '$hall')";

mysqli_query($conn,$query) or die('Error, query failed'); 

header('Location:dbupdated11.php');

}


?>


<?php include("11midform.php");?>

<div class="display">

<h2>Showtime Insert</h2> <br>
  <hr>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

	<label > Start time : </label> 
	<input type="time" name="start" id="n" <?php if(isset($_POST["start"])){ ?> 
				value="<?php echo $_POST["start"]; ?>" <?php } ?> >
	<span class="r">*	<?php echo $nerr1; ?> </span>
	<span class="r">	<?php echo $nerr2; ?> </span>
  <br>

	<label > End time : </label> 
	<input type="time" name="end" id="n" <?php if(isset($_POST["end"])){ ?> 
				value="<?php echo $_POST["end"]; ?>" <?php } ?> >
	<span class="r">*	<?php echo $nerr3; ?> </span>
	<span class="r">	<?php echo $nerr4; ?> </span>
  <br>

					
	<label > Hall  :  </label> 
				  <select name="hall">
<?php
	$result=mysqli_query($conn,"select * from hall");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->name;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo $ob->name;?></option>
<?php
		}
	} 

?>
				  </select>
<br>
  <hr>
	<input type="submit" name="submit4" value="Insert"  >
  <br>

</form>
</div>


<?php include("11end.php");?>
