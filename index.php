<?php
session_start();
if (isset($_SESSION["alpha"])) {
	header("Location: index2.php"); 
}
if (isset($_POST["auth"])) {
	$password = $_POST["password"];
	
	if ($password != "webgrenades2334") {
		header("Location: /");
    } elseif ($password = "webgrenades2334") {
		$_SESSION["alpha"] = rand(1000,9999);
		header("Location: index2.php");
	} else {
		header("Location: /");
	}
}
?>
<style>
body {
background-color: lightgray;
}
</style>
<link rel="stylesheet" href="styles/alpha.css">
<center>
<form action="index.php" method="POST">
<label>password:</label> <input class="loginText" type="password" name="password"><br><br><input class="loginSubmit" type="submit" name="auth" value="Activate">
</form>
</center>