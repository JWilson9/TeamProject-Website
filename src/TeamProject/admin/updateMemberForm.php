<?php

$con=mysqli_connect("localhost", "root", "", "ubervideo");

//check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}




$id = mysql_real_escape_string($_GET['id']);
$result = mysqli_query($con,"SELECT * FROM staff WHERE S_id='$id'");
$row =  mysqli_fetch_array($result);

$S_id = $row['S_id'];
$S_Name = $row['S_Name'];
$S_Email = $row['S_Email'];
?>

<html>


<body>
	<div class="container-fluid">
<form action="updateMemberSql.php" method="post" >

	ID: <br>
		<input type="text" name="S_id" value="<?php echo $S_id ;?>" readonly>
	<br>
		Name:<br>
		<input type="text" name="S_Name" value="<?php echo $S_Name;?>">
	
		
		<br>
		Email :<br>
		<input type="date" name="S_Email" value="<?php echo $S_Email;?>" >

	<br>
		<button input type="submit" value="update">update</button>
			

	</form>




	
	`</div>
</body>
</html>


<?php
mysqli_close($con);
?>