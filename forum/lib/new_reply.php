<?php
//new thread php script by goom 
//created: August 8, 2021

$counter = 0;

if (isset($_GET["id"])) { 
	$id = $_GET["id"];
	$thread = NULL;
	GetThread($id, $conn);
	if ($thread->num_rows == 1) {
		$thread_details = $thread->fetch_assoc();
	} else {
		header("Location: /forum/");
	}
}

if ($thread_details["thread_locked"] == "yes") {
		exit("Thread is locked.");
}

if (isset($_POST["create"])) {
    if (!isset($_GET["id"])) { 
        header("Location: /forum/");
    }
    $author = $_SESSION["user"];
    $text = htmlspecialchars($_POST["text"]);
	$time = date("Y-m-d H:i:s", time() + 30);
	
	switch(true) {
		case empty($text):
		$counter = 1;
		break;
		case $user["forum_cooldown"] > date("Y-m-d H:i:s"):
		$counter = 3;
		break;
		default:
		CreateReply($text, $author, $id, $conn);
		AddCooldown($author, $time, $conn);
		$counter = 2;
    }
}
?>