<?php
$connect=mysqli_connect("localhost","root","","ubervideo");


if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




$id = mysql_real_escape_string($_GET['id']);
mysqli_query($connect,"DELETE FROM DVD WHERE DVD_Id ='$id'");

echo "DVD DELETED" ;


header("location:ADDDVDIndex.php");
mysqli_close($connect);


?>