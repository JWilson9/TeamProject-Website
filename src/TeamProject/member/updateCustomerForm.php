<?php

$con=mysqli_connect("localhost", "root", "", "ubervideo");

//check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}




$id = mysql_real_escape_string($_GET['id']);
$result = mysqli_query($con,"SELECT * FROM customer WHERE C_Id='$id'");
$row =  mysqli_fetch_array($result);

$C_Id = $row['C_Id'];
$C_Email = $row['C_Email'];
$C_Name = $row['C_Name'];
$C_Address = $row['C_Address'];
$C_Phone_No = $row['C_Phone_No'];

?>

<html>


<body>
	<div class="container-fluid">
<form action="updateCustomerSql.php" method="post" >

	ID: <br>
		<input type="text" name="C_Id" value="<?php echo $C_Id ;?>" readonly>
	<br>
		Name:<br>
		<input type="text" name="C_Email" value="<?php echo $C_Email;?>">
	
		
		<br>
		Email :<br>
		<input type="date" name="C_Name" value="<?php echo $C_Name;?>" >

	<br>
	<br>
		Address :<br>
		<input type="text" name="C_Address" value="<?php echo $C_Address;?>" >

	<br>
	<br>
		Phone Number :<br>
		<input type="text" name="C_Phone_No" value="<?php echo $C_Phone_No;?>" >

	<br>

		<button input type="submit" value="update">update</button>
			

	</form>




	
	`</div>
</body>
</html>


<?php
mysqli_close($con);
?>