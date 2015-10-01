<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
	<?php 
	function register()
	{
		// database connecting
		$servername = "localhost";
		$username = "omar";
		$password = "";
		$dbname = "omar";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 


		if ($_POST['pass'] == $_POST['pass2']) 
		{
			// checks if the 2 passwords are equal first
			// if so checks if the other fields are not empty
			// if so register the user
			if ($_POST['first_name'] != "" && $_POST['last_name'] != "" && $_POST['email'] != "" && $_POST['pass'] != "") 
			{
				$fname = $_POST['first_name'];
				$lname = $_POST['last_name'];
				$email = $_POST['email'];
				$pass = $_POST['pass'];
				
				$sql = "INSERT INTO users (first_name, last_name, email, password) 
							VALUES ($fname, $lname, $email, $pass)";

				if ($conn->query($sql) === TRUE) {
					$_SESSION['alert'] = "User created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close();

				header("Location: http://localhost/index.php"); /* Redirect browser */
				exit();
			}
			else
			{
				$_SESSION['alert'] = "You left a field empty";
			}
		}
		else
		{
			$_SESSION['alert'] = "Passwords dont match";
		}
	}
	?>

	<?php 
		if (isset($_SESSION['alert']))
			{
				echo $_SESSION['alert'];
			}
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			register();
		}
	?>

	<form action="signup.php" method="POST">
		First Name: <input type="text" name="first_name"><br>
		Last Name: <input type="text" name="last_name"><br>
		Email: <input type="text" name="email"><br>
		Password: <input type="text" name="pass"><br>
		Repeat Password: <input type="text" name="pass2"><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>