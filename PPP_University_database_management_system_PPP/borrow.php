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
		text-align:center;
		font-size:30px;
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

if(isset($_GET["id"]))
{
		$bookkey1=$_GET["id"];
		echo "$bookkey1 <br>";
		
		$query1="select * from books where student='$userlib'";
		 
		 if($result=mysqli_query($connection, $query1))
{

if(mysqli_num_rows($result)>=3)
{
	echo "You Cannot Borrow more than 3 books at a time.";
}
else
{
	$query2="update books set student='$userlib',borrowed='1' where bookkey=$bookkey1";
	mysqli_query($connection, $query2);
	echo "Borrowed Successfuly!";

}

}

}
?>
</div>
</body>
</table>