<?php
// This php script
// makes administrator able to play with users

$counter = 0;

$users = NULL;
GetUsers($conn);

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
    $pfp = 0;
	$username = $_GET["name"];
    UpdateProfilePicture($pfp, $username, $conn);
}

if (isset($_POST["clear2"])) {
    $song = 0;
	$username = $_GET["name"];
    UpdateAudioProfile($song, $username, $conn);
}

if (isset($_POST["clear3"])) {
    $video = 0;
	$username = $_GET["name"];
    UpdateVideoProfile($video, $username, $conn);
}

if (isset($_FILES["fileupload2"])) {
	
	//Trashed code..
	if ($_FILES['fileupload2']['name'] == "") {
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
		    case $audioFileType != "mp3":
		    $counter = 5;
		    break;
		    default:
		    if (move_uploaded_file($_FILES["fileupload2"]["tmp_name"], $newfile)) {
			    UpdateAudioProfile($song, $username, $conn);
			    header("Location: user.php?name=" . $username);
		    }
	    }
    }
}

if (isset($_FILES["fileupload3"])) {
	
	//Trashed code..
	if ($_FILES['fileupload3']['name'] == "") {
		$counter = 7;
	} elseif ($user["video_access"] == "false") {
		exit("You don't have video access."); 
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
			    header("Location: user.php?name=" . $username);
		    }
	    }
    }
}

if (isset($_FILES["fileupload"])) {
	
	//Trashed code..
	if ($_FILES['fileupload']['name'] == "") {
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
		$image1 = imagecreatefromgif($_FILES["fileupload"]); 
		imagegif($image1,$newfile);

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
			    header("Location: user.php?name=" . $username);
		    }
	    }
    }
}
?>