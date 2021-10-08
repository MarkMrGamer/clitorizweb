<?php
// User banned?

// Just in case
if (isset($_SESSION["user"])) {
    $username = $_SESSION['user'];
    $user = NULL;
    $get = NULL;
    GetCurrentUser($username, $conn);
} else {
	header("Location: /");
}

if ($user["isbanned"] == "false") {
	header("Location: /");
}

$bans = NULL;
GrabBan($username, $conn);
$banned = $bans->fetch_assoc();
?>