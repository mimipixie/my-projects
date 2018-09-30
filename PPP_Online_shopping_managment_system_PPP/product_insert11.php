<?php include("sessionstart11.php");?>
<?php include("cookielogin11.php");?>
<?php include("checkadmin11.php");?>

<?php

$name = $gender  =$age = $type =$stype =  $size = $quantity =$sale= $price = "";
$Err = $Err1 = $Err2 = $Err3 = $Err4 = $slErr =$slErr1= "";
$goto=1;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($_POST)) {
	
  if (empty($_POST["name"])) {
    $Err = "Product name is required";
	$goto=0;
  }  else {
	$conn = new mysqli("localhost", "root","", "mim");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$name = test_input($_POST["name"]);
	$result=mysqli_query($conn,"select * from product where name='$name'");
	if($result->num_rows > 0 ) {    
		$Err1= "Product name already exists. Try new one";
		$goto=0;
	}
	mysqli_close($conn);
  }
  
  if (empty($_POST["price"])) {
    $Err2 = "Price is required";
	$goto=0;
  } else{
    $price = test_input($_POST["price"]);
	}
  
	if(empty($_POST["sale"])){
		$sale=0;
	}else{
		if($_POST["sale"]<0 || $_POST["sale"]>75){
			$slErr1 = "Sale is between 0 and 75 ";
			$goto=0;
		}else{
			$sale = test_input($_POST["sale"]);
		}

	}


  if (empty($_POST["quantity"])) {
    $Err3 = "Quantity is required";
	$goto=0;
  } else{
    $quantity = test_input($_POST["quantity"]);
  }
  
  
}else{
	$goto=0;
}
  
if($goto==1){

$gender  = $_POST["gender"];
$age =$_POST["age"]; 
$type =$_POST["type"];
$stype = $_POST["stype"]; 
$size =$_POST["size"]; 

$tmpName  = $_FILES["image"]["tmp_name"];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

$conn= new mysqli("localhost","root","","mim");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "INSERT INTO product ( name,gender,age,type,stype,size,price,quantity,sale,rate,image )
		VALUES('$name','$gender','$age','$type','$stype','$size','$price','$quantity','$sale',0.0,'$content' )";

mysqli_query($conn,$query) or die('Error, query failed'); 
mysqli_close($conn);
echo "<br>File  uploaded<br>";

header('Location:dbupdated11.php');

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

<h2>Product Insert</h2> <br>
  <hr>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

	<label for="n"> Product Name  </label> 
	<input type="text" name="name" id="n" <?php if(isset($_POST["name"])){ ?> 
				value="<?php echo $_POST["name"]; ?>" <?php } ?> >
	<span class="r">*	<?php echo $Err; ?> </span>
	<span class="r">	<?php echo $Err1; ?> </span>
  <br>

	<label for="r1"> Gender	: </label> 
	<input type="radio" name="gender" id="r1" value="male" checked> Male
	<input type="radio" name="gender" id="r1" value="female"> Female<br>

	<label for="r4"> Age Range	: </label> 
	<input type="radio" name="age" id="r4" value="children" checked> 12 & below
	<input type="radio" name="age" id="r4" value="middle"> Others <br>


	<label for="r5"> Type	: </label> 
	<input type="radio" name="type" id="r5" value="cloths" checked> Cloths
	<input type="radio" name="type" id="r5" value="footwear"> Footwear
	<input type="radio" name="type" id="r5" value="accessories"> Accessories <br>
	<label for="r2"> Sub-type	: </label> <br>
	<input type="radio" name="stype" id="r2" value="shirt" checked> Shirt
	<input type="radio" name="stype" id="r2" value="tshirt"> T-shirt
	<input type="radio" name="stype" id="r2" value="trousers"> Trousers
	<input type="radio" name="stype" id="r2" value="jeans"> Jeans
	<input type="radio" name="stype" id="r2" value="top"> Top<br>
	<input type="radio" name="stype" id="r2" value="flat"> Flat
	<input type="radio" name="stype" id="r2" value="wedge"> Wedge
	<input type="radio" name="stype" id="r2" value="heel"> Heel
	<input type="radio" name="stype" id="r2" value="boot"> Boot<br>
	<input type="radio" name="stype" id="r2" value="wristwatch"> Wrist-watch
	<input type="radio" name="stype" id="r2" value="sunglasses"> SunGlasses 
	<input type="radio" name="stype" id="r2" value="glasses"> Glasses
	<input type="radio" name="stype" id="r2" value="handbag"> Hand Bags
	<input type="radio" name="stype" id="r2" value="bag"> Bags<br>


	<label for="r3"> Size	: </label> 
	<input type="radio" name="size" id="r3" value="S" checked> S
	<input type="radio" name="size" id="r3" value="M"> M
	<input type="radio" name="size" id="r3" value="L"> L
	<input type="radio" name="size" id="r3" value="XL"> XL
	<input type="radio" name="size" id="r3" value="XXL"> XXL
	<input type="radio" name="size" id="r3" value="XXXL">XXXL<br> 

	
	
    <label for="p"> Price :  </label> 
    <input type="text" name="price" id="p" <?php if(isset($_POST["price"])){ ?> 
				value="<?php echo $_POST["price"]; ?>" <?php } ?> >
	<span class="r">*	<?php echo $Err2; ?> </span><br>

    <label for="p1"> Sale :  </label> 
    <input type="text" name="sale" id="p1" <?php if(isset($_POST["sale"])){ ?> 
				value="<?php echo $_POST["sale"]; ?>" <?php } ?> >
	<span class="r">	<?php echo $slErr1; ?> </span><br>

	
	<label for="q"> Quantity :  </label> 
	<input type="text" name="quantity" id="q" <?php if(isset($_POST["quantity"])){ ?>
					value="<?php echo $_POST["quantity"]; ?>" <?php } ?> >
	<span class="r">*	<?php echo $Err3; ?> </span><br>

	
    <label for="image"> Product Image :  </label> 
    <input type="file" name="image" id="image"  >

	<br>
  <hr>
	<input type="submit" name="submit4" value="Insert"  >
  <br>

</form>
</div>
</body>
</html>
