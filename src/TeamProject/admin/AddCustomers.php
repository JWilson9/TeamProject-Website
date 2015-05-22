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
		
		
	<h1 > Add Customer</h1>

	<form action="AddCustomerSql.php" method="post"  >
		
		Name:<br>
		<input type="text" name="C_Name" >
		<br>
		
		Address:<br>
		<input type="text" name="C_Address" >
		<br>

		Phone Number:<br>
		<input type="text" name="C_Phone_Number" >
		<br>

		Password:<br>
		<input type="text" name="C_Password" >
		<br>

		<br>
		Email<br>
		<input type="text" name="C_Email" >


		<button type="submit" class="btn btn-primary" value="Submit">Submit</button>

	</form>
</div>



<div class="container-fluid" style="float right; width:400px;">
			
	<h1 > List of Customer's </h1>

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
<th>Email</th>
<th>Name</th>
<th>Adress</th>
<th>Phone Number</th>
<th>Delete</th>
<th>Update</th>
</tr>";


$result = mysqli_query($con, "SELECT * FROM customer");
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['C_Email'] . "</td>";
  echo "<td>" . $row['C_Name'] . "</td>";
  echo "<td>" . $row['C_Address'] . "</td>";
  echo "<td>" . $row['C_Phone_No'] . "</td>";
  echo('<td><a href="deleteCustomer.php?id='.htmlentities($row[0]).'">Delete Customer</a></td>');
  echo('<td><a href="updateCustomerForm.php?id='.htmlentities($row[0]).'">Update Customer</a></td>');
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