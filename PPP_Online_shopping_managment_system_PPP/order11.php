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
	echo "<table>";

	echo "<tr>";
	echo "<th colspan=\"10\"><center>Bill</center></th>";
	echo "</tr>";

	echo "<tr>";
	echo "<th>#</th>";
	echo "<th>Product</th>";
	echo "<th>Type</th>";
	echo "<th>Catagory</th>";
	echo "<th>size</th>";
	echo "<th>price </th>";
	echo "<th>quantity</th>";
	echo "<th>total after discount</th>";
	echo "<th>vat</th>";
	echo "<th>total with vat</th>";
	echo "</tr>";
	
	$sum=0;
	while(($ob=mysqli_fetch_object($res))){
		$pname=$ob->product;
		$sql="select * from product where name='$pname'";
		$result=mysqli_query($conn,$sql);
		$row =mysqli_fetch_object($result);
		$uname=$_SESSION["userid"];
		$name=$row->name;
		$price=$row->price;
		$quantity=$row->quantity;
		$sale=$row->sale;
		if($quantity>0){
			$quan=$ob->quantity;
			$ct+=$quan;
			$price=$price- ($price* ($sale/100));
			$total=$price*$quan;
			$vat=$total*0.15;
			$totalwithvat=$total+$vat;
			$sql="insert into bill (user,product,price,quantity,total,vat,totalwithvat,paid) 
					values ('$uname','$name','$price','$quan','$total','$vat','$totalwithvat',0) ";
			$insert=mysqli_query($conn,$sql);
			$sql="update product set quantity= quantity-'$quan' where name='$name' ";
			$update=mysqli_query($conn,$sql);

			echo "<tr>";
				echo "<td> $ct </td>";
				echo "<td> $row->name </td>";
				echo "<td> $row->type </td>";
				echo "<td> $row->stype </td>";
				echo "<td> $row->size </td>";
				echo "<td> $row->price </td>";
				echo "<td> $quan </td>";
				echo "<td> $total </td>";
				echo "<td> $vat </td>";
				echo "<td> $totalwithvat </td>";
				$sum+=$totalwithvat;
			echo "</tr>";
		}
		$sql="delete from wishlist where product='$name' and user='$uname' ";
		$delete=mysqli_query($conn,$sql);

	}
	echo "<tr>";
	echo "<td colspan=\"10\">Total items $ct Pcs</td>";
	echo "</tr>";

	$ship=100;
	echo "<tr>";
	echo "<td colspan=\"10\">Shipping charge $ship BDT</td>";
	echo "</tr>";

	$sum+=$ship;
	echo "<tr>";
	echo "<td colspan=\"10\">Total price $sum BDT</td>";
	echo "</tr>";

	$sql="insert into payment (user,pay,paid) 
			values ('$uname','$sum',0) ";
	$insert=mysqli_query($conn,$sql);

		echo "</table>";
}else{
	echo "No items in cart";
}

include("dbclose11.php");
?>
</div>






</body>
</html>
