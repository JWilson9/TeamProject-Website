<?php
session_start();
if(!isset($_SESSION["email"])){
	header("location:http://localhost/TeamProject/");
} else {
?>
<html>
	<!doctype html>
<html lang = "en">


<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<title>Uber Video</title>
	<link rel="stylesheet">
</head>




<body>

	<div style="height:90px;"	>
		<h2>
			<h1 style="text-align: center; display:inline-block;" >Uber-Vision</h1>
			<img align="right" height="150px" src="../images/pic.jpg" class="img-rounded" style="display:inline-block;">
		</h2>
	</div>		

	
	<div >
		<nav class="bg-primary" style="display:block;  ">
			<ul style=" list-style-type: none;">
					<li style=" display:inline;" ><a style=" color: #FFFFFF;  font-size:larger; display:inline-block;  text-decoration: none; margin:15px;margin-right:100px; " href="ViewDVDs.php">View DVD's</a></li>
					<li style=" display:inline;" ><a style=" color: #FFFFFF;  font-size:larger; display:inline-block;  text-decoration: none; margin:15px; margin-right:100px; " href="ReserveDVD.php">Reserves</a></li>
					<li style=" display:inline;" ><a style=" color: #FFFFFF;  font-size:larger; display:inline-block;  text-decoration: none; margin:15px; margin-right:100px; " href="logout.php">Log out</a></li>
					<li style=" display:inline;" style=" color: #FFFFFF;  display:inline-block;  text-decoration: none; margin:15px; margin-right:100px; "><?php echo $_SESSION['email'];?></li>
			</ul>
		</nav>

	</div>


<div class="container-fluid"  >
			
	<h1 > List of DVD's </h1>

	<?php

$con=mysqli_connect("localhost","root","","ubervideo");
//check connection

if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysql_connect_error();
}




echo "<table class='table table-hover>'";
echo "
<tr>
<th>Title</th>
<th>Genre</th>
<th>Date of Release</th>
<th>In stock</th>
<th>Reserve</th>

</tr>";


//$sql="SELECT * FROM staff WHERE S_Email='$email' and S_Password='$password'";
$num_stock = 0;
//$result = mysqli_query($con, "SELECT * FROM dvd ");
$result = mysqli_query($con, "SELECT * FROM dvd WHERE In_Stock>'$num_stock'");
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Title'] . "</td>";
  echo "<td>" . $row['Genre'] . "</td>";
  echo "<td>" . $row['Date_of_Release'] . "</td>"; 	
  echo "<td>" . $row['In_Stock'] . "</td>" ;
  echo('<td><a href="ReserveForm.php?id='.htmlentities($row[0]).'">Reserve DVD</a></td>');
  echo "</tr>";
  }
  
 echo "</table>";

?>

</div>

</body>
<footer class="bg-primary" style="float:bottom; margin-top:100px; height:100px;">
	James Wilson DT211-3
</footer>


</html>
<?php
}
?>