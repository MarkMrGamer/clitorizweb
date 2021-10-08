<?php
//thread page php script
//date created: August 8, 2021

if (isset($_SESSION["user"])) {
    $username = $_SESSION['user'];
    $user = NULL;
    $get = NULL;
    GetCurrentUser($username, $conn);
}

if (!isset($_GET["id"]) && !isset($_GET["delete_reply"]) && !isset($_GET["delete_thread"]) && !isset($_GET["pin_thread"]) && !isset($_GET["unpin_thread"])) {
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
    GetReply($id, $conn);
	if ($replies->num_rows == 1) {
		$replies_details = $replies->fetch_assoc();
	    if ($replies_details["post_author"] != $_SESSION["user"] AND $user["badge"] != "administrator" AND $user["badge"] != "moderator")  {
			exit("Can't delete someone's other replies.");
		} else {
			$post_id = $replies_details["post_id"];
			$post_thread = $replies_details["post_thread"];
			DeleteReply($id, $conn);
			header("Location: thread.php?id=" . $post_thread);
		}
	} else {
		header("Location: /"); 
	}
}

if (isset($_GET["delete_thread"])) {
	$id = $_GET["delete_thread"];
	$thread = NULL;
	GetThread($id, $conn);
	if ($thread->num_rows == 1) {
		$thread_details = $thread->fetch_assoc();
	    if ($thread_details["thread_author"] != $_SESSION["user"] AND $user["badge"] != "administrator" AND $user["badge"] != "administrator" AND $user["badge"] != "moderator")  {
			exit("Can't delete someone's other threads.");
		} else {
			$thread_id = $thread_details["thread_id"];
			$thread_forum = $thread_details["thread_forum"];
			if ($thread_forum == "discussion") {
				$forum_id = 1;
			}
			if ($thread_forum == "halflife") {
				$forum_id = 2;
			}
			if ($thread_forum == "technology") {
				$forum_id = 3;
			}
			DeleteThread($thread_id, $conn);
			DeleteRepliesFromThread($thread_id, $conn);
			header("Location: forum.php?id=" . $forum_id);
		}
	} else {
		header("Location: /"); 
	}
}

if (isset($_GET["pin_thread"])) {
	$id = $_GET["pin_thread"];
	$thread = NULL;
	GetThread($id, $conn);
	if ($thread->num_rows == 1) {
		$thread_details = $thread->fetch_assoc();
	    if ($user["badge"] != "administrator" OR $user["badge"] != "moderator"  )  {
			exit("You are not allowed to pin threads.");
		} elseif ($thread_details["thread_pinned"] != "no") {
			exit("Thread is already pinned.");
		} else {
			$thread_id = $thread_details["thread_id"];
			$thread_forum = $thread_details["thread_forum"];
			$thread_pin = "yes";
			if ($thread_forum == "discussion") {
				$forum_id = 1;
			}
			if ($thread_forum == "halflife") {
				$forum_id = 2;
			}
			if ($thread_forum == "technology") {
				$forum_id = 3;
			}
			PinThread($thread_id, $thread_pin, $conn);
			header("Location: forum.php?id=" . $forum_id);
		}
	} else {
		header("Location: /"); 
	}
}

if (isset($_GET["unpin_thread"])) {
	$id = $_GET["unpin_thread"];
	$thread = NULL;
	GetThread($id, $conn);
	if ($thread->num_rows == 1) {
		$thread_details = $thread->fetch_assoc();
	    if ($user["badge"] != "administrator" OR $user["badge"] != "moderator"  )  {
			exit("You are not allowed to unpin threads.");
	    } elseif ($thread_details["thread_pinned"] != "yes") {
			exit("Thread is already unpinned.");
		} else {
			$thread_id = $thread_details["thread_id"];
			$thread_forum = $thread_details["thread_forum"];
			$thread_pin = "no";
			if ($thread_forum == "discussion") {
				$forum_id = 1;
			}
			if ($thread_forum == "halflife") {
				$forum_id = 2;
			}
			if ($thread_forum == "technology") {
				$forum_id = 3;
			}
			UnPinThread($thread_id, $thread_pin, $conn);
			header("Location: forum.php?id=" . $forum_id);
		}
	} else {
		header("Location: /"); 
	}
}

if (isset($_GET["lock_thread"])) {
	$id = $_GET["lock_thread"];
	$thread = NULL;
	GetThread($id, $conn);
	if ($thread->num_rows == 1) {
		$thread_details = $thread->fetch_assoc();
	    if ($user["badge"] != "administrator" OR $user["badge"] != "moderator"  )  {
			exit("You are not allowed to lock threads.");
		} elseif ($thread_details["thread_locked"] != "no") {
			exit("Thread is already locked.");
		} else {
			$thread_id = $thread_details["thread_id"];
			$thread_forum = $thread_details["thread_forum"];
			$thread_lock = "yes";
			if ($thread_forum == "discussion") {
				$forum_id = 1;
			}
			if ($thread_forum == "halflife") {
				$forum_id = 2;
			}
			if ($thread_forum == "technology") {
				$forum_id = 3;
			}
			LockThread($thread_id, $thread_lock, $conn);
			header("Location: forum.php?id=" . $forum_id);
		}
	} else {
		header("Location: /"); 
	}
}

if (isset($_GET["unlock_thread"])) {
	$id = $_GET["unlock_thread"];
	$thread = NULL;
	GetThread($id, $conn);
	if ($thread->num_rows == 1) {
		$thread_details = $thread->fetch_assoc();
	    if ($user["badge"] != "administrator" OR $user["badge"] != "moderator"  )  {
			exit("You are not allowed to unlock threads.");
	    } elseif ($thread_details["thread_locked"] != "yes") {
			exit("Thread is already unlocked.");
		} else {
			$thread_id = $thread_details["thread_id"];
			$thread_forum = $thread_details["thread_forum"];
			$thread_lock = "no";
			if ($thread_forum == "discussion") {
				$forum_id = 1;
			}
			if ($thread_forum == "halflife") {
				$forum_id = 2;
			}
			if ($thread_forum == "technology") {
				$forum_id = 3;
			}
			UnlockThread($thread_id, $thread_lock, $conn);
			header("Location: forum.php?id=" . $forum_id);
		}
	} else {
		header("Location: /"); 
	}
}
?>