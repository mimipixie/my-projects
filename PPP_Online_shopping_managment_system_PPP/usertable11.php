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

$select = mysqli_query($conn, "SELECT userid,name,email,type FROM users where type='user' order by id asc");

echo "<table>";

echo "<tr>";
echo "<th colspan=\"5\"><center>Users</center></th>";
echo "</tr>";

echo "<tr>";
echo "<th>ID</th>";
echo "<th>NAME</th>";
echo "<th>EMAIL</th>";
echo "<th>USER TYPE</th>";
echo "<th>ACTIONS</th>";
echo "</tr>";

if( $select->num_rows > 0 ) {
while($row = $select->fetch_assoc()){
echo "<tr>";
echo "<td> $row[userid] </td>";
echo "<td> $row[name] </td>";
echo "<td> $row[email] </td>";
echo "<td> $row[type] </td>";
echo "<td></td>";
echo "</tr>";
}

} else{
	echo "<tr>";
	echo "<td colspan=\"5\"><center>No users</center></td>";
	echo "</tr>";
}
echo "<tr>";
echo "<td colspan=\"5\" class=\"r\"><a href=\"home11.php\" >Go Home</a></td>";
echo "</tr>";


echo "</table>";

?>
</div>

</body>
</html>
