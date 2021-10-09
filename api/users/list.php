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
 $jsonarr[$count] = array('Username' => $row['username'], 'Badge' =>  $row['badge'], 'CustomBadge' =>  $row['custom_badge'], 'Status' => $row['status'], 'Picture' => $pfp);
 $count = $count + 1;
}


echo json_encode(array('Count' => $count + 1, 'Data' => $jsonarr));


