<?php
switch($counter) {
	case 0:
	   break;
	case 1:
	   echo "Fill out the fields.";
	   break;
	case 2:
	   echo "Passwords do not match.";
	   break;
	case 3:
	   echo "Your username can't have any special characters.";
	   break;
	case 4:
	   header("Location: login.php");
	   break;
	case 5:
	   echo "Username already taken.";
	   break;
}
?>