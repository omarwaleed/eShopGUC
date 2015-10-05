<!DOCTYPE html>
<html>
<head>
	<title>E-Shop-GUC</title>
</head>
<body>
	<?php
	// check if session has started. if not start it
	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "omar";

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

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
	<?php
	// print any alert messages
	// if (isset($_SESSION['alert'])) 
	// {
	// 	echo $_SESSION['alert'];
	// }

	// display code here
	// if (isset($_SESSION['email'])) 
	// {
	// 	$new_user_email = $_SESSION['email'];
	// 	if ($result = mysqli_query($conn , "SELECT * FROM users WHERE email LIKE '$new_user_email'")) {

			/* fetch associative array */
		// 	while ($row = $result->fetch_assoc()) {
		// 		echo $row["first_name"]."<br>";
		// 		echo $row["email"]."<br>";
		// 		$image = $row["avatar"];
		// 		echo "<img src='$image' >";
		// 	}
		// }
	// }
		?>


	</body>
	</html>