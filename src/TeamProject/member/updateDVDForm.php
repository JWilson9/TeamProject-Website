<?php

$con=mysqli_connect("localhost", "root", "", "ubervideo");

//check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}




$id = mysql_real_escape_string($_GET['id']);
$result = mysqli_query($con,"SELECT * FROM dvd WHERE DVD_Id='$id'");
$row =  mysqli_fetch_array($result);

$DVD_Id = $row['DVD_Id'];
$title = $row['Title'];
$Date_of_Release = $row['Date_of_Release'];
$In_Stock = $row['In_Stock'];
$genre = $row['Genre'];
?>

<html>


<body>
	<div class="container-fluid">
<form action="updateDVDSql.php" method="post" >

	ID: <br>
		<input type="text" name="userID" value="<?php echo $DVD_Id ;?>" readonly>
	<br>
		Title:<br>
		<input type="text" name="Title" value="<?php echo $title;?>">
	<br>
		Genre:<br>
		<input type="text" name="Genre" value="<?php echo $genre;?>">
		<br>
		

		Date of Relase :<br>
		<input type="date" name="Date_of_Release" value="<?php echo $Date_of_Release;?>" >

	<br>
		 In Stock :<br>
		<input type="text" name="In_Stock" value="<?php echo $In_Stock;?>">
	<br>
		<button input type="submit" value="update">update</button>
			

	</form>




	
	`</div>
</body>
</html>


<?php
mysqli_close($con);
?>