<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkfac1.php");?>
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
$sql="select * from faculty where username='$user' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
$dept=$ob->dept;


$sql="select * from listsec where seats>0 and dcode='$dept' order by code,sid";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	echo "<table>";

	echo "<tr>";
	echo "<th colspan=\"10\"><center>Sections to be Registered from dept $dept </center></th>";
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
	echo "<th> </th>";
	echo "</tr>";
	
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
		$ssid=$ob->id;
		$sid=$ob->sid;
		$cid=$ob->code;
		$cre=$ob->credits;
		$s1=$ob->sem1;
		$s2=$ob->sem2;
		$r1=$ob->rid1;
		$r2=$ob->rid2;
		$t1=$ob->slot1;
		$t2=$ob->slot2;
		if($cre==4){
		$r3=$ob->lid;
		$t3=$ob->slot3;
		}
		$ss=$ob->seats;
		$str="regFac11.php?id=$ssid";
		$gooo=0;
		$sql="select * from regfac where sid='$sid' and cid='$cid' ";
		$ress=mysqli_query($conn,$sql);
		$sql="select * from regfac where sid='$sid' and cid='$cid' and fid='$user' ";
		$resss=mysqli_query($conn,$sql);
		if($ress->num_rows >0){
			$gooo=1;
		}
		if($resss->num_rows >0){
			$gooo=2;
		}
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


			echo "<td>";
			if($gooo==0){ ?> <a  href="<?php echo $str; ?>" > Register </a>	 
			<?php }else if($gooo==1){ echo "Registered";
			}else if($gooo==2){ echo "Taken";}
			echo "</td>";


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
