<?php
// group system
// october 5, 2021
if (!isset($_GET["id"]) && !isset($_GET["join_group"]) && !isset($_GET["leave_group"])) {
	header("Location: /"); 
}
if (isset($_GET["id"])) {
	$id = htmlspecialchars($_GET["id"]);
	$group = NULL;
	GetGroup($id, $conn);
	if ($group->num_rows == 1) {
		$groups2 = $group->fetch_assoc();
	} else {
		header("Location: /"); 
	}
}
?>

