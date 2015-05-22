<?php

$con=mysqli_connect("localhost","root","","ubervideo");
//check connection

$Title = $_POST['Title'];
$Genre = $_POST['Genre'];
$Date_of_Release = $_POST['Date_of_Release'];
$In_Stock = $_POST['In_Stock'];



if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysql_connect_error();
}

//check to see if all fields are entered
if (empty($Title) || empty($Genre) || empty($Date_of_Release) || empty($In_Stock)){
	die('complete all fields');
}else{

	mysqli_query($con,"INSERT INTO dvd (Title, Genre, Date_of_Release, In_Stock) VALUES('$_POST[Title]', '$_POST[Genre]', '$_POST[Date_of_Release]','$_POST[In_Stock]')");
}

header("location:AddDVDIndex.php");


mysqli_close($con);


?>




