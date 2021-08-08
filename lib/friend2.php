<?php
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

    if ($user2->num_rows == 1 && $status['status'] == "friends") {
	    echo "<img src=\"/images/badges/friends.png\">";
    } elseif ($user4->num_rows == 1) {
	    echo "<img src=\"/images/badges/friends.png\">";
    }
}
?>