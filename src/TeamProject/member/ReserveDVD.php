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
<th>Customer ID</th>
</tr>";

//$email = $_SESSION["email"];
//$C_Id = $_SESSION["C_Id"];
$result = mysqli_query($con, "SELECT * FROM Reservations");
//$test = mysqli_query($con, "SELECT COUNT(Title) FROM Reservations WHERE Title = 1");
/*
$countTitles="SELECT * FROM Reservations WHERE Title like Title";
$getCount=mysqli_query($con,$countTitles);
$countRentals=mysqli_num_rows($getCount);

if($countRentals > 3){
	echo"you cannot rent more than 3 movies of the same movies";
}*/


//$resSql="SELECT * FROM Reservations";
//$CustResult=mysqli_query($con,$resSql);
// Mysql_num_row is counting table row
//$Custcount=mysqli_num_rows($CustResult);

// If result matched $myusername and $mypassword, table row must be 1 row


	$customer_Sql="SELECT * FROM customer";
	$customer_Result=mysqli_query($con,$customer_Sql);
    $row = mysqli_fetch_array($customer_Result);
    $C_Name = $row['C_Name'];
   
    //Store the name in the session
    $_SESSION['C_Name'] = $C_Name;



	    //////////////////////


	while($row = mysqli_fetch_array($result))
	  {

		  echo "<tr>";
		  echo "<td>" . $row['Title'] . "</td>";
		  echo "<td>" . $row['dateAdded'] . "</td>";
		  echo "<td>" . $row['C_Id'] . "</td>";
		  echo('<td><a href="DeleteReserve.php?id='.htmlentities($row[0]).'">Returned</a></td>');
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