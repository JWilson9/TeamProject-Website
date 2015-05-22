<?php
$connect=mysqli_connect("localhost","root","","ubervideo");


if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




$id = mysql_real_escape_string($_GET['id']);
mysqli_query($connect,"DELETE FROM reservations WHERE id ='$id'");

echo "DVD DELETED" ;


header("location:ReserveDVD.php");
mysqli_close($connect);


?>