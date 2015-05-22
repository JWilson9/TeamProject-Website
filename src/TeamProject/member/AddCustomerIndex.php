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
		
	<body>
	<div class="container-fluid">
	
	<form action="AddCustomerIndex.php" method="post" >
		<h3>Search:<br></h3>
		<input type="text" name="sbox" >
		<br>
	<button type="submit" name="search" value="search">Search</button>
	</form>
	
	<?php
	
	$sbox = "";
	if(isset($_POST['search']))
	{
		$sbox = $_POST['sbox'];
	}
	?>

	
	<h1 > Add a Customer</h1>
		

	<form action="AddCustomerSql.php" method="post" >
		
		Name:<br>
		<input type="text" name="C_Name" >
		<br>
		Email:<br>
		<input type="text" name="C_Email" >
		<br>
		Address:<br>
		<input type="text" name="C_Address" >
		<br>
		Phone Number:<br>
		<input type="tel" name="C_Phone_No" >
		<br>
		Username:<br>
		<input type="text" name="C_Username" >
		<br>
		Password:<br>
		<input type="text" name="C_Password" >
		<br>
		
		<br>


		<button type="submit" class="btn btn-primary" value="Submit">Submit</button>
			

	</form>
</div>

</body>
</div>



<div class="container-fluid" style="float right; width:400px;">
			
	<h1 >Registered Members</h1>

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
<th>C_Id</th>
<th>C_Email</th>
<th>C_Name</th>
<th>C_Address</th>
<th>C_Phone_No</th>
<th>C_Username</th>
<th>C_Password</th>
</tr>";

	
	$result = mysqli_query($con, "SELECT * FROM customer WHERE c_name LIKE '%$sbox%'");
	while($row = mysqli_fetch_array($result))
	  {
	  echo "<tr>";
	  echo "<td>" . $row['C_Id'] . "</td>";
	  echo "<td>" . $row['C_Name'] . "</td>"; 
	  echo "<td>" . $row['C_Email'] . "</td>";
	  echo "<td>" . $row['C_Address'] . "</td>" ;
	  echo "<td>" . $row['C_Phone_No'] . "</td>" ;
	  echo "<td>" . $row['C_Username'] . "</td>" ;
	  echo "<td>" . $row['C_Password'] . "</td>" ;
	  echo('<td><a href="deleteCustomer.php?id='.htmlentities($row[0]).'">Delete Customer</a></td>');
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