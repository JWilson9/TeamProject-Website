<?php

$con=mysqli_connect("localhost", "root", "", "ubervideo");

//check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}

//mysqli_query($con,"UPDATE customer SET  C_Email='$_POST[C_Email]',C_Name='$_POST[C_Name]',C_Address='$_POST[C_Address]', C_Phone_No='$_POST[C_Phone_No]',  C_Password='$_POST[C_Password]'  ");

mysqli_query($con,"UPDATE customer SET  C_Email='$_POST[C_Email]',C_Name='$_POST[C_Name]',C_Address='$_POST[C_Address]', C_Phone_No='$_POST[C_Phone_No]' WHERE C_Id = '$_POST[C_Id]' ");

header("location:AddCustomers.php");


mysqli_close($con);
?>



