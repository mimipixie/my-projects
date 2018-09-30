<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkadmin1.php");?>
<?php


$id = $cr = $dep = $code = $name =$designation = $sid1 = $sid2 =  $sid3 =  $sid4 = $gender =
			$email= $addr= "";
$crErr = $idErr = $pwErr = $pwErr1 = $pwErr2 = $pwErr3 = $aErr  = $emailErr 
		= $nameErr= $nameErr1 =$codeErr=$codeErr1 = $typeErr =$sidErr = $sidErr1 =  $sidErr2 =  "";
$gotoEm=0;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
	
  if (empty($_POST["cr"])) {
    $crErr = "Credit is required";
	$gotoEm=1;
  }  else {
	$cr = test_input($_POST["cr"]);
  }
  
  if (empty($_POST["name"])) {
    $nameErr = "name is required";
	$gotoEm=1;
  }  else {
	$name = test_input($_POST["name"]);
	$result=mysqli_query($conn,"select * from listdep where name='$name' ");
	if($result->num_rows > 0 ) {
		$nameErr1= "name is in use. Try new one";
		$gotoEm=1;
	} 
  }
  
  if (empty($_POST["code"])) {
    $codeErr = "code is required";
	$gotoEm=1;
  }  else {
	$code = test_input($_POST["code"]);
	$result=mysqli_query($conn,"select * from listdep where code='$code' ");
	if($result->num_rows > 0 ) {
		$codeErr1= "Code is in use. Try new one";
		$gotoEm=1;
	} 
  }
  

} else{ $gotoEm=1;
}
  
if($gotoEm==0){

$dep=$_POST["dep"];
$insert=mysqli_query($conn,"insert into listcrs
						(credits,name,code,dept)
					values('$cr','$name','$code','$dep')");
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
<h2>Add Course</h2> <br>
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<span class="r">*	Required Fields </span><br>
  <br>  <br>
                  <label for="name" id="preinput"> Name  </label> <br>
                  <input type="text" name="name" placeholder="Enter name" id="inputid">
					<span class="err">*	<?php echo $nameErr;?> </span>
					<span class="err">	<?php echo $nameErr1;?> </span>
  <br>
                  <label for="code" id="preinput"> Code Name  </label> <br>
                  <input type="text" name="code" maxlength="6" pattern="[A-Z0-9]{6}" >
					<span class="err">*	<?php echo $codeErr;?> </span>
					<span class="err">	<?php echo $codeErr1;?> </span>
  <br>
                  <label for="cr" id="preinput"> Credits  </label> <br>
                  <input type="text" name="cr" >
					<span class="err">*	<?php echo $crErr;?> </span>
  <br>
                  <label for="dep" id="preinput"> Dept  </label> <br>
				  <select name="dep">
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
  <hr>
                  <input type="submit" name="submit" value="Ok" id="inputid" >
  <br>

</form>
</div>
</body>
</html>
