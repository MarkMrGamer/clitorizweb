<?php
// This php script 2
// makes administrator able to play with users

$counter = 0;

$custom_badges = NULL;
GetCustomBadges($conn);

if (!isset($_GET["name"])) {
	header("Location: user.php");
}

if (isset($_GET["name"])) {
	$name = htmlspecialchars($_GET["name"]);
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
		exit("No user found.");
	}
}

if (isset($_POST["update"])) {
	$username = $_GET["name"];
	$badge = htmlspecialchars($_POST["badge"]);
	$custom_badge = htmlspecialchars($_POST["custom_badge"]);
	$custom_rank = htmlspecialchars($_POST["custom_rank"]);
	$custom_stars = htmlspecialchars($_POST["custom_stars"]);
    $custom_stars_converter = max(min($custom_stars,5),0);
    if(preg_match("/^[a-zA-Z]+$/", $custom_stars)) {
        exit("Numbers are only allowed in the custom stars input.");
    }
	UpdateRank($username, $badge, $custom_rank, $custom_stars_converter, $custom_badge, $conn);
	
	// add log 
	$user_log = $_SESSION['user'];
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
	    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
	AddLog("<b>$user_log</b> changed rank for $username", $ip, $conn);
	
	header("Location: rank_settings.php?name=" . $username);
}
?>