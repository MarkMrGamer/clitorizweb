<?php
//thread page php script
//date created: August 8, 2021

if (!isset($_GET["id"])) {
	header("Location: /"); 
}
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$thread = NULL;
	GetThread($id, $conn);
	$replies = NULL;
    GetRepliesFromThreadName($id, $conn);
	if ($thread->num_rows == 1) {
		$thread_details = $thread->fetch_assoc();
		$author = $thread_details['thread_author'];
		$thread_author = NULL;
	    GetThreadAuthor($author, $conn);
		$author_details = $thread_author->fetch_assoc();
	} else {
		header("Location: /"); 
	}
}

if (isset($_GET["delete_reply"])) {
	$id = $_GET["delete_reply"];
	$replies = NULL;
    GetRepliesFromThreadName($id, $conn);
	if ($replies->num_rows == 1) {
		$replies_details = $replies->fetch_assoc();
	    if ($replies_details["post_author"] != $_SESSION["user"])  {
			exit("Can't delete someone's other replies.");
		} else {
			$post_id = $replies_details["post_id"];
			$post_thread = $replies_details["post_thread"];
			DeleteReply($post_id, $conn);
			header("Location: thread.php?id=" . $post_thread);
		}
	} else {
		header("Location: /"); 
	}
}
?>