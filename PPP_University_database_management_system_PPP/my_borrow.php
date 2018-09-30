<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checklogin1.php");?>
<?php $userlib=$_SESSION["username"]; ?>
<!DOCTYPE html>


<html>
<head>
<style>
<?php include("s1.php");?>

body 
{

		background-color:#FF1493;
}
p
{
	
        color:black;
        font-size:26px;
		
}
table 
{
	border:2px solid black;
    border-spacing: 10px;
	align:center;
	margin:6% auto auto 15%;
	 background-color:#FF00FF;
	width:70%;
	height:500%;
    border-radius:20px;
	
  
}


td
{
	border-spacing: 10px;
	 text-align:center;
   font-size:20px;
   border:1px solid black;
   border-collapse: collapse;
   padding: 12px;
   
}
th
{
	border-spacing: 10px;
	text-align:center;
   font-size:20px;
   border:1px solid black;
   border-collapse: collapse;
   padding: 5px;
   
}



ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: #f3f3f3;
}

li {
    float: left;
}

li a {
    display: block;
    color: #666;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #ddd;
}

li a.active {
    color: white;
    background-color: #4CAF50;
}
</style>
</head>
<body>
<?php include("b1.php");?>
<div class="display">

<h1><center> My Borrow </center></h1>

<table>
<tr>  
<th>bookkey</th>
<th>name</th>  
<th>writer</th> 
<th>shelfId</th> 
<th>place</th> 
<th>category</th> 
<th>Give Back</th> 

</tr> 
<?php

    function Valid($Information)
	{
		$Information=trim($Information);
		$Information=stripcslashes($Information);
		$Information=htmlspecialchars($Information);
		return $Information;
	}	
	     $DATABASE="localhost";
		 $username="root";
		 $password="";
		 $dbname = "university";
		 $connection= mysqli_connect($DATABASE, $username, $password, $dbname);
		 if(!$connection)
		 {
			die("Connection failed: " . mysqli_connect_error());
			 
		 }
 
		 $query="select * from books where student='$userlib' " ;
		 
		  $Result=mysqli_query($connection,$query);

			  
			  if(mysqli_num_rows($Result)>0)
			  {
				  
				  while($row = mysqli_fetch_array($Result)) 
				  {
                  echo "<tr>";
				  echo "<td>";
				  echo $row['bookkey'];
				  $id1=$row['bookkey'];
				$str="give_back.php?id=$id1";
				
				  echo "</td>";

				  echo "<td>";
				  echo $row['name'];
				 echo "</td>";

				  echo "<td>";
				  echo $row['writer'];
				  echo "</td>";
				  
				  echo "<td>";
				  echo $row['shelfId'];
				  echo "</td>";
				  
				  echo "<td>";
				  echo $row['place'];
				  echo "</td>";
				  
				  echo "<td>";
				  echo $row['category'];
				  echo "</td>";
				 
         
				echo "<td>"; ?> <a href="<?php echo $str;?>"><img src='give_back.png'  width='80px' height='50px'/></a>	 <?php echo "</td>";
				echo "</td>";

				echo "</tr>";
				  
                  }
			  }

?>

</div>
</body>
</html>
