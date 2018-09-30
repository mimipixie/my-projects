<?php include("sessionstart11.php");?>
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
<?php include("dbconnect11.php");?>


<hr>  <br>

<div class="display">

<h2>Welcome <?php echo $_SESSION["name"]; ?> !</h2> 
<hr>  <br> <br>
<a href="profile11.php" >Profile</a> <br>
<a href="changepw11.php" >Change Password</a> <br>
<?php
if($_SESSION["type"]=="admin"){
echo " <a href=\"usertable11.php\" >View Users</a> <br> ";
echo " <a href=\"apprvadmin11.php\" >Approve Admin</a> <br> ";
echo " <a href=\"product_insert11.php\" >Insert Product</a> <br> ";
echo " <a href=\"receivebill11.php\" >Receive bill</a> <br> ";
}

?>
<a href="logout11.php" >Logout</a> <br> <br>
<hr>  <br>
</div>

</body>
</html>
