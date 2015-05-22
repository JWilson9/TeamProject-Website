<?php

$con=mysqli_connect("localhost", "root", "", "ubervideo");

//check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}

//mysqli_query($con,"UPDATE dvd SET  Title='$_POST[Title]',Date_of_Release='$_POST[Date_of_Release]',In_Stock='$_POST[In_Stock]' WHERE DVD_Id = '$_POST[userID]'");
mysqli_query($con,"UPDATE dvd SET  Title='$_POST[Title]',Date_of_Release='$_POST[Date_of_Release]', Genre='$_POST[Genre]',In_Stock='$_POST[In_Stock]' WHERE DVD_Id = '$_POST[userID]'");

header("location:AddDVDIndex.php");


mysqli_close($con);
?>



