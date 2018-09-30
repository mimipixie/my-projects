<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkadmin1.php");?>
<?php


$id = $pw = $name =$designation = $sid1 = $sid2 =  $sid3 =  $sid4 = $gender =
			$email= $addr= "";
$idErr = $idErr1 = $pwErr = $pwErr1 = $pwErr2 = $pwErr3 = $aErr  = $emailErr 
		= $nameErr =$desErr = $typeErr =$sidErr = $sidErr1 =  $sidErr2 =  "";
$gotoEm=0;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
	
  if (empty($_POST["sid4"])) {
    $sidErr = "faculty Id is required";
	$gotoEm=1;
  }  else {
	$sid1 = test_input($_POST["sid1"]);
	$sid2 = test_input($_POST["sid2"]);
	$sid3 = test_input($_POST["sid3"]);
	$sid4 = test_input($_POST["sid4"]);
	$result=mysqli_query($conn,"select * from listfac where sid1='$sid1' and 
				 sid2='$sid2' and  sid3='$sid3' and  sid4='$sid4' ");
	if($result->num_rows > 0 ) {
		$sidErr1= "faculty Id is in use. Try new one";
		$gotoEm=1;
	} 
  }
  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	$gotoEm=1;
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$gotoEm=1;
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["addr"])) {
    $aErr = "Address is required";
	$gotoEm=1;
  } else {
    $addr = test_input($_POST["addr"]);
  }

  if (empty($_POST["designation"])) {
    $desErr = "Designation is required";
	$gotoEm=1;
  } else {
    $designation = test_input($_POST["designation"]);
  }


} else{ $gotoEm=1;
}
  
if($gotoEm==0){
$gender=$_POST["gender"];

//echo $sid1.$sid2.$sid3.$sid4.$name.$email.$designation.$addr.$gender."<br>";


$insert=mysqli_query($conn,"insert into listfac
						(sid1 ,sid2 ,sid3,sid4,name,email,designation,addr,gender,validity)
					values('$sid1','$sid2','$sid3','$sid4','$name','$email','$designation','$addr','$gender',1)");
  if($insert) {
	  header('Location:updated1.php');
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
<h2>Faculty Member Insert</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<span class="r">*	Required Fields </span><br>
  <br>
                  <label for="sid" id="preinput"> Id 	 </label> <br>
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
  <br>
                  <input type="text" name="sid4" maxlength="2" pattern="[0-9]{2}" size="2" title="2 digit code">
					<span class="r">*	<?php echo $sidErr;?> </span>
					<span class="r">	<?php echo $sidErr1;?> </span>
					<span class="r">	<?php echo $sidErr2;?> </span>
  <br>
                  <label for="name" id="preinput"> Name  </label> <br>
                  <input type="text" name="name" placeholder="Enter name" id="inputid">
					<span class="err">*	<?php echo $nameErr;?> </span>
  <br>
                  <label for="designation" id="preinput"> Designation  </label> <br>
                  <input type="text" name="designation" placeholder="Enter name" id="inputid">
					<span class="err">*	<?php echo $desErr;?> </span>
  <br>
                  <label for="gender" id="preinput"> Gender  </label> <br>
					<select name="gender">
						<option value="male" selected>Male</option>
						<option value="female">Female</option>
					</select>
  <br>
                  <label for="email" id="preinput"> Email  </label> <br>
                  <input type="email" name="email" placeholder="Enter email" id="inputid">
					<span class="err">*	<?php echo $emailErr;?> </span>
  <br>
                  <label for="addr" id="preinput"> Address  </label> <br>
                  <input type="text" name="addr" placeholder="Enter address" id="inputid">
					<span class="err">*	<?php echo $aErr;?> </span>
  <br>
  <hr>
                  <input type="submit" name="submit" value="Ok" id="inputid" >
  <br>

</form>
</div>
</body>
</html>
