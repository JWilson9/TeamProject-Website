
<html>
	<!doctype html>
<html lang = "en">


<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<title>Uber Video</title>
	<link rel="stylesheet">
</head>




<body>

	<?php include 'includes/homePageNav.php'; 
?>

	



<div class="container-fluid" style="width:300px; margin-right:100px;float:left; " >
		
		<h3> List of DVD's </h3>
		
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
<th>In stock</th>

</tr>";


$result = mysqli_query($con, "SELECT * FROM dvd");
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Title'] . "</td>";
  echo "<td>" . $row['Genre'] . "</td>";
  echo "<td>" . $row['In_Stock'] . "</td>" ;
  echo "</tr>";
  }
  


 echo "</table>";

?>
</div>



<div class="container-fluid" style="float right; width:400px;">
			
	<h3> Latest Releases</h3>

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
<th>Date Released</th>
<th>In stock</th>
</tr>";

$counter=0;
$result = mysqli_query($con, "SELECT * FROM DVD ORDER BY Date_of_Release DESC  ");


while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Title'] . "</td>";
  echo "<td>" . $row['Date_of_Release'] . "</td>"; 
  echo "<td>" . $row['In_Stock'] . "</td>" ;
  echo "</tr>";
  

  }
 

 echo "</table>";
 // while($row = mysqli_fetch_array($result)){
 // 	$counter++;
  //}

?>

</div>

</body>
<footer class="bg-primary" style="float:bottom; margin-top:100px; height:100px;">
	Team K 
	Email: teamk@gmail.com
	<br>
	Please visit us in store for any issues
</footer>


</html>