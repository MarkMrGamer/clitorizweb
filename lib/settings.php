<?php
//settings php script
//date created: August 2, 2021

$counter = 0;
$username = $_SESSION['user'];
$user = NULL;
$get = NULL;
GetCurrentUser($username, $conn);

if (isset($_POST["update"])) {
	
	if (isset($_POST["autoplay_toggle"])) {
        $autoplay = "true";
        ToggleAutoPlay($autoplay, $username, $conn);
    }

    if (!isset($_POST["autoplay_toggle"])) {
        $autoplay = "false";
        ToggleAutoPlay($autoplay, $username, $conn);
    }

	$status = htmlspecialchars($_POST["status"]);
	$css = $_POST["css"];
	//space my code...
	$cssfilter = array("<?php", "?>", "behavior: url", ".php","<script>","</script>","</style>");
    $newcss = str_replace($cssfilter, "", $css);
	$bio = htmlspecialchars($_POST["bio"]);
	UpdateProfile($username, $status, $bio, $newcss, $conn);
	header("Location: settings.php");
}

if (isset($_POST["clear1"])) {
    $pfp = 0;
    UpdateProfilePicture($pfp, $username, $conn);
}

if (isset($_POST["clear2"])) {
    $song = 0;
	$audioFileType = "mp3";
    UpdateAudioProfile($song, $audioFileType, $username, $conn);
}

if (isset($_POST["clear3"])) {
    $video = 0;
    UpdateVideoProfile($video, $username, $conn);
}

if (!empty($_POST["change_password"])) {
    $pass = $_POST["change_password"];
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$name = $_SESSION["user"];
	ChangePassword($hash, $name, $conn);
}

if (isset($_FILES["fileupload2"])) {
	
	//Trashed code..
	if ($_FILES['fileupload2']['name'] == "") {
		$counter = 6;
	} else {
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
			    header("Location: settings.php");
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
			    header("Location: settings.php");
		    }
	    }
    }
}

if (isset($_FILES["fileupload"])) {
	
	//Trashed code..
	if ($_FILES['fileupload']['name'] == "") {
		$counter = 3;
	} else {
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
			    header("Location: settings.php");
			} else {
                echo "File didn't get uploaded?";
		    }
	    }
    }
}
?>