<?php include("sessionstart1.php");?>
<?php include("dbconnect1.php");?>
<?php include("cookielogin1.php");?>
<?php include("checkadmin1.php");?>
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

<h1 align="center"> Grade Submissiom </h1>

			 
<?php
         $DATABASE="localhost";
		 $username="root";
		 $password="";
		 $dbname = "university";
		 $connection= mysqli_connect($DATABASE, $username, $password, $dbname);
		 if(!$connection)
		 {
			die("Connection failed: " . mysqli_connect_error());
			 
		 }
    
 
    $select = mysqli_query($connection, "SELECT * FROM grdsub ");
    $num_row = mysqli_num_rows($select);

    
    if( $num_row>0 ) {
?>
    if($grade>3.8){
    
    $scholarship_typ = "Merit";
    }
    if($grade>3.6){
    
   $scholarship_typ = "Dean List";
    }
    if($grade>3.5){
    
    $scholarship_typ = "Medha Lalon";
    }
          

      <table>
          <tr>
              <th>Student id</th>
              <th>Scholarship</th>
              
              
          </tr>
          <?php while( $userrow = mysqli_fetch_array($select) ) { ?>
          <tr>
              <td><?php echo $userrow['sid']; ?></td>
              <td><?php echo $userrow['scholarship_typ']; ?></td>
              
              
                     
                           
         </tr>
          <?php } ?>
      </table>
    
    
<?php } ?>


    
   