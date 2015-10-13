<?php

session_start();
// print_r($_SESSION);

$servernamer = "localhost";
$usernamer = "root";
$passwordr = "";
$DB_NAME = "omar";
$conn_str = new mysqli('localhost', 'root', '', 'omar');
  if (!$conn_str) {
    die('Not connected  to the database: ' . mysql_error());
  }
?>



<?php

$sql = mysqli_query($conn_str, "SELECT * FROM purchases where user_id = '".$_SESSION['id']."'") or die("select query ".mysql_error()); 
// $i = 0;
// Establish the output variable
// $dyn_table = '<table border="1" cellpadding="10">';
if($sql === FALSE) { 
    die(mysql_error());
}
?>
<html>
<head>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <title>History</title>
</head>
<body>

<div class="header-middle"><!--header-middle-->
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="logo pull-left">
            <a href="index.php"><img src="img/logo.jpg" id='logo' alt="" /></a>
          </div>
          <div class="btn-group pull-right">

          </div>
        </div>
        <div class="col-sm-8">
          <div class="shop-menu pull-right">
            <ul class="nav navbar-nav">
              <li><a href="editprofile.php"><i class="fa fa-user"></i> Profile</a></li>
              <?php if (!isset($_SESSION['email'])) { ?>
              <li><a href="Login.php"><i class="fa fa-star"></i> Signin</a></li>
              <li><a href="signup.php"><i class="fa fa-lock"></i> Signup</a></li>
              <li><a href="History.php"><i class="fa fa-lock"></i> History</a></li>
            <?php } ?>
            <!-- <li><a href=""><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
            <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<h1>History</h1>
<table border="1">
<tr>
  <td>Name</td>
  <td>Price</td>
  <td>Description</td>
</tr>
<?php 
while($row = $sql->fetch_assoc()){ 
    
    
    $id = $row["id"];
    $user_id = $row["user_id"];
    $product_id = $row["item_id"];

    $q = mysqli_query( $conn_str ,"SELECT * FROM items WHERE id = '".$row['item_id']."'");
    $col = $q->fetch_assoc();
    ?>

    <tr>
      <td><?php echo $col['name'] ?></td>
      <td><?php echo $col['price'] ?></td>
      <td><?php echo $col['description'] ?></td>
    </tr>

<!-- //     if ($i % 1 == 0) { // if $i is divisible by our target number (in this case "3")
//         $dyn_table .= '<tr><td>' . $id . '</td>';
//    $dyn_table .= '<tr><td>' . $user_id . '</td>';
//    $dyn_table .= '<tr><td>' . $product_id . '</td>';
// } else {
//             $dyn_table .= '<tr><td>' . $id . '</td>';
//    $dyn_table .= '<tr><td>' . $user_id . '</td>';
//    $dyn_table .= '<tr><td>' . $product_id . '</td>';
// }
//     $i++; -->
    <?php 
} ?>
<!-- // $dyn_table .= '</tr>'; -->

</table>
</body>
<!-- <?php //echo $dyn_table; ?> -->
</html>