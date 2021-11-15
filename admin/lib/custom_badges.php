<?php
// This php script
// makes administrator able to make custom badges

$counter = 0;

$custom_badges = NULL;
GetCustomBadges($conn);
$badge = $custom_badges->fetch_assoc();

if (isset($_POST["add"])) {
	if ($user["badge"] != "administrator") {
		header("Location: /index.php"); 
	} else {
		if (empty($_POST["badge_name"])) {
			$counter = 1;
		} elseif ($_FILES['fileupload']['name'] == "") {
			$counter = 1;
		} else {
			$badge_name = htmlspecialchars($_POST["badge_name"]);
			$badge_name2 = rand(28,2147483647);
			$directory = $_SERVER["DOCUMENT_ROOT"] . "/images/custom_badges/";
			$directory2 = "/images/custom_badges/";
			$file = $directory . basename($_FILES["fileupload"]["name"]);
			$file2 = basename($_FILES["fileupload"]["name"]);
			$imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
			$newfile = $directory . $badge_name2 . "." . "gif";
			$newfile2 = $badge_name2;
			$imageCheck = getimagesize($_FILES["fileupload"]["tmp_name"]);

			switch (true) {
				case $imageCheck == false:
				$counter = 2;
				break;
				case $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif":
				$counter = 3;
				break;
				default:
				if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $newfile)) {
					// add log 
					$user_log = $_SESSION['user'];
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
						$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
					}
					AddLog("<b>$user_log</b> added a custom badge called $badge_name", $ip, $conn);
					AddBadge($badge_name, $newfile2, $conn);
					$counter = 4;
				}
			}
		}
	}
}
?>