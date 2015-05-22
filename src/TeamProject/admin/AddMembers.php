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

	<?php include '../includes/navAdmin.php'; 
?>

	<div class="container-fluid" style="width:300px; float:left; " >
		
		
	<h1 > Add Member</h1>

	<form action="AddMemberSql.php" method="post"  >
		
		Name:<br>
		<input type="text" name="S_Name" >
		<br>
		
		Password:<br>
		<input type="text" name="S_Password" >
		<br>

		<br>
		Email<br>
		<input type="text" name="S_Email" >


		<button type="submit" class="btn btn-primary" value="Submit">Submit</button>

	</form>
</div>



<div class="container-fluid" style="float right; width:400px;">
			
	<h1 > List of Staff </h1>

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
<th>Name</th>
<th>Email</th>
<th>Delete</th>
<th>Update</th>
</tr>";


$result = mysqli_query($con, "SELECT * FROM staff");
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['S_Name'] . "</td>";
  echo "<td>" . $row['S_Email'] . "</td>";
  echo('<td><a href="deleteMember.php?id='.htmlentities($row[0]).'">Delete Memeber</a></td>');
  echo('<td><a href="updateMemberForm.php?id='.htmlentities($row[0]).'">Update Member</a></td>');
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