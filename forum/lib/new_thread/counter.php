<?php
switch($counter) {
	case 0:
	   break;
	case 1:
	   echo "Title cannot be empty.";
	   break;
	case 2:
	   echo "Text cannot be empty.";
	   break;
	case 3:
	   header("Location: forum.php?id=" . $_GET["id"]);
	   break;
	case 4:
	   echo "You have a 30 second cooldown.";
	   break;
}
?>