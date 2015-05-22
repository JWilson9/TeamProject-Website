<?php
session_start();

$connect=mysqli_connect("localhost","root","","ubervideo");

if (mysqli_connect_errno())
{
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// username and password sent from form 


$email = $_POST['email'];
$password=$_POST['password']; 


if($email && $password){
	// To protect MySQL injection
	$email = stripslashes($email);
	$password = stripslashes($password);
	#$username = mysql_real_escape_string($username);
	#$password = mysql_real_escape_string($password);

	// checking to see if it is the customer or the member's who logged in
	$checkMember="SELECT * FROM staff WHERE S_Email like '$email'";
	$resultMember=mysqli_query($connect,$checkMember);
	$countMember=mysqli_num_rows($resultMember);

	if($countMember==1){
		$sql="SELECT * FROM staff WHERE S_Email='$email' and S_Password='$password'";
		$result=mysqli_query($connect,$sql);
		// Mysql_num_row is counting table row
		$count=mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count==1){
			// Register $username, $password and redirect to file "login_success.php"
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			$_SESSION['post-data'] = $_POST;
			
			header("location:member/AddDVDIndex.php");
			//redirect to the homepage of the website
	
		}// end if count == 1
		
	}
	
}



	/*elseif {
		// checking to see if it is the customer or the member's who logged in
	$checkAdmin="SELECT * FROM admin WHERE A_Email like '$email'";
	$resultAdmin=mysqli_query($connect,$checkAdmin);
	$countAdmin=mysqli_num_rows($resultAdmin);

	if($countAdmin==1){
		$sql="SELECT * FROM admin WHERE A_Email='$email' and A_Password='$password'";
		$result=mysqli_query($connect,$sql);
		// Mysql_num_row is counting table row
		$count=mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count==1){
			// Register $username, $password and redirect to file "login_success.php"
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			
			header("location:member/AddDVDIndex.php");
			//redirect to the homepage of the website
	
		}

	}*/
	// this is the else for the customer's
	/*
	else{
			$Custsql="SELECT * FROM customer WHERE C_Email='$email' and C_Password='$password'";
			$CustResult=mysqli_query($connect,$Custsql);
			// Mysql_num_row is counting table row
			$Custcount=mysqli_num_rows($CustResult);

			// If result matched $myusername and $mypassword, table row must be 1 row
			if($Custcount==1){
				// Register $username, $password and redirect to file "login_success.php"
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				
				header("location:customer/ViewDVDs.php");
			}// end if
			else{
				echo "<h3>wrong username or password</h3>";
				//include 'index.php';
			}//end else
	}// end else */


if($email && $password){


	$email = stripslashes($email);
	$password = stripslashes($password);
	


	// checking to see if it is the customer or the member's who logged in
	$checkMember="SELECT * FROM customer WHERE C_Email like '$email'";
	$resultMember=mysqli_query($connect,$checkMember);
	$countMember=mysqli_num_rows($resultMember);

	$Custsql="SELECT * FROM customer WHERE C_Email='$email' and C_Password='$password'";
	$CustResult=mysqli_query($connect,$Custsql);
	// Mysql_num_row is counting table row
	$Custcount=mysqli_num_rows($CustResult);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($Custcount==1){
		// Register $username, $password and redirect to file "login_success.php"
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;

	    $row = mysqli_fetch_array($CustResult);
        $C_Id = $row['C_Id'];
        session_start();
	    //Store the name in the session
	    $_SESSION['C_Id'] = $C_Id;
		
		header("location:customer/ViewDVDs.php");
	}// end if
	else{
		echo "<h3>wrong username or password</h3>";
		//include 'index.php';
	}//end else
}// end if


//}// end if





if($email && $password){


	$email = stripslashes($email);
	$password = stripslashes($password);


	// checking to see if it is the customer or the member's who logged in
	$checkMember="SELECT * FROM admin WHERE A_Email like '$email'";
	$resultMember=mysqli_query($connect,$checkMember);
	$countMember=mysqli_num_rows($resultMember);

	$Custsql="SELECT * FROM admin WHERE A_Email='$email' and A_Password='$password'";
	$CustResult=mysqli_query($connect,$Custsql);
	// Mysql_num_row is counting table row
	$Custcount=mysqli_num_rows($CustResult);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($Custcount==1){
		// Register $username, $password and redirect to file "login_success.php"
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		
		header("location:admin/AddMembers.php");
	}// end if
	else{
		echo "<h3>wrong username or password</h3>";
		//include 'index.php';
	}//end else
}// end if

?>