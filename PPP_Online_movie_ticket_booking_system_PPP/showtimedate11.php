<?php include("11start.php");?>


<div class="display">
<h3> Showtime by Date </h3>
</div>


<div class="display">
<?php



$sql="select * from schedule order by date,cinema,start,id asc";
$res=mysqli_query($conn,$sql);



if($res->num_rows >0){
	$ct=0;
	$date1="";
	$cinema1="";
	while(($ob=mysqli_fetch_object($res)) && $ct<7){
		$id=$ob->id;
		$date=$ob->date;
		$showtime=$ob->showtime;
		$start=$ob->start;
		$cinema=$ob->cinema;
		$price=$ob->price;
		$str= "cinemainfo11.php?name=$cinema";
		
		if($date1!=$date && $date>=date("Y-m-d") && $ct<7){
			if($ct>0){
				echo "</td>";
				echo "</tr>";
				echo "</table>";
			}
			echo "<br>";
			$ct++;
			$date1=$date;	
			$cinema1="";
			$ctt=0;
			
			echo "<h3> $date<br> </h3>";
			
			echo "<table>";
			echo "<tr>";
			echo "<th>Movie Name</th>";
			echo "<th>Show Time</th>";
			echo "</tr>";
			
			
		if($cinema1!=$cinema){
			$cinema1=$cinema;
			if($ctt>0){
				echo "</td>";
				echo "</tr>";
			}
			$ctt++;
			?>
			<tr>
			<td><a  href="<?php echo $str;?>" > <?php echo $cinema;?> </a></td>
			<td>
			<?php
		
		}
		echo " || $start || ";
		}
		
		
		
		
	}
	
}
?>
</div>






<?php include("11end.php");?>





