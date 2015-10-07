<?php
session_start();
print_r($_SESSION);

if (isset($_GET['add'])) 
{
	$_SESSION['cart'][] = $_GET['item'];
	header("Location: http://localhost/eShopGUC/cart.php"); /* Redirect browser */
	exit();
}

if (isset($_GET['clear'])) 
{
	unset($_SESSION['cart']);
	header("Location: http://localhost/eShopGUC/index.php"); /* Redirect browser */
	exit();
}

if (isset($_GET['checkout'])) 
{

	if ($_SESSION['email'] == null || $_SESSION['id'] == null )
	{
		header("Location: http://localhost/eShopGUC/Login.php"); /* Redirect browser */
		exit();
	}
	else
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
			if ($new_q > 0) 
			{
				mysqli_query($conn, "UPDATE items SET quantity = '$new_q' WHERE items.id =". $row['id']);
				// $query = mysqli_query($conn, "SELECT * FROM users WHERE email='".$_SESSION['email']."' LIMIT 1" );
				// while ($val = $query->fetch_assoc()) 
				// {}
				$query = "INSERT INTO purchases (user_id, item_id) VALUES ( '".$_SESSION['id']."' ,'".$row['id']."')";
				$insertion = mysqli_query($conn, $query );
				if(! $insertion )
					{
						die('Could not enter data: ' . mysqli_error($conn));
					}
			}
		}
		unset($_SESSION['cart']);
		mysqli_close($conn);
		header("Location: http://localhost/eShopGUC/index.php"); /* Redirect browser */
		exit();

	}

}

?>