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

$cbadge;
$badge;
$custom_badge;

$custom_badge =  $row['custom_badge'];

$badge =  $row['badge'];

switch(true) {
case $custom_badge != NULL:
GetCustomBadge($custom_badge, $conn);
$badge_detail = $get_custom_badge->fetch_assoc();
$cbadge = "http://clitoriz.cf/images/custom_badges/".$badge_detail["badge_pic"].".gif";
break;
case $badge == "user" AND $custom_badge == NULL:
$cbadge = "http://clitoriz.cf/images/badges/user.png";
break;
case $badge == "verified" AND $custom_badge == NULL:
$cbadge = "http://clitoriz.cf/images/badges/verified.png";
break;
case $badge == "moderator" AND $custom_badge == NULL:
$cbadge = "http://clitoriz.cf/images/badges/moderator.png";
break;
case $badge == "administrator" AND $custom_badge == NULL:
$cbadge = "http://clitoriz.cf/images/badges/administrator.png";
break;
case $badge == "pfp_creator" AND $custom_badge == NULL:
$cbadge = "http://clitoriz.cf/images/badges/pfp_creator.png";
break;
case $badge == "portal2" AND $custom_badge == NULL:
$cbadge = "http://clitoriz.cf/images/badges/portal2.png";
break;
case $badge == "owner" AND $custom_badge == NULL:
break;
}


$jsonarr[$count] = array('username' => $row['username'], 'badge' => $cbadge ,'status' => $row['status'], 'picture' => "http://clitoriz.cf/images/pfps/" .$row['pfp'] . ".gif");
$count = $count + 1;
}
echo json_encode($jsonarr);
