<?php
//dumb script made by doom

if (isset($_GET["name"])) {
	$name = htmlspecialchars($_GET["name"]);
	echo($name);
}
?>