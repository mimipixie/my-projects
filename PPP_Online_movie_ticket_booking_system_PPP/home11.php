<?php include("11start.php");?>
<?php include("checklogin11.php");?>

<hr>  <br>

<div class="display">

<h2>Welcome <?php echo $_SESSION["name"]; ?> !</h2> 
<hr>  <br> <br>
<a href="profile11.php" >Profile</a> <br>
<a href="changepw11.php" >Change Password</a> <br>
<?php
if($_SESSION["type"]=="admin"){
echo " <a href=\"usertable11.php\" >View Users</a> <br> ";
echo " <a href=\"addcinema11.php\" >Add Movie</a> <br> ";
echo " <a href=\"addhall11.php\" >Add a Hall</a> <br> ";
echo " <a href=\"addtime11.php\" >Add Movie Schedule</a> <br> ";
echo " <a href=\"addschedule11.php\" >Add Showtime</a> <br> ";
echo " <a href=\"admintable11.php\" >Approve Admin</a> <br> ";
}

?>
<a href="logout11.php" >Logout</a> <br> <br>
<hr>  <br>
</div>

</body>
</html>
