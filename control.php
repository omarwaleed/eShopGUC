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
	$result = mysqli_query($conn, "SELECT quantity FROM items WHERE id IN (" . implode(',', $_SESSION['cart']) . ")");
	while ($row = $result->fetch_assoc())
	{
		$new_q = intval($row['quantity'])-1;
		$query = mysqli_query($conn, "UPDATE itesm SET 'quantity'='$new_q' WHERE id = ".$row['id'].")");
	}
	// add to purchase history missing
	header("Location: http://localhost/eShopGUC/index.php"); /* Redirect browser */
	exit();

}
?>