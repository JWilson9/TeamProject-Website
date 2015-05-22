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

	<?php include '../includes/menu.php'; 
?>

	<div class="container-fluid" style="width:300px; float:left; " >
		
		
	<h1 > Add DVD's</h1>

	<form action="AddDVDSql.php" method="post"  >
		
		Title:<br>
		<input type="text" name="Title" >
		<br>
		
		Genre:<br>
		<input type="text" name="Genre" >
		<br>
		

		<br>
		Date of Relase :<br>
		<input type="date" name="Date_of_Release" >


	<br>
		In Stock :<br>
		<input type="test" name="In_Stock">
	<br><br>

		<button type="submit" class="btn btn-primary" value="Submit">Submit</button>

	</form>
</div>



<div class="container-fluid" style="float right; width:400px;">
			
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
<th>Delete</th>
<th>Update</th>
</tr>";


$result = mysqli_query($con, "SELECT * FROM dvd");
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Title'] . "</td>";
  echo "<td>" . $row['Genre'] . "</td>";
  echo "<td>" . $row['Date_of_Release'] . "</td>"; 
  echo "<td>" . $row['In_Stock'] . "</td>" ;
  echo('<td><a href="deleteDVD.php?id='.htmlentities($row[0]).'">Delete DVD</a></td>');
  echo('<td><a href="updateDVDForm.php?id='.htmlentities($row[0]).'">Update DVD</a></td>');
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