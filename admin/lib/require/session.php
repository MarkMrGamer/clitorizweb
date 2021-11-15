<?php
session_start();

if (isset($_SESSION["user"])) {
    $username = $_SESSION['user'];
    $user = NULL;
    $get = NULL;
    GetCurrentUser($username, $conn);
}

if (isset($_SESSION["user"])) { 
    $username = $_SESSION["user"];
}

if ($user["badge"] != "administrator") {
	header("Location: /index.php"); 
}
?>