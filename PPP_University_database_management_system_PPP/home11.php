<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("logout1.php");?>
<?php
if (!empty($_POST)) {
  if(!empty($_POST["s1"])) {
	  header('Location:loginAdmin1.php');
  }
  if(!empty($_POST["s2"])) {
	  header('Location:loginFac1.php');
  }
  if(!empty($_POST["s3"])) {
	  header('Location:loginStd1.php');
  }
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


<div class="display">

<h2>Welcome!!</h2> 
<hr>  <br> <br>



<div class="images">
  <img src="images/admin.jpg" class="w3-circle" alt="Admin" style="width:170px;height:170px;border:0;">
	<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<hr>
			<input type="submit" name="s1" value="Admin"  >
		<br>
	</form>
</div>

<div class="images">
  <img src="images/fac.jpg" class="w3-circle" alt="Faculty" style="width:170px;height:170px;border:0;">
	<form name="f2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<hr>
			<input type="submit" name="s2" value="Faculty"  >
		<br>
	</form>
</div>

<div class="images">
  <img src="images/std.jpg" class="w3-circle" alt="Student" style="width:170px;height:170px;border:0;">
	<form name="f3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<hr>
			<input type="submit" name="s3" value="Student"  >
		<br>
	</form>
</div>






<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<hr>  <br>

</div>

</body>
</html>
