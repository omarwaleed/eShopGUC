<?php

session_start();

$servernamer = "localhost";
$usernamer = "root";
$passwordr = "";
$DB_NAME = "karim";
$conn_str = mysql_connect('localhost', 'root', '');
  if (!$conn_str) {
    die('Not connected  to the database: ' . mysql_error());
  }

  $db_selected = mysql_select_db('karim', $conn_str);
  if (!$db_selected) {
    die ("Can\'t use your_database_name : " . mysql_error());
  }

function profile(){
if($_POST['first'] != null){
mysql_query("UPDATE users SET First_Name ='".$_POST['first']."' where Email ='".$_SESSION['Email']."'") or die(mysql_error()); 
}
if($_POST['last'] != null){
mysql_query("UPDATE users SET Last_Name ='".$_POST['last']."' where Email ='".$_SESSION['Email']."'") or die(mysql_error()); 
}
if($_POST['passworde'] != null){
mysql_query("UPDATE users SET PasswordX ='".$_POST['passworde']."' where Email ='".$_SESSION['Email']."'") or die(mysql_error()); 
}
if($_POST['emaile'] != null){
mysql_query("UPDATE users SET Email ='".$_POST['emaile']."' where Email ='".$_SESSION['Email']."'") or die(mysql_error());
$_SESSION['Email'] = $_POST['emaile']; 
}
}

if(isset($_POST['submitm'])){
profile();
}
?>


<!DOCTYPE HTML> 
<html> 
<head> 
<title>Edit Profile</title> 
</head> 
 <div id="Sign-In"> 
<legend>Edit Profile</legend> 
<form method="POST" action="profile.php">
First Name: <br><input type="text" name="first" size="40"><br> 
Last Name<br><input type="text" name="last" size="40"><br> 
Email <br><input type="text" name="emaile" size="40"><br> 
Password <br><input type="password" name="passworde" size="40"><br> 
<input id="button" type="submit" name="submitm" value="submit"> 
</form> 
</div> 
</body> 
</html>
