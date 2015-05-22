<?php
session_start();

$connect=mysqli_connect("localhost","root","","ubervideo");


if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$num = 1;



$id = mysql_real_escape_string($_GET['id']);
//$DVD_id = mysql_real_escape_string($_GET['DVD_Id']);
mysqli_query($connect,"DELETE FROM Reservations WHERE id ='$id'");





/*
$Custsql="SELECT * FROM customer WHERE C_Email='$email' and C_Password='$password'";
	$CustResult=mysqli_query($connect,$Custsql);
	// Mysql_num_row is counting table row
	$Custcount=mysqli_num_rows($CustResult);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($Custcount==1){
		// Register $username, $password and redirect to file "login_success.php"
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;

	    $row = mysqli_fetch_array($CustResult);
        $C_Id = $row['C_Id'];
        session_start();
	    //Store the name in the session
	    $_SESSION['C_Id'] = $C_Id;*/








$test = $_SESSION['DVD_Id'] ;


$update = mysqli_query($connect,"UPDATE dvd
 SET In_Stock = In_Stock + 1 WHERE DVD_Id = '$test' ");

//echo $DVD_Id;


header("location:ReserveDVD.php");


mysqli_close($connect);


?>