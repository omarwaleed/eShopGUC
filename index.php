<!DOCTYPE html>
<html>
<head>
	<title>E-Shop-GUC</title>
</head>
<body>
	<?php
	$servername = "localhost";
	$username = "username";
	$password = "";

// Create connection
	$conn = new mysqli($servername, $username, $password);

// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	// echo "Connected successfully";
	?>
	<div>
		<img src="logo.png" width="300">
		<form action="signup.php" method="GET"><input type="Submit" value="Sign Up"></form>
	</div>


</body>
</html>