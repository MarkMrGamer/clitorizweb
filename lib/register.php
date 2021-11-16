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
$nickname = htmlspecialchars($_POST["nickname"]); 
$email = htmlspecialchars($_POST["email"]);
$password_one = $_POST["password_one"];
$password_two = $_POST["password_two"];
$password_hashed = password_hash($password_one, PASSWORD_DEFAULT);
$song = rand(1, 3);
$video = rand(1, 2);
$profile_picture = rand(1, 27);
$result = NULL;
$ip = $_SERVER['REMOTE_ADDR'];
 if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
   $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
 }

//first, we need to check if they exist
CheckDB($username, $conn);
	
//if the person dosen't exist, let's
//continue with our register machine
	switch(true) {
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