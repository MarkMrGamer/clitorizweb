<?php

// Add group
// October 4, 2021

$counter = 0;
$username = $_SESSION['user'];
$user = NULL;
$get = NULL;
GetCurrentUser($username, $conn);

if (isset($_POST["create"])) {
	
	//grab var
	$title = htmlspecialchars($_POST["name"]);
	$desc = htmlspecialchars($_POST["description"]);
	$owner = $_SESSION["user"];
	$time = date("Y-m-d H:i:s", time() + 30);
	
	switch (true) {
		case empty($title):
		$counter = 1;
		break;
		case empty($desc):
		$counter = 2;
		break;
		case $user["forum_cooldown"] > date("Y-m-d H:i:s"):
		$counter = 3;
		break;
		default:
	    if (isset($_FILES["fileupload"])) {
	
	        //Trashed code..
	        if ($_FILES['fileupload']['name'] == "") {
	     	    $counter = 6;
	        } else {
		        $pfp = rand(28,2147483647);
	            $directory = $_SERVER["DOCUMENT_ROOT"] . "/images/group_pfps/";
	    	    $directory2 = "/images/group_pfps/";
                $file = $directory . basename($_FILES["fileupload"]["name"]);
	            $file2 = basename($_FILES["fileupload"]["name"]);
                $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
	            $picture = $directory . $pfp . "." . "gif";
		        $newfile2 = $directory2 . $pfp . "." . "gif";
                $imageCheck = getimagesize($_FILES["fileupload"]["tmp_name"]);

	        switch (true) {
		        case $imageCheck == false:
		        $counter = 4;
		        break;
		        case $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif":
		        $counter = 5;
		        break;
		        default:
		            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $picture)) {
			            CreateGroup($title, $desc, $newfile2, $owner, $conn);
						JoinGroup($title, $owner, $conn);
						AddCooldown($owner, $time, $conn);
			            header("Location: groups.php");
			        } else {
                        echo "File didn't get uploaded?";
		            }
	            }
            }
        }
	}
}
?>
