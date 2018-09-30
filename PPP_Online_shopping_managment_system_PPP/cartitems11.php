<?php include("sessionstart11.php");?>
<?php include("cookielogin11.php");?>
<?php include("checklogin11.php");?>
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



<div class="display">
<?php
$user=$_SESSION["userid"];
$sql="select * from wishlist where user='$user' and cart=1 order by time desc";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	$ctt=0;
	echo "<table>";

	echo "<tr>";
	echo "<th colspan=\"10\"><center>Cart Items</center></th>";
	echo "</tr>";

	echo "<tr>";
	echo "<th></th>";
	echo "<th>Product</th>";
	echo "<th>Type</th>";
	echo "<th>stype</th>";
	echo "<th>size</th>";
	echo "<th>price</th>";
	echo "<th>available pcs</th>";
	echo "<th>in cart</th>";
	echo "<th>change quantity</th>";
	echo "<th></th>";
	echo "</tr>";
	
	$sum=0;
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
		$pname=$ob->product;
		$quan=$ob->quantity;
		$ctt+=$quan;
		$sql="select * from product where name='$pname'";
		$result=mysqli_query($conn,$sql);
		$row =mysqli_fetch_object($result);
		$name=$row->name;
		$quantity=$row->quantity;
		$str="cutcart11.php?name=$name";
		$str1="cartquan11.php";
		if($quantity>0){
		echo "<tr>";
			echo "<td> $ct </td>";
			echo "<td> $row->name </td>";
			echo "<td> $row->type </td>";
			echo "<td> $row->stype </td>";
			echo "<td> $row->size </td>";
			echo "<td> $row->price </td>";
			echo "<td> $quantity </td>";
			echo "<td> $quan </td>";
			$pr=$row->price;
			$sum+=($pr*$quan);?>
			<td>
			<form name="f1" action="<?php echo $str1; ?>" method="GET">
					<input type="text" name="q"  maxlength="4" size="4" >
					<input type="hidden" name="name" value="<?php echo $name;?>"  >
					<input type="hidden" name="qq" value="<?php echo $quantity;?>"  >
					<input type="submit" name="s1" value=""  >
			</form>
			</td>
	<?php
			echo "<td>"; ?> <a href="<?php echo $str;?>">Remove</a>	 <?php echo "</td>";
		echo "</tr>";
		}else{
			$query="delete from wishlist  where user='$uname' and product='$pname' ";
			$result= mysqli_query($conn,$query);
		}
	}
	echo "<tr>";
	echo "<td colspan=\"10\">Total items $ctt</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td colspan=\"10\">Total price $sum</td>";
	echo "</tr>";

	echo "</table>";
}else{
	echo "No items in cart";
}

include("dbclose11.php");
?>
</div>






</body>
</html>
