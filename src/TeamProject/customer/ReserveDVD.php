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
			Uber-Video
			
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



<div class="container-fluid" >
			
	<h1 > List of Reserves </h1>

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
<th>Date Rented</th>
<th>Date due for return </th>
</tr>";

$email = $_SESSION["email"];
$C_Id = $_SESSION["C_Id"];
$result = mysqli_query($con, "SELECT * FROM Reservations
	                          WHERE C_Id = '$C_Id'
							  ");
//$test = mysqli_query($con, "SELECT COUNT(Title) FROM Reservations WHERE Title = 1");
/*
$countTitles="SELECT * FROM Reservations WHERE Title like Title";
$getCount=mysqli_query($con,$countTitles);
$countRentals=mysqli_num_rows($getCount);

if($countRentals > 3){
	echo"you cannot rent more than 3 movies of the same movies";
}*/

	while($row = mysqli_fetch_array($result))
	  {

		  echo "<tr>";
		  echo "<td>" . $row['Title'] . "</td>";
		  echo "<td>" . $row['dateAdded'] . "</td>";
	      echo "<td>" . $row['dateR'] . "</td>";
	      $dateR = $row['dateR'];
	      $Date1 = date("Y-m-d");
	      if($Date1 == $dateR){
		  	echo "<h3>".$row['Title']." is due in today</h3>";
		  }
		  if($Date1 > $dateR){
		  	echo "<h3>".$row['Title']." is overdue</h3>";
		  }
		  //echo('<td><a href="ClearReserve.php?id='.htmlentities($row[0]).'">Clear</a></td>');
		  echo "</tr>";	

	 
	  }

  
 echo "</table>";


//Store the name in the session
//$_SESSION['dateR'] = $dateR;






?>

</div>

</body>
<?php include '../includes/footer.php'; 
?>


</html>
<?php
}
?>