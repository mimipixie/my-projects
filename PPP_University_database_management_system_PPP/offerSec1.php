<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkadmin1.php");?>
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
$sql="select * from listsec order by code,sid";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	echo "<table>";

	echo "<tr>";
	echo "<th colspan=\"7\"><center>Sections</center></th>";
	echo "</tr>";

	echo "<tr>";
	echo "<th></th>";
	echo "<th>section</th>";
	echo "<th>Course code</th>";
	echo "<th>Credits</th>";
	echo "<th>Dept</th>";
	echo "<th>semester</th>";
	echo "<th></th>";
	echo "</tr>";
	
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
		$ssid=$ob->id;
		$sid=$ob->sid;
		$cid=$ob->code;
		$cre=$ob->credits;
		$dept=$ob->dcode;
		$s1=$ob->sem1;
		$s2=$ob->sem2;
		$sql="select * from listsec where seats=0 and code='$cid' and sid='$sid' ";
		$ress=mysqli_query($conn,$sql);
		$str="accept1.php?id=$ssid";
		$str1="reject1.php?id=$ssid";
		echo "<tr>";
			echo "<td> $ct </td>";
			echo "<td> $sid </td>";
			echo "<td> $cid </td>";
			echo "<td> $cre </td>";
			echo "<td> $dept </td>";
			echo "<td> $s1$s2 </td>";
			echo "<td>"; if($ress->num_rows >0){?> <a href="<?php echo $str;?>"> Accept </a> | 	 
			<a href="<?php echo $str1;?>"> Reject </a>	 <?php }else{ echo " Registered ";} echo "</td>";
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
