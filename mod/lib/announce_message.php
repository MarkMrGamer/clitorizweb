<?php
// This php script
// makes moderators able to announce 
// what is happen to clitorizweb or idk

if (isset($_POST["clear"])) {
	
	if ($user["badge"] != "moderator") {
		header("Location: /index.php"); 
	} else {
		$announce_text = "";
		$announce_bgcolor = "";
		$announce_textcolor = "";
		AnnounceMessage($announce_text, $announce_bgcolor, $announce_textcolor, $conn);
	}
}

if (isset($_POST["announce"])) {
	
	if ($user["badge"] != "moderator") {
		header("Location: /index.php"); 
	} else {
		$announce_text = htmlspecialchars($_POST["text_announce"]);
		$announce_bgcolor = htmlspecialchars($_POST["bgcolor_announce"]);
		$announce_textcolor = htmlspecialchars($_POST["textcolor_announce"]);
		AnnounceMessage($announce_text, $announce_bgcolor, $announce_textcolor, $conn);
		// add log 
		$user_log = $_SESSION['user'];
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		AddLog("<b>$user_log</b> announced a message saying $announce_text", $ip, $conn);
		header("Location: announce_message.php");
	}
}
?>