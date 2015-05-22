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
			<h1 style="text-align: center; display:inline-block; " >Uber Video</h1>
			<img align="right" height="150px" src="images/pic.jpg" class="img-rounded" style="display:inline-block;">
		</h2>
	</div>		

	
	<div style=" list-style-type: none;">
		<nav class="bg-primary" style="display:block;   ">
			<ul style=" list-style-type: none;">
					<li style=" display:inline;" ><a style=" color: #FFFFFF;  font-size:larger; display:inline-block;  text-decoration: none; margin:15px;margin-right:100px; " href="ViewDVDs.php">View DVD's</a></li>
					<li style=" display:inline;" ><a style=" color: #FFFFFF;  font-size:larger; display:inline-block;  text-decoration: none; margin:15px; margin-right:100px; " href="ReserveDVD.php">Reserves</a></li>
					<li style=" display:inline;" ><a style=" color: #FFFFFF;  font-size:larger; display:inline-block;  text-decoration: none; margin:15px; margin-right:100px; " href="">Log out</a></li>
			</ul>
		</nav>

	</div>

	


<div class="container-fluid"  width:400px;">
			
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


$result = mysqli_query($con, "SELECT * FROM dvd");
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