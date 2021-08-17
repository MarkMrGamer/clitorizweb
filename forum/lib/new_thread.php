<?php
//new thread php script by goom 
//created: August 8, 2021

$counter = 0;

if (isset($_GET["id"])) { 
    if ($_GET["id"] == 1) {
		$forum = "discussion";
	} elseif ($_GET["id"] == 2) {
		$forum = "halflife";
	} else {
		header("Location: /forum/");
	}
}

if (!isset($_GET["id"])) { 
    header("Location: /forum/");
}

if (isset($_POST["create"])) {

    $author = $_SESSION["user"];
    $title = htmlspecialchars($_POST["title"]); 
    $text = htmlspecialchars($_POST["text"]);
	$time = date("Y-m-d H:i:s", time() + 30);
	
	switch(true) {
		case empty($title):
		$counter = 1;
	    break;
		case empty($text):
		$counter = 2;
		break;
		case $user["forum_cooldown"] > date("Y-m-d H:i:s"):
		$counter = 4;
		break;
		default:
		CreateThread($title, $text, $author, $forum, $conn);
		AddCooldown($author, $time, $conn);
		$counter = 3;
    }
}
?>