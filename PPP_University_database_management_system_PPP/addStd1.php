<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php
if(isset($_SESSION["username"])){
	header('Location:home11.php');
}

$id = $pw = $name =$designation = $sid1 = $sid2 =  $sid3 =  $sid4 =  "";
$idErr = $idErr1 = $pwErr = $pwErr1 = $pwErr2 = $pwErr3 
		= $nameErr =$desErr = $typeErr =$sidErr = $sidErr1 =  $sidErr2 =  "";
$gotoEm=0;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
  if(!empty($_POST["submit1"])) {
	  header('Location:loginFac1.php');
  }
  if (empty($_POST["id"])) {
    $idErr = "username is required";
	$gotoEm=1;
  }  else {
	$id = test_input($_POST["id"]);
	$result=mysqli_query($conn,"select username from student where username='$id'");
	if($result->num_rows > 0 ) {    
		$idErr1= "username already exists. Try new username";
		$gotoEm=1;
	} else{
		$id = test_input($_POST["id"]);
	}
  }
	
  if (empty($_POST["sid4"])) {
    $sidErr = "Student Id is required";
	$gotoEm=1;
  }  else {
	$sid1 = test_input($_POST["sid1"]);
	$sid2 = test_input($_POST["sid2"]);
	$sid3 = test_input($_POST["sid3"]);
	$sid4 = test_input($_POST["sid4"]);
	echo $sid4."<br>";
	$result=mysqli_query($conn,"select * from liststd where sid1='$sid1' and 
				 sid2='$sid2' and  sid3='$sid3' and  sid4='$sid4' ");
	if($result->num_rows > 0 ) {
		$result=mysqli_query($conn,"select * from student where sid1='$sid1' and 
					 sid2='$sid2' and  sid3='$sid3' and  sid4='$sid4' ");
		if($result->num_rows > 0 ) {
			$sidErr2= "Student Id is in use. Try different Id";
			$gotoEm=1;
		}
	} else{
		$sidErr1= "Invalid Student Id. Try valid one";
		$gotoEm=1;
	}
  }
  
  if (empty($_POST["pw"])) {
    $pwErr = "Password is required";
	$gotoEm=1;
  } else if(empty($_POST["pw1"])){
    $pwErr1 = "Confirm your password";
	$gotoEm=1;
  } else if($_POST["pw"]!=$_POST["pw1"]){
    $pwErr2 = "Password doesn't match";
	$gotoEm=1;
  } else{
    $pw = test_input($_POST["pw"]);
  }
  


} else{ $gotoEm=1;
}
  
if($gotoEm==0){

$sql="select * from listdep where did='$sid3' ";
$res=mysqli_query($conn,$sql);
$ob=mysqli_fetch_object($res);
$dept=$ob->code;
$insert=mysqli_query($conn,"insert into student
						(username ,sid1 ,sid2 ,sid3,sid4,dept,password,status,validity)
						values('$id','$sid1','$sid2','$sid3','$sid4','$dept','$pw',0,1)");
  if($insert) {
	  header('Location:loginStd1.php');
  } else {
  echo "Something went wrong  :(  ";
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

<div class="form">
<h2>Student Registration</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<span class="r">*	Required Fields </span><br>
                  <label for="id" id="preinput"> Username 	 </label> <br>
                  <input type="text" name="id" placeholder="Enter username" id="inputid">
					<span class="r">*	<?php echo $idErr;?> </span>
					<span class="r">	<?php echo $idErr1;?> </span>
  <br>
                  <label for="sid" id="preinput"> Student Id 	 </label> <br>
				  <select name="sid1">
					<option value="2017" selected>2017</option>
					<option value="2016">2016</option>
					<option value="2015">2015</option>
					<option value="2014">2014</option>
					<option value="2013">2013</option>
					<option value="2012">2012</option>
					<option value="2011">2011</option>
					<option value="2010">2010</option>
				  </select>
				  <select name="sid2">
					<option value="1" selected>Spring</option>
					<option value="2">Summer</option>
					<option value="3">Fall</option>
				  </select>
				  <select name="sid3">
<?php
	$result=mysqli_query($conn,"select * from listdep");
	if($result->num_rows > 0 ) {
		$cc=0;
		while(($ob=mysqli_fetch_object($result))){ $cc++;?>
			<option value="<?php echo $ob->did;?>" 
				<?php if($cc==1){?>"selected"<?php }?>  ><?php echo $ob->code;?></option>
<?php
		}
	} 

?>
				  </select>
                  <input type="text" name="sid4" maxlength="3" pattern="[0-9]{3}" size="2" title="3 digit code">
					<span class="r">*	<?php echo $sidErr;?> </span>
					<span class="r">	<?php echo $sidErr1;?> </span>
					<span class="r">	<?php echo $sidErr2;?> </span>
  <br>
				  <label for="pw" id="preinput"> Password  </label> <br>
                  <input type="password" name="pw" placeholder="Enter your password" id="inputid">
					<span class="r">*	<?php echo $pwErr;?> </span>
					<span class="r">	<?php echo $pwErr3;?> </span>
  <br>
				  <label for="pw1" id="preinput"> Confirm password  </label> <br>
                  <input type="password" name="pw1" placeholder="Re-type your password" id="inputid">
					<span class="r">*	<?php echo $pwErr1;?> </span>
					<span class="r">	<?php echo $pwErr2;?> </span>
  <br>
  <hr>
                  <input type="submit" name="submit1" value="Back" id="inputid" >
                  <input type="submit" name="submit2" value="Ok" id="inputid" >
  <br>

</form>
</div>
</body>
</html>
