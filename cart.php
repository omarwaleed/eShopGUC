<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Cart | E-Shopper</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">

	<link href="css/cart.css" rel="stylesheet">

</head><!--/head-->

<body>
	<?php 

	session_start();
	print_r($_SESSION);
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

	// if (isset($_GET['item'])) 
	// {
	// 	$_SESSION['cart'][] = $_GET['item'];
		// print_r($_SESSION);
	// 	// unset($_SESSION['item']);
	// }

	?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
					</div>
				</div>

			</div>
		</div>
	</div><!--/header_top-->

	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="index.php"><img src="img/logo.jpg" alt="" /></a>
					</div>

				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="control.php?checkout=true"><i class="fa fa-crosshairs"></i> Checkout</a></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->
	
	<div class="header-bottom"><!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>

						</button>
					</div>



				</div>
			</div>
		</div>
	</div><!--/header-bottom-->
</header><!--/header-->

<section id="cart_items">
	<div class="container">

		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description">Name</td>
						<td class="price">Price</td>
						<h4><a href="control.php?clear=true">Clear Cart</a></h4>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php

					if (isset($_SESSION['cart']))
					{
						// $ids = join(',',$_SESSION["cart"]); 
						// $result = mysqli_query($conn , "SELECT * FROM items WHERE id IN ($_SESSION(['cart']))");
						$result = mysqli_query($conn , "SELECT * FROM items WHERE id IN (" . implode(',', $_SESSION['cart']) . ")");
						if (!$result) {
							echo mysqli_error($conn);
							exit;
						}

						while ($row = $result->fetch_assoc())
							{ ?>
						<tr>
							<td class="cart_product">
								<a href="#"><img src=<?php echo $row["image"] ?> alt="" width="100" height="68"></a>
							</td>
							<td class="cart_description">
								<h4><a href="#"><?php echo $row["name"]  ?></a></h4>
								
							</td>
							<td class="cart_price">
								<p><?php echo $row["price"]  ?></p>
							</td>
							<!-- <td class="cart_delete">
								<h4><a href="control?delete= <?php //echo $row['id'] ?>" > Remove </a></h4>
							</td> -->
						</tr>

						<?php 
					}
				}

				?>

			</tbody>
		</table>
	</div>
</div>
</section> <!--/#cart_items-->




<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>