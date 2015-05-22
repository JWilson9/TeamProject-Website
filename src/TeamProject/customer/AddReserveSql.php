<?php
session_start();

$con=mysqli_connect("localhost","root","","ubervideo");
//check connection

$Title = $_POST['Title'];




if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysql_connect_error();
}

$C = $_SESSION['C_Id'];
//DateTime::setTime ( int $hour , int $minute [, int $second ] ) $hour = DateTime::getTime() + 2;

//$stop_date = date("Y-m-d", strtotime( date("Y-m-d") . ' + 1 day');
//$stop_date = date('Y-m-d ', strtotime($stop_date . ' + 1 day'));
//$stop_date = date('Y-m-d H:i:s', strtotime("Now()") + 86400);


//$Date = "2010-09-17";
//date('Y-m-d', strtotime($Date. ' + 2 days'));
$Date1 = date("Y-m-d");
//$Date2 = date('Y-m-d', strtotime($Date1 . " + 2 day"));
$Date2 = date('Y-m-d', strtotime($Date1 . " + 1 day"));



mysqli_query($con,"INSERT INTO Reservations (Title, C_Id, dateAdded, dateR) VALUES('$_POST[Title]', '$C', Now(), '$Date2'  )");
//mysqli_query($con,"INSERT INTO Reservations (dateAdded) VALUES(Now())");




header("location:ReserveDVD.php");


mysqli_close($con);


?>




