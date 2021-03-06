<?php
//profile page php script
//date created: August 2, 2021

if (!isset($_GET["user"]) && !isset($_GET["friend"]) && !isset($_GET["unfriend"]) && !isset($_GET["accept_friend"])) {
	header("Location: /"); 
}
if (isset($_GET["user"])) {
	$name = htmlspecialchars($_GET["user"]);
	$user = NULL;
	$comments = NULL;
	GetProfile($name, $conn);
	GetCommentFromName($name, $conn);
	if ($user->num_rows == 1) {
		$friend = NULL;
		$friend2 = NULL;
        $friend_status = "friends";
		$details = $user->fetch_assoc();
		$friend_name = $details['username'];
	    GetFriends($friend_name, $friend_status, $conn);
	    GetFriends2($friend_name, $friend_status, $conn);
		
	    if ($details["isbanned"] == "true") {
			header("Location: currently_banned.php"); 
		}
	} else {
		header("Location: /"); 
	}
}
if (isset($_GET["delete_comment"])) {
	$id = $_GET["delete_comment"];
	$comment = NULL;
    GetComment($id, $conn);
	if ($comment->num_rows == 1) {
		$comment_details = $comment->fetch_assoc();
	    if ($comment_details["comment_username"] != $_SESSION["user"] AND $user["badge"] != "administrator")  {
			exit("Can't delete someone's other comments.");
		} else {
			$comment_id = $comment_details["id"];
			$comment_name = $comment_details["comment_profile"];
			DeleteComment($comment_id, $conn);
			header("Location: profile.php?user=" . $comment_name);
		}
	} else {
		header("Location: /"); 
	}
}
if (isset($_GET["friend"])) {
	if (!isset($_SESSION["user"])) {
		header("Location: /"); 
	} else {
	    $buddy1 = $_SESSION["user"];
	    $buddy2 = htmlspecialchars($_GET["friend"]);
		$name = htmlspecialchars($_GET["friend"]);
	    $user = NULL;
		$user2 = NULL;
		$user3 = NULL;
		GetProfile($name, $conn);
	    GetFriend($buddy1, $buddy2, $conn);
		GetFriend2($buddy1, $buddy2, $conn);
		$details = $user->fetch_assoc();
		
		if ($user->num_rows == 0) {
			exit("Can't friend a non-existing person");
		}
		if ($_SESSION["user"] == $buddy2) {
			exit("Can't friend yourself :(");
		}
		if ($user2->num_rows == 1 AND $user3->num_rows == 1) {
			exit("You or the person already sent a request to you or have been already friends with");
		} else {
		 	if ($user2->num_rows == 0) {
			    $status = "pending";
			    AddFriend($buddy1, $buddy2, $status, $conn);
			    header("Location: /profile.php?user=" . $buddy2); 
			} elseif ($user3->num_rows == 1) {
				exit("The person already sent a request to you or have been already friends with");
			}
		}
	}
}
if (isset($_GET["unfriend"])) {
	if (!isset($_SESSION["user"])) {
		header("Location: /"); 
	} else {
	    $buddy1 = $_SESSION["user"];
	    $buddy2 = htmlspecialchars($_GET["unfriend"]);
		$name = htmlspecialchars($_GET["unfriend"]);
	    $user = NULL;
		$user2 = NULL;
		$user3 = NULL;
		$status = "friends";
		GetProfile($name, $conn);
	    GetFriendRequest($buddy1, $buddy2, $status, $conn);
		GetFriendRequest2($buddy1, $buddy2, $status, $conn);
		$details = $user->fetch_assoc();
		
		if ($user->num_rows == 0) {
			exit("Can't unfriend a non-existing person");
		}
		if ($_SESSION["user"] == $buddy2) {
			exit("Can't unfriend yourself :(");
		}
		if ($user2->num_rows == 0 AND $user3->num_rows == 0) {
			exit("You are not friends yet");
		} else {
			if ($user2->num_rows == 1) {
			    UnFriend($buddy1, $buddy2, $conn);
			} elseif ($user3->num_rows == 1) {
			    UnFriend2($buddy1, $buddy2, $conn);
			}
			header("Location: /profile.php?user=" . $buddy2); 
		}
	}
}
if (isset($_GET["accept_friend"])) {
	if (!isset($_SESSION["user"])) {
		header("Location: /"); 
	} else {
	    $buddy1 = htmlspecialchars($_GET["accept_friend"]);
	    $buddy2 = $_SESSION["user"];
		$name = htmlspecialchars($_GET["accept_friend"]);
	    $user = NULL;
		$user2 = NULL;
		$status = "pending";
		GetProfile($name, $conn);
	    GetFriendRequest($buddy1, $buddy2, $status, $conn);
		$details = $user->fetch_assoc();
		
		if ($user->num_rows == 0) {
			exit("Can't accept a friend request from a non-existing person");
		}
		if ($_SESSION["user"] == $buddy1) {
			exit("Can't accept a friend request from yourself :(");
		}
		if ($user2->num_rows == 0) {
			exit("You don't have a friend request yet or you accepted already");
		} else {
			$status2 = "friends";
			AcceptFriend($buddy1, $buddy2, $status2, $conn);
			header("Location: /profile.php?user=" . $buddy1); 
		}
	}
}
if (isset($_POST["post"])) {
	if (empty($_POST["comment"])) {
		exit("Fill out the comments field.");
	} elseif (!isset($_SESSION["user"])) {
	    exit("You are not logged in.");
	} else {
        $username = $_SESSION['user'];
        $user = NULL;
        $get = NULL;
        GetCurrentUser($username, $conn);
		$cooldown = $user["comment_cooldown"];
        $user = htmlspecialchars($details['username']);
	    $comment = htmlspecialchars($_POST["comment"]);
		$time = date("Y-m-d H:i:s", time() + 30);
		if ($cooldown > date("Y-m-d H:i:s")) {
			exit("You have cooldown of 30 seconds");
		} else {
			AddCooldown2($username, $time, $conn);
	        AddComment($username, $comment, $user, $conn);
		    header("Location: profile.php?user=" . $user);
		}
	}
}
?>