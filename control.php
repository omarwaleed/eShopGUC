<?php
session_start();
print_r($_SESSION);
if (isset($_GET['checkout'])) 
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "omar";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result = mysqli_query($conn, "SELECT * FROM items WHERE id IN (" . implode(',', $_SESSION['cart']) . ")");
	while ($row = $result->fetch_assoc())
	{
		$new_q = intval($row['quantity'])-1;
		echo "<br>here number ".$new_q;
		echo "<br>id ".$row['id'];
									// UPDATE `omar`.`items` SET `quantity` = '8' WHERE `items`.`id` = 4;
		$query = mysqli_query($conn, "UPDATE items SET quantity = '$new_q' WHERE items.id =". $row['id']);
	}
	unset($_SESSION['cart']);
	// add to purchase history missing
	header("Location: http://localhost/eShopGUC/index.php"); /* Redirect browser */
	exit();

}
?>