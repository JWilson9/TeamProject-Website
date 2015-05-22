<html>
	<!doctype html>
<html lang = "en">


<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<title>Uber Video</title>
	<link rel="stylesheet">
</head>




<body>

	<?php

	$con=mysqli_connect("localhost", "root", "", "ubervideo");

//check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}




$id = mysql_real_escape_string($_GET['id']);
$result = mysqli_query($con,"SELECT * FROM dvd WHERE DVD_Id='$id'");
$row =  mysqli_fetch_array($result);


session_start();
$_SESSION['DVD_Id'] = $id;

$update = mysqli_query($con,"UPDATE dvd
 SET In_Stock = In_Stock - 1 WHERE DVD_Id = '$id' ");


$userId = $row['DVD_Id'];
$title = $row['Title'];

$customer = mysqli_query($con,"SELECT * FROM customer WHERE C_Id='$id'");
$cust_row =  mysqli_fetch_array($customer);





?>

	<div style="height:90px;"	>
		<h2>
			<h1 style="text-align: center; display:inline-block;" >Uber-Vision</h1>
			<img align="right" height="150px" src="images/pic.jpg" class="img-rounded" style="display:inline-block;">
		</h2>
	</div>		

	
	<div >
		<nav class="bg-primary" style="display:block;  ">
			<ul style=" list-style-type: none;">
					<li style=" display:inline;" ><a style=" color: #FFFFFF;  font-size:larger; display:inline-block;  text-decoration: none; margin:15px;margin-right:100px; " href="ViewDVDs.php">View DVD's</a></li>
					<li style=" display:inline;" ><a style=" color: #FFFFFF;  font-size:larger; display:inline-block;  text-decoration: none; margin:15px; margin-right:100px; " href="ReserveDVD.php">Reserves</a></li>
					<li style=" display:inline;" ><a style=" color: #FFFFFF;  font-size:larger; display:inline-block;  text-decoration: none; margin:15px; margin-right:100px; " href="">Log out</a></li>
			</ul>
		</nav>

	</div>




<div class="container-fluid" style="width:300px; float:left; " >
		
		
	<h1 > Reserve</h1>

	<form action="AddReserveSql.php" method="post"  >
		
		

		Title:<br>
		<input type="text" name="Title" value="<?php echo $title;?>" readonly>
		<br>

		
	

	
	<br><br>

		<button type="submit" class="btn btn-primary" value="Submit">Submit</button>
	</form>
</div>




</body>



</html>