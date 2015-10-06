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
	<link rel="stylesheet" href="css/signup.css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/signup.js"></script>
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

					$uploadDir = './images/'; //Image Upload Folder
					$fileName = $_FILES['avatar']['name'];
					$tmpName  = $_FILES['avatar']['tmp_name'];
					$fileSize = $_FILES['avatar']['size'];
					$fileType = $_FILES['avatar']['type'];
					$filePath = $uploadDir . $fileName;
					$result = move_uploaded_file($tmpName, $filePath);
					if (!$result) {
						echo "Error uploading file";
						exit;
					}
					if(!get_magic_quotes_gpc())
					{
						$fileName = addslashes($fileName);
						$filePath = addslashes($filePath);
					}


					$fname = $_POST['first_name'];
					$lname = $_POST['last_name'];
					$email = $_POST['email'];
					$pass = $_POST['pass'];
					$avatar = $_FILES['avatar'];

					// $sql = "INSERT INTO users (first_name, last_name, email, password, avatar) VALUES ('".$fname."', '".$lname."', '".$email."', '".$pass."', '".$avatar."')";
					$sql = "INSERT INTO users (first_name, last_name, email, password, avatar) VALUES ('$fname', '$lname', '$email', '$pass', '$filePath')";

					$retval = mysqli_query( $conn, $sql );

					if(! $retval )
					{
						die('Could not enter data: ' . mysqli_error($conn));
					}

					echo "Entered data successfully\n";

					// mysqli_close($conn);

					$_SESSION['email'] = $email;

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
		session_unset();
	}
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		register();
	}
	?>

	<form action="signup.php" method="POST" enctype="multipart/form-data">
<div class="container">
<div class="main">
<form class="form" method="post" action="#">
<h2>Sign Up Now</h2>
<label> First Name :</label>
<input type="text" name="dname" id="name">
<label>last Name :</label>
<input type="text" name="dname" id="name">
<label>Email :</label>
<input type="text" name="demail" id="email">
<label>Password :</label>
<input type="password" name="password" id="password">
<label>Confirm Password :</label>
<input type="password" name="cpassword" id="cpassword">
<input type="button" name="register" id="register" value="Register">
</form>
</div>
</body>
</html>
	</form>
</body>
</html>