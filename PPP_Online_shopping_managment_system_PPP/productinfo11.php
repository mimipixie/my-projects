<?php include("sessionstart11.php"); ?>
<?php include("cookielogin11.php");?>
<?php include("addlist11.php");?>
<?php include("cutlist11.php");?>

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
<?php
if(isset($_GET["id"])){
	$_SESSION["product"]=$_GET["id"];
}
if(isset($_SESSION["product"])) {

$id    = $_SESSION["product"];
$query = "SELECT * FROM product WHERE id = '$id'";

$result = mysqli_query($conn,$query) or die('Error, query failed');
$ob=mysqli_fetch_object($result);

?>

<div class="displayprod">
<?php
		$id=$ob->id;
		$str= "download11.php?id=$id";
?>
	<div style="width:400px;">
		<a target="_blank" href="<?php echo $str;?>">
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->image).'" 
						style="width:300px;height:400px;border:0;"/>'; ?>
		</a>
	</div >
	<div>
<?php 
		echo "<br> <br>";
		echo " Product : $ob->name <br>";
		echo " Catagory : $ob->stype <br>";
		echo " Size : $ob->size <br>";
		echo " Price : $ob->price BDT <br>";
		if($ob->sale >0){
			echo " Discount : $ob->sale % <br>";
		}else{
			echo " Discount : No Discount<br>";
		}
		if($ob->quantity >0){
			echo " Available products : $ob->quantity Pcs <br>";
		}else{ ?>
			<img src="images\sold.png" style="width:180px;height:180px;border:0;"/> <br>
		<?php }
$t=0;
if(isset($_SESSION["userid"]) && $ob->quantity >0){
	$userid=$_SESSION["userid"];
	$product=$ob->name;
	$query=" select * from wishlist where user='$userid' and product='$product' and cart=1";
	$result = mysqli_query($conn,$query) or die('Error, query failed');
	$ob=mysqli_fetch_object($result);
	if(isset($ob->user)){
		$t=1;
	}else{
		$t=2;
	}
}
?>
		<br>
<?php if($t==2){	?>		
		<form name="s1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<button type="submit" name="ss11" value="submit" >
				<img src="images\cart.png" style="width:180px;height:70px;border:0;"/>
				</button>
		</form>
		
<?php }else if($t==1){	?>		
		<form name="s2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<button type="submit" name="ss22"  value="submit">
				<img src="images\cutcart.jpg" style="width:180px;height:70px;border:0;"/>
				</button>
		</form>
<?php }	?>		
</div>

<?php	
include("dbclose11.php");
}
?>

</body>
</html>


