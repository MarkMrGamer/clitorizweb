<?php 
require("../../lib/require/session.php"); 
require("../../lib/config/database.php"); 
require("../../lib/config/functions.php"); 
require("../../lib/users.php"); 

$jsonarr = array();
$count = 0;

header("Content-Type: application/json");

while($row = $users->fetch_assoc()) { 

 $custom_badge = $row["custom_badge"];
 $get_custom_badge = NULL;
 GetCustomBadge($custom_badge, $conn);
 $badge_detail = $get_custom_badge->fetch_assoc();
 
 $jsonarr[$count] = array('username' => $row['username'], 'badge' =>  $row['badge'], 'customBadge' =>  $badge_detail["badge_pic"].".gif",'status' => $row['status'], 'picture' => $row['pfp'] . ".gif");
 $count = $count + 1;
}


echo json_encode(array('count' => $count + 1, 'data' => $jsonarr));


