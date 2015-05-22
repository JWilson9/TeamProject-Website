<?php

$con=mysqli_connect("localhost", "root", "", "ubervideo");

//check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}

mysqli_query($con,"UPDATE staff SET  S_Name='$_POST[S_Name]',S_Email='$_POST[S_Email]' WHERE S_id = '$_POST[S_id]'");

header("location:AddMembers.php");


mysqli_close($con);
?>



