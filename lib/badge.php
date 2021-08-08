<?php
//Haha badge system
switch($badge) {
	case "user":
	   echo "/images/badges/user.png";
	   break;
	case "verified":
	   echo "/images/badges/verified.png";
	   break;
	case "moderator":
	   echo "/images/badges/moderator.png";
	   break;
	case "administrator":
	   echo "/images/badges/administrator.png";
	   break;
	case "pfp_creator":
	   echo "/images/badges/pfp_creator.png";
	   break;
	case "owner":
	   break;
}
?>