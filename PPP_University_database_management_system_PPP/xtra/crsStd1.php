<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checklogin1.php");?>
<!DOCTYPE html>
<html>
<head>
<title>Student Database Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
<?php include("s1.php");?>
</style>
</head>
<body>
<?php include("b1.php");?>

<div class="display">
<hr>  <br>


<?php
$user=$_SESSION["username"];
$res=mysqli_query($conn,"select * from regstd where stid='$user' ");
$ct=0;
if($res->num_rows >0){
	$ct=0;
	echo "<table>";

	echo "<tr>";
	echo "<th colspan=\"5\"><center>Courses taken</center></th>";
	echo "</tr>";

	echo "<tr>";
	echo "<th></th>";
	echo "<th>Course code</th>";
	echo "<th>section</th>";
	echo "<th>semester</th>";
	echo "<th></th>";
	echo "</tr>";
	
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
		$sid=$ob->sid;
		$cid=$ob->cid;
		$ress=mysqli_query($conn,"select * from listsec where cid='$cid' and sid='$sid' ");
		$ob1=mysqli_fetch_object($ress);
		$ssid=$ob1->id;
		$s1=$ob1->sem1;
		$s2=$ob1->sem2;
		$str="more1.php?id=$ssid";
		echo "<tr>";
			echo "<td> $ct </td>";
			echo "<td> $cid </td>";
			echo "<td> $sid </td>";
			echo "<td> $s1$s2 </td>";
			echo "<td>"; ?> <a href="<?php echo $str;?>">More</a>	 <?php echo "</td>";
		echo "</tr>";
	}

	echo "</table>";
}else{
	echo "No forms submitted ";
}

?>


<hr>  <br>
</div>

</body>
</html>
