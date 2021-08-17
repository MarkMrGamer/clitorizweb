<?php
// This php script 2
// makes administrator able to play with users

$counter = 0;

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
	$status = htmlspecialchars($_POST["status"]);
	$css = htmlspecialchars($_POST["css"]);
	//space my code...
	$cssfilter = array("<?php", "?>", "behavior: url", ".php");
    $newcss = str_replace($cssfilter, "", $css);
	$bio = htmlspecialchars($_POST["bio"]);
	UpdateProfile($username, $status, $bio, $newcss, $conn);
	header("Location: settings.php?name=" . $username);
}
?>