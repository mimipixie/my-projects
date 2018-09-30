<?php include("sessionstart11.php");?>
<?php include("cookielogin11.php");?>
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
if(isset($_SESSION["userid"])){
	header('Location:logoutpage11.php');
}

$id = $pw = $name =$email = $type = "";
$idErr = $idErr1 = $pwErr = $pwErr1 = $pwErr2 = $pwErr3 = $nameErr =$emailErr = $typeErr = "";
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
  }  else {
	$id = test_input($_POST["id"]);
	$result=mysqli_query($conn,"select userid from users where userid='$id'");
	if($result->num_rows > 0 ) {    
		$idErr1= "User already exists. Try new userid";
		$goto=1;
	} else{
		$id = test_input($_POST["id"]);
	}
  }
  
  if (empty($_POST["pw"])) {
    $pwErr = "Password is required";
	$goto=1;
  } else if(empty($_POST["pw1"])){
    $pwErr1 = "Confirm your password";
	$goto=1;
  } else if($_POST["pw"]!=$_POST["pw1"]){
    $pwErr2 = "Password doesn't match";
	$goto=1;
  } else{
    $pw = test_input($_POST["pw"]);
  }

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	$goto=1;
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$goto=1;
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["type"])) {
    $typeErr = "User type is required";
	$goto=1;
  } else {
    $type = test_input($_POST["type"]);
	if($type=="admin"){
		$goto=2;
	}
  }
} else{ $goto=1;
}
  

  
if($goto==0){
	 

$update=mysqli_query($conn,"insert into users(userid,pw,name,email,type,status,validity)
					values('$id','$pw','$name','$email','$type',0,1)");

  if($update) {
	  //sleep(5);
	  header('Location:login11.php');
  } else {
  echo "Something went wrong  :(  ";
  }

}



if($goto==2){
	 

$update=mysqli_query($conn,"insert into users(userid,pw,name,email,type,status,validity)
					values('$id','$pw','$name','$email','$type',0,0)");

  if($update) {
	  //sleep(5);
	  header('Location:login11.php');
  } else {
  echo "Something went wrong  :(  ";
  }

}

?>


<h2>User Registration</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                  <label for="id" id="preinput"> ID 	 </label> <br>
                  <input type="text" name="id" placeholder="Enter user-id" id="inputid">
					<span class="err">	<?php echo $idErr;?> </span>
					<span class="err">	<?php echo $idErr1;?> </span>
  <br>
				  <label for="pw" id="preinput"> Password  </label> <br>
                  <input type="password" name="pw" placeholder="Enter your password" id="inputid">
					<span class="err">	<?php echo $pwErr;?> </span>
					<span class="err">	<?php echo $pwErr3;?> </span>
  <br>
				  <label for="pw1" id="preinput"> Confirm password  </label> <br>
                  <input type="password" name="pw1" placeholder="Re-type your password" id="inputid">
					<span class="err">	<?php echo $pwErr1;?> </span>
					<span class="err">	<?php echo $pwErr2;?> </span>
  <br>
                  <label for="name" id="preinput"> Name  </label> <br>
                  <input type="text" name="name" placeholder="Enter your name" id="inputid">
					<span class="err">	<?php echo $nameErr;?> </span>
  <br>
                  <label for="email" id="preinput"> Email  </label> <br>
                  <input type="email" name="email" placeholder="Enter your email" id="inputid">
					<span class="err">	<?php echo $emailErr;?> </span>
  <br>
                  <label for="type" id="preinput"> User type (user/admin)  </label> <br>
					<select name="type">
						<option value="user" selected>user</option>
						<option value="admin">admin</option>
					</select>
					<span class="err">	<?php echo $typeErr;?> </span>
  <br>
  <hr>
                  <input type="submit" name="submit1" value="Register" id="inputid" >
				  <a href="login11.php" >Login</a>
  <br>

</form>
</div>
</body>
</html>
