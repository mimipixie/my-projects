<?php include("11start.php");?>
<?php include("checklogin11.php");?>

<?php
$un=$_SESSION["userid"];
if(isset($_GET["y"])  ){
	$y=$_GET["y"];
	
	if($y==1)
	{
		$s=$_GET["s"];
		$sql="update users set paid=paid+'$s' WHERE userid = '$un'";
		$res=mysqli_query($conn,$sql);
		$sql="update cart set ord=1 WHERE un = '$un'";
		$res=mysqli_query($conn,$sql);
		
	}
	if($y==2){
		$tid=$_GET["tid"];


		$query = "delete from cart  WHERE tid = '$tid'";
		$result= mysqli_query($conn,$query);
		$query = "update ticket set booking=0 WHERE id = '$tid'";
		$result= mysqli_query($conn,$query);
	}
	if($y==3){
		$tid=$_GET["tid"];

		$sql="select * from ticket where id='$tid' ";
		$res=mysqli_query($conn,$sql);
		$ob=mysqli_fetch_object($res);
		$s=$ob->price;

		$query = "delete from cart  WHERE tid = '$tid'";
		$result= mysqli_query($conn,$query);
		$query = "update ticket set booking=0 WHERE id = '$tid'";
		$result= mysqli_query($conn,$query);
		$sql="update users set refund=refund+'$s' WHERE userid = '$un'";
		$res=mysqli_query($conn,$sql);
	}




}

?>

<div class="display">
<?php
$user=$_SESSION["userid"];
$sql="select * from cart where un='$user' ";
$res=mysqli_query($conn,$sql);
if($res->num_rows >0){
	$ct=0;
	echo "<table>";

	echo "<tr>";
	echo "<th></th>";
	echo "<th>TID</th>";
	echo "<th>Date</th>";
	echo "<th>Ticket Price</th>";
	echo "<th></th>";
	echo "</tr>";
	
	$sum=0;
	while(($ob=mysqli_fetch_object($res))){
		$ct++;
		$tid=$ob->tid;
		$price=$ob->price;
		$date=$ob->date;
		$ord=$ob->ord;
		
		
if($date <= date("Y-m-d")){
	$stop=1;
}else{$stop=0;};

		$str1="order11.php?y=2&tid=$tid";
		$str3="order11.php?y=3&tid=$tid";
		echo "<tr>";
			echo "<td> $ct </td>";  
			echo "<td> $tid </td>";  
			echo "<td> $date </td>";
			echo "<td> $price </td>";
				
			echo "<td>";
			
			if($ord==0 && $stop==0){
				?> <a href="<?php echo $str1;?>">Remove</a>	 
				<?php 
				$sum+=$price;
			
			}
			if($ord==0 && $stop==1){
				echo "Payable";	 
				$sum+=$price;
			
			}
			if($ord==1 && $stop==0){
				?> <a href="<?php echo $str3;?>">Cancel/Refund</a>	 
				<?php 
			
			}
			if($ord==1 && $stop==1){
				echo "Paid";	 
			
			}
			
			
			
			echo "</td>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<th colspan=\"5\"><center>Net Payable $sum BDT</center></th>";
	echo "</tr>";

	echo "</table>";
	
	if($sum>0)
		?>
<div class="w3-container">
  <a href="order11.php?y=1&s=$sum" class="w3-button w3-black">Pay</a>
</div>
		<?php
	
}else{
	echo "No items";
}

?>
</div>






</body>
</html>
