<?php 
require("../../lib/require/session.php");
require("../../lib/login/session.php"); 
require("../../lib/config/database.php"); 
require("../../lib/config/functions.php");
require("../../lib/login.php");

if (isset($_POST["login"])) {
$username = htmlspecialchars($_POST["username"]); 
$password = $_POST["password"];
$get = NULL;
$result = NULL;
CheckLogin($username, $conn);
switch(true) {
		case $get->num_rows == 0;
		echo "Unknown Error";
    exit;
		break;
		case empty($username):
		echo "No Username";
    exit;
    break;
		case empty($password);
		echo "No Password";
    exit;
		break;
		case password_verify($password, $result['password']) == FALSE:
		echo "Invalid Password";
    exit;
		break;
		default:
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $_SESSION['user'] = $result['username'];
		$username2 = $result['username'];
		UpdateIPLogin($username2, $ip, $conn);
		echo "OK";
    exit;
}
}
?>
