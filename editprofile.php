<!DOCTYPE HTML> 
<html> 
<head> 
<title>Edit Profile</title> 

<link rel="stylesheet" href="css/Login.css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/Login.js"></script>
</head> 
<?php

session_start();

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

function profile(){
if($_POST['fname'] != null){
mysql_query("UPDATE users SET first_name ='".$_POST['fname']."' where email ='".$_SESSION['Email']."'") or die(mysql_error()); 
}
if($_POST['lname'] != null){
mysql_query("UPDATE users SET last_name ='".$_POST['lname']."' where email ='".$_SESSION['Email']."'") or die(mysql_error()); 
}
if($_POST['npassword'] != null){
	$query = mysql_query("SELECT * FROM users where email = '".$_SESSION['Email']."' AND password = '$_POST[opassword]'") or die(mysql_error()); 
	$row = mysql_fetch_array($query) or die(mysql_error());
		if(!empty($row['email'] )AND !empty($row['password'])) {
mysql_query("UPDATE users SET password ='".$_POST['npassword']."' where email ='".$_SESSION['Email']."'") or die(mysql_error()); 
}
}
if($_POST['demail'] != null){
mysql_query("UPDATE users SET email ='".$_POST['demail']."' where email ='".$_SESSION['Email']."'") or die(mysql_error());
$_SESSION['Email'] = $_POST['demail']; 
}
if($_POST['avatar'] != null){
          $uploadDir = './images/'; 
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


}
}
if(isset($_POST['submit'])){
profile();
}
?>

<div class="container">
<div class="main">
<form class="form" method="post" action="#">
<h2>Edit Profile</h2>
<form method="POST" action="editprofile.php"> 
<label>First Name:</label>
<input type="text" name="fname" id="name">
<label>Last Name:</label>
<input type="text" name="lname" id="name">
<label>Email :</label>
<input type="text" name="demail" id="email">
<label>Old Password :</label>
<input type="password" name="opassword" id="password">
<label> new Password :</label>
<input type="password" name="npassword" id="password">
<label>Avatar :</label>
<input type="file" name="avatar" size="200000000"  accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png" size="26">
<input type="button" name="submit" id="submit" value="submit">
</form>
</div>
</body>
</html>
  </form>
 
