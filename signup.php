<?php 
if (session_status() == PHP_SESSION_NONE) 
{
	session_start();
}
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
		$username = "root";
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
			if ($_POST['first_name'] != null && $_POST['last_name'] != null && $_POST['email'] != null && $_POST['pass'] != null) 
			{
				$_POST['current'] = "signup";
				$user_email = $_POST['email'];
				$find_user = "SELECT * FROM users WHERE email LIKE '".$user_email."'";
				$result = mysqli_query($conn, $find_user);

				if(! $result )
					{
						die('Error: ' . mysqli_error($conn));
					}

				$rowcount=mysqli_num_rows(mysqli_query($conn ,$find_user));
				if ($rowcount > 0) 
				{
					$_SESSION['alert'] = "User with the same email exist";
				}
				else
				{
					$fname = $_POST['first_name'];
					$lname = $_POST['last_name'];
					$email = $_POST['email'];
					$pass = $_POST['pass'];

					$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('".$fname."', '".$lname."', '".$email."', '".$pass."')";

					$retval = mysqli_query( $conn, $sql );

					if(! $retval )
					{
						die('Could not enter data: ' . mysqli_error($conn));
					}

					echo "Entered data successfully\n";

					// mysqli_close($conn);

					header("Location: http://localhost/eShopGUC/index.php"); /* Redirect browser */
					exit();
				}
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

		mysqli_close($conn);
	}
	?>

	<?php 
	if (isset($_SESSION['alert']))
	{
		echo $_SESSION['alert'];
		// session_unset();
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