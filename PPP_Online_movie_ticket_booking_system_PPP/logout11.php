<?php include("sessionstart11.php");?>
<?php include("dbconnect11.php");?>
<?php include("cookielogin11.php");?>
<?php include("checklogin11.php");?>
<!DOCTYPE html>
<html>
<head>
<title>Shop Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
</style>
</head>
<body>
<?php include("dbconnect11.php");?>



<div class="display">

<?php

$id=$_SESSION["userid"];
$sql="update users set status=0 where userid='$id' ";

if ($result=mysqli_query($conn,$sql)){
session_destroy();
//sleep(10);
header('Location:display11.php');
}else{
	echo "Something went wrong :(";
}
?>
</div>






</body>
</html>
