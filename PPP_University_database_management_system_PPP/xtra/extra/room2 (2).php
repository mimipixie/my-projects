<!DOCTYPE html>

<?php
session_start();
?>

<html>
<head>
<style>

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

<h1 align="center"> Course List </h1>

			 
<?php

$seats="";

$seatsERR="";




$error=0;


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	
    function Valid($Information)
	{
		$Information=trim($Information);
		$Information=stripcslashes($Information);
		$Information=htmlspecialchars($Information);
		return $Information;
	}
if(empty($_POST['seats']))
	{
		$error++;
		$seatsERR="You must Fillup";
	}
		else if(($_POST['seats'])>40 || 25>($_POST['seats']))
			{
		$error++;
		$seatsERR="seat number must be in between 25 to 40!";
	}
	else
	{
		$seats=$_POST['seats'];
	}
if(empty($_POST['Confirm']))
	{
		$error++;
		$ConfirmERR="You Should Confirm";
	}
	
	else
	{
		$Confirm=$_POST['Confirm'];
	}

if($error==0)
	{
		
		
	     $DATABASE="localhost";
		 $username="root";
		 $password="";
		 $dbname = "project";
		 $connection= mysqli_connect($DATABASE, $username, $password, $dbname);
		 if(!$connection)
		 {
			die("Connection failed: " . mysqli_connect_error());
			 
		 }
$sql1="insert into listroom values (DEFAULT,'".$_POST['seats']."' )";
mysqli_query($connection, $sql1);
header("Location:welcome2.php");	 
	}
}
	
	

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="POST">

<table align="center">


<tr>

<td>Number of Seats: </td>
	<td><input type="Text" Name="seats" value="<?php if(isset($_POST['seats'])) echo $_POST['seats']; ?>" class="size"placeholder="seats" style="border:2px solid green;"/><span class="Error"><?php echo $seatsERR;?></span><span class="Error">*</span></td>
</tr>


<tr> 
<td> <input type="checkbox" Value="Confirm" Name="Confirm"/>  I Confirm </span><span class="Error">*</span></td>
 </tr>

<tr>
    <td><input type ="submit" value="Submit" style="border:2px solid green;">
	</td>		
</tr>		

	</table>
</form>
</body>
</html>
