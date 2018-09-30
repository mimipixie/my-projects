<?php include("sessionstart11.php");?>
<?php include("cookielogin11.php");?>
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
<?php
if(isset($_GET["stype"]) || isset($_GET["id"])) {
	include("dbconnect11.php");
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		$query = "SELECT * FROM product WHERE id = '$id'";
		$res = mysqli_query($conn,$query) or die('Error, query failed');
		$ob=mysqli_fetch_object($res);
		$stype=$ob->stype;
	}else{$id=1;}
	if(isset($_GET["stype"])){
		$stype = $_GET["stype"];
	}
?>

<div class="display">
<?php
$query = "SELECT * FROM product WHERE stype = '$stype' and id >= '$id' order by id asc";
$res = mysqli_query($conn,$query) or die('Error, query failed');
if($res->num_rows >0){
	$ct=0;
	while(($ob=mysqli_fetch_object($res)) && $ct<20){
		$ct++;
		$id=$ob->id;
		$str= "productinfo11.php?id=$id";
?>
	  <div class="gallery">
		<a href="<?php echo $str;?>">
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ob->image).'" 
						style="width:170px;height:170px;border:0;"/>'; ?>
		</a>
		<div ><center><?php 
								echo " $ob->name ";
								echo " $ob->stype ";
								echo " $ob->price BDT ";	?></center></div>
	  </div>
<?php	
	}
if(isset($ob->id)) {
	$id=$ob->id;
	$str= "searchbytype11.php?id=$id";
?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<a  href="<?php echo $str;?>">
		<img src="images\more.png" style="width:60px;height:60px;border:0;"/>
	</a>
<?php	
}
}else{
	echo "No such items here";
}
?>
</div>



<?php
}
?>

</body>
</html>
