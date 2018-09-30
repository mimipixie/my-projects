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
<?php //include("s11.php");?>
</style>
</head>
<body>
<?php //include("b11.php");?>
<?php include("dbconnect11.php");?>

<div class="display">

<?php

$pw=$pw1=$pw2="";
$pErr=$pErr1=$pErr2="";
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
	if(empty($_POST["pw"])){
		$pErr= "Password is required";
	} else{
		$pw=test_input($_POST["pw"]);
		if($pw!=$_SESSION["pw"]){
			$pErr1="Password doesn't match";
		}
	}
	if(empty($_POST["pw1"])){
		$p1Err= "New password is required";
	} else{
		$pw1=test_input($_POST["pw1"]);
		if(empty($_POST["pw2"])){
			$p2Err= "Confirmation is required";
		} else{
			$pw2=test_input($_POST["pw2"]);
			if($pw1!=$pw2){
				$p1Err1="New password doesn't match";
			}else{
				$goto=1;
			}
		}
	}
		
}

if($goto){
$id=$_SESSION["userid"];
$conn = new mysqli("localhost", "root","", "mim");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$res=mysqli_query($conn," update users set pw='$pw1' where userid='$id' ");
if($res){
	$_SESSION["pw"]=$pw1;
	header('Location:changepwupdate11.php');
}else{
	echo "Something went wrong  :( ";
}
	
}

include("dbclose11.php");

?>

<h2>Change Password</h2> <br> <hr> <br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="f3">

<label for="p1">Current Password</label> <br>
<input type="password" name="pw" placeholder="Enter current password" id="p1" 
			<?php if(isset($_SESSION["pw"])){ ?> value= <?php echo $_SESSION["pw"]; } ?> >
<span class="r" > <?php echo $pErr; ?>  </span>
<span class="r" > <?php echo $pErr1; ?>  </span> <br>

<label for="p2">New Password</label> <br>
<input type="password" name="pw1" placeholder="Enter new password" id="p2"  >
<span class="r" > <?php echo $p1Err; ?>  </span>
<span class="r" > <?php echo $p1Err1; ?>  </span><br>

<label for="p3">Re-type New Password</label> <br>
<input type="password" name="pw2" placeholder="Confirm new password" id="p3"  >
<span class="r" > <?php echo $p2Err; ?>  </span><br>

<br> <hr> <br>

<input type="submit" name="submit3" value="Change" > 
<a href="home11.php" >Home</a>

<br> <hr> <br>

</form>
</div>

</body>
</html>