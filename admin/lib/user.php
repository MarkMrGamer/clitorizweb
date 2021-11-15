<?php
// This php script
// makes administrator able to play with users

// Edited by doom

$counter = 0;

$users = NULL;
$isbanned2 = "false";
GetUsers($isbanned2, $conn);

if (isset($_POST["get_user"])) {
	$username = $_POST["username"];
	header("Location: user.php?name=" . $username);
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

if (isset($_POST["clear1"])) {
	if ($user["badge"] != "administrator") {
		header("Location: /index.php"); 
	} else {
		$pfp = 0;
		$username = $_GET["name"];
		UpdateProfilePicture($pfp, $username, $conn);
		// add log 
		$user_log = $_SESSION['user'];
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		AddLog("<b>$user_log</b> cleared profile picture for $username", $ip, $conn);
		$counter = 9;
	}
}

if (isset($_POST["clear2"])) {
	if ($user["badge"] != "administrator") {
		header("Location: /index.php"); 
	} else {
		$song = 0;
		$username = $_GET["name"];
		$audioFileType = "mp3";
		UpdateAudioProfile($song, $audioFileType, $username, $conn);
		// add log 
		$user_log = $_SESSION['user'];
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		AddLog("<b>$user_log</b> cleared audio profile for $username", $ip, $conn);
		$counter = 10;
	}
}

if (isset($_POST["clear3"])) {
	if ($user["badge"] != "administrator") {
		header("Location: /index.php"); 
	} else {
		$video = 0;
		$username = $_GET["name"];
		UpdateVideoProfile($video, $username, $conn);
		// add log 
		$user_log = $_SESSION['user'];
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		AddLog("<b>$user_log</b> cleared video profile for $username", $ip, $conn);
		$counter = 11;
	}
}

if (isset($_FILES["fileupload2"])) {
	if ($user["badge"] != "administrator") {
		header("Location: /index.php"); 
	} else {
		//Trashed code..
		if (isset($_POST["clear2"])) {
			$counter = 10;
		} elseif ($_FILES['fileupload2']['name'] == "") {
			$counter = 6;
		} else {
			$username = $_GET["name"];
			$song = rand(1,2147483647);
			$directory = $_SERVER["DOCUMENT_ROOT"] . "/songs/";
			$directory2 = "/songs/";
			$file = $directory . basename($_FILES["fileupload2"]["name"]);
			$file2 = basename($_FILES["fileupload2"]["name"]);
			$audioFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
			$newfile = $directory . $song . "." . $audioFileType;
			$newfile2 = $directory2 . $song . "." . $audioFileType;
			
			switch (true) {
				case $audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "ogg" && $audioFileType != "flac":
				$counter = 5;
				break;
				default:
				if (move_uploaded_file($_FILES["fileupload2"]["tmp_name"], $newfile)) {
					UpdateAudioProfile($song, $audioFileType, $username, $conn);
					// add log 
					$user_log = $_SESSION['user'];
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
						$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
					}
					AddLog("<b>$user_log</b> changed audio profile for $username", $ip, $conn);
					header("Location: settings.php");
				}
			}
		}
	}
}

if (isset($_FILES["fileupload3"])) {
	
	if ($user["badge"] != "administrator") {
		header("Location: /index.php"); 
	} else {
		//Trashed code..
		if (isset($_POST["clear3"])) {
			$counter = 11;
		} elseif ($_FILES['fileupload3']['name'] == "") {
			$counter = 7;
		} else {
			$username = $_GET["name"];
			$video = rand(1,2147483647);
			$directory = $_SERVER["DOCUMENT_ROOT"] . "/videos/";
			$directory2 = "/videos/";
			$file = $directory . basename($_FILES["fileupload3"]["name"]);
			$file2 = basename($_FILES["fileupload3"]["name"]);
			$videoFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
			$newfile = $directory . $video . "." . $videoFileType;
			$newfile2 = $directory2 . $video . "." . $videoFileType;
			
			switch (true) {
				case $videoFileType != "mp4":
				$counter = 8;
				break;
				default:
				if (move_uploaded_file($_FILES["fileupload3"]["tmp_name"], $newfile)) {
					UpdateVideoProfile($video, $username, $conn);
					// add log 
					$user_log = $_SESSION['user'];
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
						$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
					}
					AddLog("<b>$user_log</b> changed video profile for $username", $ip, $conn);
					header("Location: user.php?name=" . $username);
				}
			}
		}
	}
}

if (isset($_FILES["fileupload"])) {
	
	if ($user["badge"] != "administrator") {
		header("Location: /index.php"); 
	} else {
		//Trashed code..
		if (isset($_POST["clear1"])) {
			$counter = 9;
		} elseif ($_FILES['fileupload']['name'] == "") {
			$counter = 3;
		} else {
			$username = $_GET["name"];
			$pfp = rand(28,2147483647);
			$directory = $_SERVER["DOCUMENT_ROOT"] . "/images/pfps/";
			$directory2 = "/images/pfps/";
			$file = $directory . basename($_FILES["fileupload"]["name"]);
			$file2 = basename($_FILES["fileupload"]["name"]);
			$imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
			$newfile = $directory . $pfp . "." . "gif";
			$newfile2 = $directory2 . $pfp . "." . "gif";
			$imageCheck = getimagesize($_FILES["fileupload"]["tmp_name"]);

			switch (true) {
				case $imageCheck == false:
				$counter = 1;
				break;
				case $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif":
				$counter = 2;
				break;
				default:
				if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $newfile)) {
					UpdateProfilePicture($pfp, $username, $conn);
					// add log 
					$user_log = $_SESSION['user'];
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
						$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
					}
					AddLog("<b>$user_log</b> changed profile picture for $username", $ip, $conn);
					header("Location: user.php?name=" . $username);
				}
			}
		}
	}
}
?>