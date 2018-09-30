<?php include("sessionstart11.php"); ?>
<?php 
if(isset($_SESSION["userid"])){
	header('Location:home11.php');
}
include("cookielogin11.php");
if(isset($_SESSION["userid"])){
	header('Location:home11.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Shop Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
<?php //include("s11.php");  ?>
</style>
</head>
<body>
<?php //include("b11.php");  ?>




<?php

$id = $pw = $remember = "";
$idErr = $pwErr = $pwErr1 = $idErr1 = $idErr4 = "";
$goto=0;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
  if (empty($_POST["id"])) {
    $idErr = "User-id is required";
	$goto=1;
  } else {
    $id = test_input($_POST["id"]);
  }
  
  if (empty($_POST["pw"])) {
    $pwErr = "password is required";
	$goto=1;
  } else{
    $pw = test_input($_POST["pw"]);
  }

  if (!empty($_POST["remember"])) {
    $remember = test_input($_POST["remember"]);
  }

} else{ $goto=1;
}
 

if($goto==0){

include("dbconnect11.php");
$userid=mysqli_query($conn,"select userid from users where userid='$id'");
if($userid){

	$uservalid=mysqli_query($conn,"select * from users where userid='$id' and  validity=1");
	if($uservalid){

	$userpw=mysqli_query($conn,"select pw from users where userid='$id' and  pw='$pw'");
	if($userpw){
		$update=mysqli_query($conn,"update users set status=1 where userid='$id'");
		
	$sql="select * from users where userid='$id' ";

	if ($result=mysqli_query($conn,$sql)){
		while ($obj=mysqli_fetch_object($result)){
			$_SESSION["userid"]=$obj->userid;
			$_SESSION["pw"]=$obj->pw;
			$_SESSION["name"]=$obj->name;
			$_SESSION["type"]=$obj->type;
			if(!empty($_POST["remember"])){

				setcookie("userid",$id,(time()+(365*24*60*60)) );
			}else{
				if(isset($_COOKIE["userid"])) {
					setcookie("userid","",time() - 3600);
				}
			}
			//sleep(5);
		}
		mysqli_free_result($result);
		//sleep(10);
	}
		include("dbclose11.php");

		if(isset($_SESSION["userid"])){

			header('Location:home11.php');

		}
	}else{
		$pwErr1 = "Password doesn't match";
	}
	
	}else{
		$idErr4 = "User hasn't been validated yet";
	}
} else {
	$idErr1 = "No such user exists";
}

}

?>

<div class="display">

<h2>User Login</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                  <label for="id" id="preinput"> ID 	 </label> <br>
                  <input type="text" name="id" placeholder="Enter user-id" id="inputid"
						<?php if(isset($_COOKIE["userid"])){ ?> value= <?php echo $_COOKIE["userid"];}  ?> >
					<span class="err">	<?php echo $idErr;?> </span>
					<span class="err">	<?php echo $idErr1;?> </span>
					<span class="err">	<?php echo $idErr4;?> </span>
  <br>
				  <label for="pw" id="preinput"> Password  </label> <br>
                  <input type="password" name="pw" placeholder="Enter your password" id="inputid" >
					<span class="err">	<?php echo $pwErr;?> </span>
					<span class="err">	<?php echo $pwErr1;?> </span>
  <br>
				  <input type="checkbox" name="remember" value="yes" 
							<?php if(isset($_COOKIE["userid"])) { ?> checked <?php } ?> > Remember Me
  <br>
  <hr>
                  <input type="submit" name="submit2" value="Login" id="inputid" >
				  <a href="register11.php" >Register</a>
  <br>

</form>
</div>

</body>
</html>
