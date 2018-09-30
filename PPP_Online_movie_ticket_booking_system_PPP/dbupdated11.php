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
<?php include("s11.php");?>
</style>
</head>
<body>
<?php include("b11.php");?>

<div class="display">
<hr>  <br>

<h2> <?php  echo $_SESSION["name"]; ?> ! Your database has been updated</h2> 
<hr>  <br> <br>
<a href="home11.php" >Home</a> <br> <br>
<hr>  <br>
</div>

</body>
</html>
