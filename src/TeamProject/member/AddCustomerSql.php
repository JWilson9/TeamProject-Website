<?php

$con=mysqli_connect("localhost","root","","ubervideo");
//check connection

$C_Email = $_POST['C_Email'];
$C_Name = $_POST['C_Name'];
$C_Address = $_POST['C_Address'];
$C_Phone_No = $_POST['C_Phone_Number'];
$C_password = $_POST['C_Password'];





if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysql_connect_error();
}





if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysql_connect_error();
}

//check to see if all fields are entered
if (empty($C_Email) || empty($C_Name) || empty($C_Address) || empty($C_Phone_No) || empty($C_password)){
	die('complete all fields');
}else{



mysqli_query($con,"INSERT INTO customer (C_Email, C_Name, C_Address, C_Phone_No, C_Password ) VALUES('$_POST[C_Email]',  '$_POST[C_Name]',  '$_POST[C_Address]',  '$_POST[C_Phone_Number]',  '$_POST[C_Password]')");
}

header("location:AddCustomers.php");


mysqli_close($con);


?>




