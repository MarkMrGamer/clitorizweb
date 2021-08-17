<?php
switch($counter) {
	case 0:
	   break;
	case 1:
	   echo "Text cannot be empty.";
	   break;
	case 2:
	   header("Location: thread.php?id=" . $_GET["id"]);
	   break;
	case 3:
	   echo "You have a 30 second cooldown.";
	   break;
}
?>