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
<?php
$user=$_SESSION["username"];
$sql="select * from listcrs order by code";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	echo "<table>";

	echo "<tr>";
	echo "<th colspan=\"6\"><center>Courses</center></th>";
	echo "</tr>";

	echo "<tr>";
	echo "<th></th>";
	echo "<th>Code</th>";
	echo "<th>Title</th>";
	echo "<th>Dept</th>";
	echo "<th>Credits</th>";
	echo "<th>Offer course</th>";
	echo "</tr>";
	
	while(($ob=mysqli_fetch_object($res))){
		$code=$ob->code;
		$dept=$ob->dept;
		$credits=$ob->credits;
		$title=$ob->name;
		$sql="select * from listsec where code='$code'";
		$ress=mysqli_query($conn,$sql);
			$ct++;
			$str="offerCrs11.php";
		echo "<tr>";
			echo "<td> $ct </td>";
			echo "<td> $code </td>";
			echo "<td> $title </td>";
			echo "<td> $dept </td>";
			echo "<td> $credits </td>";
			echo "<td>";
			if($ress->num_rows == 0){   ?>
			<form name="f1" action="<?php echo $str; ?>" method="GET">
				sections :	<input type="text" name="s"  maxlength="4" size="4" >
					<input type="hidden" name="code" value="<?php echo $code;?>"  >
					<input type="submit" name="s1" value="offer"  >
			</form>
			<?php }else{ echo "offered "; }
			echo "</td>";
	}
	echo "</table>";
}else{
	echo "No courses";
}

//include("dbclose1.php");
?>
</div>






</body>
</html>
