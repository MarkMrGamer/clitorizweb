<?php
// Report php script
// August 16, 2021.

$counter = 0;

if (!isset($_GET["user"])) {
	header("Location: profile.php?user=" . $name);
}

if (isset($_GET["user"])) {
	$name = htmlspecialchars($_GET["user"]);
	$user = NULL;
	GetProfile($name, $conn);
	if ($user->num_rows == 1) {
		$friend = NULL;
		$friend2 = NULL;
        $friend_status = "friends";
		$details = $user->fetch_assoc();
		$friend_name = $details['username'];
	    GetFriends($friend_name, $friend_status, $conn);
	    GetFriends2($friend_name, $friend_status, $conn);
	} else {
		header("Location: profile.php?user=" . $name);
	}
}

if (isset($_POST["report"])) {
	if (empty($_POST["reason"])) {
		$counter = 1;
	} elseif (empty($_POST["reason"])) {
		$counter = 1;
	} else {
		$username = $_SESSION["user"];
		$report_username = htmlspecialchars($_GET["user"]);
	    $reason = htmlspecialchars($_POST["reason"]);
	    $short_desc = htmlspecialchars($_POST["short_desc"]);
	    ReportUser($report_username, $reason, $short_desc, $username, $conn);
	    $counter = 2;
	}
}
?>