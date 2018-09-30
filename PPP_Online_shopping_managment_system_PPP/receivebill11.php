<?php include("sessionstart11.php");?>
<?php include("cookielogin11.php");?>
<?php include("checklogin11.php");?>
<?php include("dbconnect11.php");?>
<?php

$userid=$pw1=$pw2="";
$uErr=$pErr1=$pErr2="";
$p1Err=$p1Err1=$p1Err2="";
$p2Err=$p2Err1=$p2Err2="";
$goto=0;
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(!empty($_POST)){
	if(empty($_POST["username"])){
		$uErr= "username is required";
	} else{
		$username=test_input($_POST["username"]);
		$sql="select * from payment where user='$username'";
		$result=mysqli_query($conn,$sql);
		if($result->num_rows >0){
			if($ob=mysqli_fetch_object($result)){
				$paid=$ob->paid;
				$time=$ob->time;
				if($paid==0){
					$sql="update bill set paid=1 where user='$username' and time <= '$time' ";
					$res=mysqli_query($conn,$sql);
					$sql="update payment set paid=1 where user='$username' and time <= '$time' ";
					$res=mysqli_query($conn,$sql);
					$goto=1;
				}
			}
		}
	}
		
include("dbclose11.php");
}



?>
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

<?php if($goto==1){echo "Payment inserted successfully! <br>";} ?>

<h2>Bill Receive</h2> <br> <hr> <br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="f3">

<label for="p1">Username</label> <br>
<input type="text" name="username" placeholder="Enter username" id="p1" >
<span class="r" > <?php echo $uErr; ?>  </span>


<br> <hr> <br>

<input type="submit" name="submit3" value="Submit" /> 
<a href="home11.php" >Home</a>

<br> <hr> <br>

</form>
</div>

</body>
</html>