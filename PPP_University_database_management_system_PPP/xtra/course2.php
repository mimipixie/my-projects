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

$code="";
$credit="";
$section="";
$j=0;

$codeERR="";
$creditERR="";
$sectionERR="";



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
if(empty($_POST['code']))
	{
		$error++;
		$codeERR="You must Fillup";
	}
	
	else
	{
		$code=$_POST['code'];
	}
if(empty($_POST['credit']))
	{
		$error++;
		$creditERR="You must Fillup";
	}
	else if(($_POST['credit'])>4)
			{
		$error++;
		$creditERR="Credit must be 4 or less";
	}
	
	else
	{
		$credit=$_POST['credit'];
	}
if(empty($_POST['section']))
	{
		$error++;
		$sectionERR="You must Fillup";
	}
	
	else
	{
		$section=$_POST['section'];
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
$sql1="insert into listcrs values (DEFAULT,'".$_POST['code']."',  '".$_POST['credit']."', '".$_POST['section']."' )";
mysqli_query($connection, $sql1);	 
		 
		 
	$i=$_POST['section'];
    for($j=1; $j<=$i ; $j++)      
    {
		$sql2="insert into listsec values (DEFAULT, $j, '".$_POST['code']."', 0, 0, 0, 0 )";
			mysqli_query($connection, $sql2);
			header("Location:welcome2.php");
    
}	  
	}
}
	
	

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="POST">

<table align="center">


<tr>

<td>Code: </td>
	<td><input type="Text" Name="code" value="<?php if(isset($_POST['code'])) echo $_POST['code']; ?>" class="size"placeholder="code" style="border:2px solid green;"/><span class="Error"><?php echo $codeERR;?></span><span class="Error">*</span></td>
</tr>

<tr>

<td>Credit:</td>
	<td><input type="Text" Name="credit" value="<?php if(isset($_POST['credit'])) echo $_POST['credit']; ?>" class="size"placeholder="credit" style="border:2px solid green;"/><span class="Error"><?php echo $creditERR;?></span><span class="Error">*</span></td>
</tr>


<tr>

<td>No. of Section:</td>
	<td><input type="Text" Name="section" value="<?php if(isset($_POST['section'])) echo $_POST['section']; ?>" class="size"placeholder="section" style="border:2px solid green;"/><span class="Error"><?php echo $sectionERR;?></span><span class="Error">*</span></td>
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
