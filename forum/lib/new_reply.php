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

if (!isset($_GET["id"])) { 
    header("Location: /forum/");
}

if (isset($_POST["create"])) {

    $author = $_SESSION["user"];
    $text = htmlspecialchars($_POST["text"]);
	
	switch(true) {
		case empty($text):
		$counter = 1;
		break;
		default:
		CreateReply($text, $author, $id, $conn);
		$counter = 2;
    }
}
?>