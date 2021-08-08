<?php
//settings php script
//date created: August 2, 2021

$counter = 0;
$username = $_SESSION['user'];
$user = NULL;
$get = NULL;
GetCurrentUser($username, $conn);

//DOOM - im gonna merge all because its stupid

if (isset($_POST["update"])) {
	$status = htmlspecialchars($_POST["status"]);
	$css = htmlspecialchars($_POST["css"]);
	//space my code...
	$cssfilter = array("<?php", "?>", "behavior: url", ".php");
    $newcss = str_replace($cssfilter, "", $css);
	$bio = htmlspecialchars($_POST["bio"]);
	UpdateProfile($username, $status, $bio, $newcss, $conn);
	header("Location: settings.php");
	
	//audio
	if ($_FILES['fileupload2']['name'] == "") {
		$counter = 6;
	} else {
		$song = rand(1,2147483647);
	    $directory = $_SERVER["DOCUMENT_ROOT"] . "/songs/";
		$directory2 = "/songs/";
        $file = $directory . basename($_FILES["fileupload2"]["name"]);
	    $file2 = basename($_FILES["fileupload"]["name"]);
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
			    header("Location: settings.php");
		    }
	    }
    }
	
	//pfp
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
			    header("Location: settings.php");
		    }
	    }
}

?>

/*
DOOM - this will sit in the comment zone for now

if (isset($_POST["update_audio"])) {
	
	
}

if (isset($_POST["update_pfp"])) {
	
	
    }
}

*/
