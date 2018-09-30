<?php include("11startform.php");?>
<?php include("checkadmin11.php");?>

<?php

$cinema = $time = $date = $pr = $nerr1 = $nerr2 = $terr1 =  $derr1 =  "" ;

$goto=1;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
	$cinema = test_input($_POST["cinema"]);
	$time = test_input($_POST["time"]);
  
  
	if(empty($_POST["pr"])){
		$terr1 = "required";
		$goto=0;
	}else{
		$pr = test_input($_POST["pr"]);
	}
  
	if(empty($_POST["date"])){
		$derr1 = "required";
		$goto=0;
	}else{
		$date = test_input($_POST["date"]);
	}

}else{
	$goto=0;
}
  




if($goto==1){


$result=mysqli_query($conn,"select * from showtime where id='$time'");
if($result->num_rows > 0 ) {
	$ob=mysqli_fetch_object($result);
	$start1=$ob->start;
	$hall1=$ob->hall;
} 

$query = "INSERT INTO schedule ( cinema,showtime,start,date,price) VALUES ('$cinema', '$time','$start1', '$date', '$pr')";

mysqli_query($conn,$query) or die('Error, query failed'); 





$result=mysqli_query($conn,"select * from hall where name='$hall1'");
if($result->num_rows > 0 ) {
	$ob=mysqli_fetch_object($result);
	$seats=$ob->seats;
} 

$result=mysqli_query($conn,"select * from schedule where showtime='$time' and cinema='$cinema'");
if($result->num_rows > 0 ) {
	$ob=mysqli_fetch_object($result);
	$sid=$ob->id;
} 


for($j=1; $j<=$seats ; $j++)      
{
	$r=1+ floor(($j-1)/10) ;
	$insert=mysqli_query($conn,"insert into ticket
							(schedule,cinema,showtime,start,date,hall,row,num,price,booking)
						values('$sid','$cinema','$time','$start1','$date','$hall1','$r','$j','$pr',0)");

}

header('Location:dbupdated11.php');

}


?>

<?php include("11midform.php");?>


<div class="display">

<h2>Hall Insert</h2> <br>
  <hr>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

	<label > Cinema : </label> 
				  <select name="cinema">
<?php
	$result=mysqli_query($conn,"select * from cinema");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->name;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo "$ob->name";?></option>
<?php
		}
	} 

?>
				  </select>
<br>

	<label > Show time : </label> 
				  <select name="time">
<?php
	$result=mysqli_query($conn,"select * from showtime");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->id;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo "Starting from $ob->start at Hall $ob->hall";?></option>
<?php
		}
	} 

?>
				  </select>
<br>

					
	<label > Date  :  </label> 
	<input type="date" name="date"  <?php if(isset($_POST["date"])){ ?>
					value="<?php echo $_POST["date"]; ?>" <?php } ?> > 
	<span class="r">*	<?php echo $derr1; ?> </span>
<br>
	

	<label > Ticket price : </label> 
	<input type="number" name="pr"  <?php if(isset($_POST["pr"])){ ?>
					value="<?php echo $_POST["pr"]; ?>" <?php } ?> > 
	<span class="r">*	<?php echo $terr1; ?> </span>
<br>


  <hr>
	<input type="submit" name="submit4" value="Insert"  >
  <br>

</form>
</div>

<?php include("11end.php");?>

