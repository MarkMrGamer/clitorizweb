<?php
// This thing bans and unbans people from the
// database so administrators can ban or unban

// Rouge administrators cannot bans
// administrators so yeah

// Just in case
if (isset($_SESSION["user"])) {
    $username = $_SESSION['user'];
    $user = NULL;
    $get = NULL;
    GetCurrentUser($username, $conn);
}

if (isset($_POST["ban"])) {
	// variables
    $ban_username = $_POST["username"];
    $ban_date = $_POST["date"];
    $ban_note = $_POST["note"];
	$result = NULL;
	
	// check if user in database
	CheckDB($ban_username, $conn);
	
	//fetch assoc 
	$userfetch = $result->fetch_assoc();
	
	switch(true) {
		case $result->num_rows == 0;
		exit("User is not in the database");
		break;
		case $userfetch["badge"] == "administrator";
		exit("You cannot ban an administrator!");
		break;
		default:
		$ban = "true";
        ChangeBan($ban_username, $ban, $conn);
		AddBan($ban_username, $ban_date, $ban_note, $conn);
     	// add log 
	    $user_log = $_SESSION['user'];
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
	        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
	    AddLog("<b>$user_log</b> banned $ban_username for reason: $ban_note", $ip, $conn);
		exit("User is successfully banned!");
    }
}

if (isset($_POST["unban"])) {
	// variables
    $unban_username = $_POST["username"];
	$result = NULL;
	
	// check if user in database
	CheckDB($unban_username, $conn);
	
	switch(true) {
		case $result->num_rows == 0;
		exit("User is not in the database");
		break;
		default:
		$ban = "false";
        ChangeBan($unban_username, $ban, $conn);
     	// add log 
	    $user_log = $_SESSION['user'];
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
	        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
	    AddLog("<b>$user_log</b> unbanned $unban_username", $ip, $conn);
		exit("User is successfully unbanned!");
    }
}
?>