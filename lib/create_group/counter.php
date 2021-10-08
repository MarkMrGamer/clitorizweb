<?php
switch($counter) {
	case 0:
	   break;
	case 1:
	   echo "Please fill out the group name.";
	   break;
	case 2:
	   echo "Please fill out the group description.";
	   break;
	case 3:
	   echo "You have a cooldown for 30 seconds.";
	   break;
	case 4:
	   echo "Not a image.";
	   break;
	case 5:
	   echo "Image files (PNG, JPEG, GIF) are only allowed.";
	   break;
	case 6:
	   echo "Please upload an image.";
	   break;
}
?>