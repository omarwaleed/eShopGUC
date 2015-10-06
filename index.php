<!DOCTYPE html>
<html>
<head>
	<title>E-Shop-GUC</title>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
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


	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="index.html"><img src="img/logo.jpg" alt="" /></a>
					</div>
					<div class="btn-group pull-right">

					</div>
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
							<li><a href="#"><i class="fa fa-star"></i> Signin</a></li>
							<li><a href=""><i class="fa fa-crosshairs"></i> Checkout</a></li>
							<li><a href=""><i class="fa fa-shopping-cart"></i> Cart</a></li>
							<li><a href="Signup.php"><i class="fa fa-lock"></i> Signup</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->
</header><!--/header-->


<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->

		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="img/test.jpg" alt="" />
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>


				</div>
			</div>
		</div>









		</body>

		</html>


	</body>
	</html>