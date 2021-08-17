<?php
//Haha badge system + custom badges
switch(true) {
	case $custom_badge != NULL:
	   $get_custom_badge = NULL;
       GetCustomBadge($custom_badge, $conn);
	   $badge_detail = $get_custom_badge->fetch_assoc();
	   echo "/images/custom_badges/".$badge_detail["badge_pic"].".gif";
	   break;
	case $badge == "user" AND $custom_badge == NULL:
	   echo "/images/badges/user.png";
	   break;
	case $badge == "verified" AND $custom_badge == NULL:
	   echo "/images/badges/verified.png";
	   break;
	case $badge == "moderator" AND $custom_badge == NULL:
	   echo "/images/badges/moderator.png";
	   break;
	case $badge == "administrator" AND $custom_badge == NULL:
	   echo "/images/badges/administrator.png";
	   break;
	case $badge == "pfp_creator" AND $custom_badge == NULL:
	   echo "/images/badges/pfp_creator.png";
	   break;
    case $badge == "portal2" AND $custom_badge == NULL:
	   echo "/images/badges/portal2.png";
	   break;
	case $badge == "owner" AND $custom_badge == NULL:
	   break;
}
?>