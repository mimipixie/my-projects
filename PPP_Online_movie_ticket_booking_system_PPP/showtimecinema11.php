

<div class="display">
<h3> Movie Showtime </h3>
</div>


<div class="display">
<?php



$sql="select * from schedule where cinema='$cinema' order by date,start,id asc";
$res=mysqli_query($conn,$sql);



if($res->num_rows >0){
	$ct=0;
	$date1="";
	$cinema1="";
	echo "<table>";
	echo "<tr>";
	echo "<th>Date</th>";
	echo "<th>Show Time</th>";
	echo "</tr>";
	while(($ob=mysqli_fetch_object($res)) && $ct<7){
		$id=$ob->id;
		$date=$ob->date;
		$showtime=$ob->showtime;
		$start=$ob->start;
		$price=$ob->price;
		$str= "bookticket11.php?id=$id";
		
		if($date1!=$date && $date>=date("Y-m-d") && $ct<7){
			if($ct>0){
				echo "</td>";
				echo "</tr>";
			}
			$ct++;
			$date1=$date;	
			echo "<tr>";
			echo "<td><h4> $date </h4></td>";
			echo "<td>";
					
		?>
		
		<a  href="<?php echo $str;?>" > <?php echo " || $start || ";?> </a>
		
		<?php
		
		}
		
	}
	echo "</table>";
}
?>
</div>






<?php include("11end.php");?>





