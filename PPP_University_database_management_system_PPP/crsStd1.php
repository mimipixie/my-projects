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
	echo "<th colspan=\"11\"><center>Courses taken</center></th>";
	echo "</tr>";

	echo "<tr>";
	echo "<th></th>";
	echo "<th>Course code</th>";
	echo "<th>credits</th>";
	echo "<th>section</th>";
	echo "<th>semester</th>";
	echo "<th>class 1</th>";
	echo "<th>class 2</th>";
	echo "<th>Lab </th>";
	echo "<th>seats </th>";
	echo "<th>students # </th>";
	echo "<th> </th>";
	echo "</tr>";
	
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
		$sid=$ob->sid;
		$cid=$ob->cid;
		$ress=mysqli_query($conn,"select * from listsec where code='$cid' and sid='$sid' ");
		$ob1=mysqli_fetch_object($ress);
		$ssid=$ob1->id;
		$s1=$ob1->sem1;
		$s2=$ob1->sem2;
		$cre=$ob1->credits;
		$r1=$ob1->rid1;
		$r2=$ob1->rid2;
		$t1=$ob1->slot1;
		$t2=$ob1->slot2;
		if($cre==4){
		$r3=$ob1->lid;
		$t3=$ob1->slot3;
		}
		$ss=$ob1->seats;
		$st=$ob1->numstd;
		$str="more1.php?id=$ssid";
		echo "<tr>";
			echo "<td> $ct </td>";
			echo "<td> $cid </td>";
			echo "<td> $cre </td>";
			echo "<td> $sid </td>";
			echo "<td> $s1$s2 </td>";
			echo "<td> $r1 - $t1 </td>";
			echo "<td> $r2 - $t2 </td>";
			if($cre==4){
			echo "<td> $r3 - $t3 </td>";
			}else{
			echo "<td> - </td>";
			}
			echo "<td> $ss </td>";
			echo "<td> $st </td>";
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
