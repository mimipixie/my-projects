<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checklogin1.php");?>
<?php
if(isset($_GET["id"])){

	$id=$_GET["id"];
	$_SESSION["ssid"]=$id;
}else{
	$id=$_SESSION["ssid"];
}
if (!empty($_POST)) {
echo "hi<br>";
	$txt=$_POST["name"];
	$ssid=$_POST["ssid"];
	$cid=$_POST["cid"];
	$sid=$_POST["sid"];
	$user=$_POST["user"];
//echo $txt.$ssid.$cid.$sid.$user."hi<br>";
	$tmpName  = $_FILES["image"]["tmp_name"];

	$fp      = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	$content = addslashes($content);
	fclose($fp);
//echo $content."hi<br>";

	$query = "INSERT INTO groupsec ( code,sid,text,file,user )
		VALUES('$cid','$sid','$txt','$content','$user' )";
	mysqli_query($conn,$query) or die('Error, query failed'); 

	$str="more1.php?id=$ssid";
	header('Location:$str');  
}
	$sql2="select * from listsec where id='$id'  ";
	$resss=mysqli_query($conn,$sql2);
	$ob2=mysqli_fetch_object($resss);

	$cid1 = $ob2->code;
	$sid1 = $ob2->sid;
	$strrr="more11.php";
			
	$err1="";
	$err2="";
	$user=$_SESSION["username"];
?>



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

<h2>Welcome!!</h2> 
<hr>  <br> <br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

	<label for="n"> comment  </label> 
	<input type="text" name="name" id="n"  >
    <label for="image"> file  </label> 
    <input type="file" name="image" id="image"  >
		<input type="hidden" name="ssid" value="<?php echo $id;?>"  >
		<input type="hidden" name="user" value="<?php echo $user;?>"  >
		<input type="hidden" name="cid" value="<?php echo $cid1;?>"  >
		<input type="hidden" name="sid" value="<?php echo $sid1;?>"  >

	<input type="submit" name="submit4" value="upload"  >
  <br>
<hr>  <br> <br>

</form>


<?php	
	$sql="select * from groupsec where code='$cid1' and sid='$sid1' ";
	$res=mysqli_query($conn,$sql);
	$ct=0;
if($res->num_rows >0){
	$ct=0;
	echo "<table>";

/*	echo "<tr>";
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
*/	
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
//		$ff=$ob->file;
		$txt=$ob->text;
		$us=$ob->user;
		$oid=$ob->id;
		$ooo=$ob->file;
		$strrr="download1.php?id=$oid";
		echo "<tr>";
			echo "<td> $ct </td>";
			echo "<td>  "; ?>
		<a  href="<?php echo $oo;?>" download>
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->file).'" 
						style="width:170px;height:170px;border:0;"/>'; ?>
		</a>
			<?php echo " </td>  ";
			echo "<td> $txt </td>";
			echo "<td>Posted by $us </td>";
		echo "</tr>";
	}

	echo "</table>";
}else{
	echo "No forms submitted ";
}
		
		

?>




<br> <br>
<hr>  <br> <br>

</div>

</body>
</html>
