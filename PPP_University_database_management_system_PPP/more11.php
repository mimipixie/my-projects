<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checklogin1.php");?>
<?php

$name = $gender  =$age = $type =$stype =  $size = $quantity =$sale= $price = "";
$Err = $Err1 = $Err2 = $Err3 = $Err4 = $slErr =$slErr1= "";
$goto=1;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_GET["user"])){
	$txt=$_GET["name"];
	$ssid=$_GET["ssid"];
	$cid=$_GET["cid"];
	$sid=$_GET["sid"];
	$user=$_GET["user"];
	
	$tmpName  = $_FILES["image"]["tmp_name"];

	$fp      = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	$content = addslashes($content);
	fclose($fp);

	$query = "INSERT INTO groupsec ( code,sid,text,file,user )
		VALUES('$cid','$sid','$txt','$content','$user' )";

	$str="more1.php?id=$ssid";

//header('Location:$str');

  
}
  

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
<hr>  <br>

<h2>Welcome <?php echo $_SESSION["username"]; ?> !</h2> 
<hr>  <br> <br>
<a href="home11.php" >Logout</a> <br> <br>
<hr>  <br>
</div>

</body>
</html>
