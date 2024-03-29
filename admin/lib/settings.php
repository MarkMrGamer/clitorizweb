<?php
// This php script 2
// makes administrator able to play with users

$counter = 0;
$cuser = $user;


if (!isset($_GET["name"]) && !isset($_GET["reset_password"])) {
	header("Location: user.php");
}

if (isset($_GET["name"])) {
	$name = htmlspecialchars($_GET["name"]);
	$pass_reset = 
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

if (isset($_GET["reset_password"])) {
	if ($cuser["badge"] != "administrator") {
		header("Location: /index.php"); 
	} else {
		$name = htmlspecialchars($_GET["reset_password"]);
		$bytes = random_bytes(5);
		$pass = bin2hex($bytes);
		$hash = password_hash($pass, PASSWORD_DEFAULT);
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
			ChangePassword($hash, $name, $conn);
			// add log 
			$user_log = $_SESSION['user'];
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
				$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
			}
			AddLog("<b>$user_log</b> restted password for $name", $ip, $conn);
			$counter = 1;

		} else {
			exit("No user found.");
		}
	}
}


if (isset($_POST["update"])) {
	if ($cuser["badge"] != "administrator") {
		header("Location: /index.php"); 
	} else {
		$username = $_GET["name"];
		$status = htmlspecialchars($_POST["status"]);
		$css = $_POST["css"];
		//space my code...
		$cssfilter = array("<?php", "?>", "behavior: url", ".php");
		$newcss = str_replace($cssfilter, "", $css);
		$bio = htmlspecialchars($_POST["bio"]);
		$nickname = $details["nickname"];
		UpdateProfile($nickname, $username, $status, $bio, $newcss, $conn);
		
		if(isset($_POST['videoaccess'])) { 
			UpdateVideoAccess("true", $username, $conn);
		} else { 
			UpdateVideoAccess("false", $username, $conn);
		}
		// add log 
		$user_log = $_SESSION['user'];
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		AddLog("<b>$user_log</b> updated $username", $ip, $conn);
		header("Location: settings.php?name=" . $username);
	}
}
?>
