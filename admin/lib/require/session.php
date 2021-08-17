<?php
session_start();
if (!isset($_SESSION["alpha"])) {
	header("Location: index.php"); 
}
?>