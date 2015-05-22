<?php

$con=mysqli_connect("localhost","root","","ubervideo");
//check connection

$Title = $_POST['S_Name'];
$Genre = $_POST['S_Password'];
$In_Stock = $_POST['S_Email'];



if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysql_connect_error();
}

if (empty($Title) || empty($Genre) || empty($In_Stock) ){
	die('complete all fields');
}else{

mysqli_query($con,"INSERT INTO staff (S_Name, S_Password, S_Email) VALUES('$_POST[S_Name]',  '$_POST[S_Password]',  '$_POST[S_Email]')");
}

header("location:AddMembers.php");


mysqli_close($con);


?>




