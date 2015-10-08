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
?>



<?php

$sql = mysql_query("SELECT id, user_id,product_id FROM purchases where email = '".$_SESSION['Email']."'") or die(mysql_error()); 
$i = 0;
// Establish the output variable
$dyn_table = '<table border="1" cellpadding="10">';
if($sql === FALSE) { 
    die(mysql_error());
}

while($row = mysql_fetch_array($sql)){ 
    
    
    $id = $row["id"];
    $user_id = $row["user_id"];
    $product_id = $row["product_id"];

    if ($i % 1 == 0) { // if $i is divisible by our target number (in this case "3")
        $dyn_table .= '<tr><td>' . $id . '</td>';
		$dyn_table .= '<tr><td>' . $user_id . '</td>';
		$dyn_table .= '<tr><td>' . $product_id . '</td>';
} else {
            $dyn_table .= '<tr><td>' . $id . '</td>';
		$dyn_table .= '<tr><td>' . $user_id . '</td>';
		$dyn_table .= '<tr><td>' . $product_id . '</td>';
}
    $i++;
}
$dyn_table .= '</tr></table>';
?>
<html>
<head>
  <title>History</title>
</head>
<body>
</body>
<?php echo $dyn_table; ?>
</body>
</html>