<?php
$connect=mysqli_connect("localhost","root","","ubervideo");


if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




$id = mysql_real_escape_string($_GET['id']);
mysqli_query($connect,"DELETE FROM staff WHERE S_id ='$id'");



header("location:AddMembers.php");
mysqli_close($connect);


?>