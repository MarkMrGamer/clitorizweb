<?php
//clitorizweb registration php script
//date created: July 31, 2021
//created by goom 

//this script wouldn't even work
//if it didn't get the functions

//we will add a counter to check
//if the person did wrong
$counter = 0;

//alright, if this person clicked the
//sign up button, we'll do this
if (isset($_POST["signup"])) {
	
//let's set up the variables and
//think of the author's life choices
$username = htmlspecialchars($_POST["username"]); 
$email = htmlspecialchars($_POST["email"]);
$password_one = $_POST["password_one"];
$password_two = $_POST["password_two"];
$password_hashed = password_hash($password_one, PASSWORD_DEFAULT);
$song = rand(1, 3);
$video = rand(1, 2);
$profile_picture = rand(1, 27);
$result = NULL;
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
	$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

//first, we need to check if they exist
CheckDB($username, $conn);

//here is recaptcha for security i guess
$response = $_POST["g-recaptcha-response"];
$secretKey = "6Lcamg4cAAAAAMAVYn5La74K5QITRcrrqqFXdJ94";
$ip = $_SERVER['REMOTE_ADDR'];
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($response);
$response = file_get_contents($url);
$responseKeys = json_decode($response,true);
	
//if the person dosen't exist, let's
//continue with our register machine
	switch(true) {
		case $responseKeys["success"] == false: 
		$counter = 6;
		break;
		case preg_match("/[^a-z0-9 ]/i", $username):
		$counter = 3;
		break;
		case $result->num_rows > 0;
		$counter = 5;
		break;
		case empty($username):
		$counter = 1;
		break;
		case empty($email);
		$counter = 1;
		break;
		case empty($password_one);
		$counter = 1;
		break;
		case empty($password_two);
		$counter = 1;
		break;
		case $password_one !== $password_two:
		$counter = 2;
		break;
		default:
		InsertUser($username, $password_hashed, $email, $profile_picture, $song, $video, $ip, $conn);
		$counter = 4;
    }
}
?>