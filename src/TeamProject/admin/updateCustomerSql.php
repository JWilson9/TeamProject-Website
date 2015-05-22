<?php

$con=mysqli_connect("localhost", "root", "", "ubervideo");

//check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}

mysqli_query($con,"UPDATE customer SET  C_Email='$_POST[C_Email]',C_Name='$_POST[C_Name]',C_Address='$_POST[C_Address]', C_Phone_No='$_POST[C_Phone_No]',  C_Password='$_POST[C_Password]' WHERE C_Id = '$_POST[C_Id]' ");
//mysqli_query($con,"UPDATE staff SET  S_Name='$_POST[S_Name]',S_Email='$_POST[S_Email]' WHERE S_id = '$_POST[S_id]'");
header("location:AddCustomers.php");


mysqli_close($con);
?>



