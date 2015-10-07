<!DOCTYPE HTML> 
<html> 
<head> 
<title>Log-In</title> 

<link rel="stylesheet" href="css/Login.css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/Login.js"></script>
</head> 
<body>


<?php 


$servernamer = "localhost";
$usernamer = "root";
$passwordr = "";
$DB_NAME = "omar";
 $conn_str = mysql_connect('localhost', 'root', '');
  if (!$conn_str) {
    die('Not connected  to the database: ' . mysql_error());
  }

  $db_selected = mysql_select_db('omar', $conn_str);
  if (!$db_selected) {
    die ("Can\'t use your_database_name : " . mysql_error());
  }

function login()
{
session_start();
if(!empty($_POST['email']) && !empty($_POST['password'])){
$query = mysql_query("SELECT * FROM users where email = '$_POST[email]' AND password = '$_POST[password]'") or die(mysql_error()); 
$row = mysql_fetch_array($query) or die(mysql_error());
if(!empty($row['email'] )AND !empty($row['password'])) {
$_SESSION['email'] = $row['email'];

$user=$row['first_name'];
if (isset($_POST['rememberme'])) {
	$cookie_name = "username";
	$cookie_value = $user;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
}

header("Location: http://localhost/eShopGUC/index.php"); /* Redirect browser */
exit();

}
}
 
 }



if(isset($_POST['submit']))
{
	login();
}



?>




<div class="container">
<div class="main">
<form class="form" method="post" action="#">
<h2>Sign In</h2>
<form method="POST" action="Login.php"> 
<label>Email :</label>
<input type="text" name="email" id="email">
<label>Password :</label>
<input type="password" name="password" id="password">
<label>Remember Me:</label>
 <input type="checkbox" name="rememberme" value="1"><br>

<input type="button" name="Login" id="Login" value="Login">


</form>
</div>
</body>
</html>
  </form>
</body> 
</html>
