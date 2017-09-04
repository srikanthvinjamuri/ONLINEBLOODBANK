<?php
   $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bloodsystem";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
   session_start();
   @$user_check = $_SESSION['username'];
   $ses_sql = mysqli_query($conn,"select email_id from registration where email_id = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['email_id'];
   
?>