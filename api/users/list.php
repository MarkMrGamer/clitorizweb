<?php 
require("../../lib/require/session.php"); 
require("../../lib/config/database.php"); 
require("../../lib/config/functions.php"); 
require("../../lib/users.php"); 

$jsonarr = array();
$count = 0;

header("Content-Type: application/json");

while($row = $users->fetch_assoc()) { 
 $jsonarr[$count] = array('username' => $row['username'], 'badge' =>  $row['badge'], 'customBadge' =>  $row['custom_badge'], 'status' => $row['status'], 'picture' => $row['pfp'] . ".gif");
 $count = $count + 1;
}


echo json_encode(array('count' => $count + 1, 'data' => $jsonarr));


