<?php
//Haha friend counter system
//Pain in the ass :(
if (!isset($_SESSION['user'])) {
	$friends = "friend";
}
if (isset($_SESSION["user"])) {
    $buddy1 = $_SESSION['user'];
    $buddy2 = $details['username'];
    $user2 = NULL;
    $user3 = NULL;
    $user4 = NULL;
    $status = "pending";
    $status2 = "friends";
    GetFriend($buddy1, $buddy2, $conn);
    GetFriendRequest2($buddy1, $buddy2, $status, $conn);
    GetFriendRequest3($buddy1, $buddy2, $status2, $conn);
    $status = $user2->fetch_assoc();
    $status2 = $user3->fetch_assoc();
    $friends = "friend";
 
    if ($user2->num_rows == 1 && $status['status'] == "pending") {
	    $friends = "pending";
    } elseif ($user3->num_rows == 1) {
	    $friends = "accept";
    }

    if ($user2->num_rows == 1 && $status['status'] == "friends") {
	    $friends = "unfriend";
    } elseif ($user4->num_rows == 1) {
	    $friends = "unfriend";
    }
}
switch($friends) {
	case "friend":
	   echo "<a href=\"profile.php?friend=" . $details["username"] . "\"><button><div class=\"friendicon\"></div></button></a>";
	   break;
	case "pending":
	   echo "<button><div class=\"pendingicon\"></div></button>";
	   break;
	case "accept":
	   echo "<a href=\"profile.php?accept_friend=" . $details["username"] . "\"><button><div class=\"accepticon\"></div></button></a>";
	   break;
	case "unfriend":
	   echo "<a href=\"profile.php?unfriend=" . $details["username"] . "\"><button><div class=\"unfriendicon\"></div></button></a>";
	   break;
}
?>