<?php 
require("../../lib/require/session.php"); 
require("../../lib/config/database.php"); 
require("../../lib/config/functions.php"); 
require("../../lib/users.php"); 

$jsonarr = array();
$count = 0;

header("Content-Type: application/json");

while($row = $users->fetch_assoc()) { 
 $cbadge = "";
 $pfp = $row['pfp'] . ".gif";
 if (!empty($row['badge'])) {
   $cbadge = $row['badge'];
 } else { 
   $cbadge = $row['custom_badge'];
 }
 $jsonarr[$count] = array('Username' => $row['username'], 'Badge' => $cbadge, 'Status' => $row['status'], 'Picture' => $pfp);
 $count = $count + 1;
}


echo json_encode(array('Count' => $count + 1, 'Data' => $jsonarr));


