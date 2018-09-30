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

$id=$_SESSION["userid"];
$select = mysqli_query($conn, "SELECT userid,name,email,type FROM users where userid='$id' ");

if( $select->num_rows > 0 ) {
echo "<table>";

echo "<tr>";
echo "<th colspan=\"2\"><center>Profile</center></th>";
echo "</tr>";


while($row = $select->fetch_assoc()){
echo "<tr>";
echo "<th>ID</th>";
echo "<td> $row[userid] </td>";
echo "</tr>";
echo "<tr>";
echo "<th>NAME</th>";
echo "<td> $row[name] </td>";
echo "</tr>";
echo "<tr>";
echo "<th>EMAIL</th>";
echo "<td> $row[email] </td>";
echo "</tr>";
echo "<tr>";
echo "<th>USER TYPE</th>";
echo "<td> $row[type] </td>";
echo "</tr>";

}

echo "<tr>";
echo "<td colspan=\"2\" class=\"r\"><a href=\"home11.php\" >Go Home</a></td>";
echo "</tr>";


echo "</table>";
}
include("dbclose11.php");

?>
</div>

</body>
</html>
