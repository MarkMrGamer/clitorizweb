<?php
// group system
// october 5, 2021

if (isset($_SESSION["user"])) {
	$username = $_SESSION['user'];
	$user = NULL;
	$get = NULL;
	GetCurrentUser($username, $conn);
}

if (!isset($_GET["id"]) && !isset($_GET["kick"])) {
	header("Location: /"); 
}
if (isset($_GET["id"])) {
	$id = htmlspecialchars($_GET["id"]);
	$group = NULL;
	GetGroup($id, $conn);
	if ($group->num_rows == 1) {
		$groups2 = $group->fetch_assoc();
		$group_name2 = $groups2["group_name"];
		$group_users = NULL;
		GetUsersFromGroup($group_name2, $conn);
	} else {
		header("Location: /"); 
	}
}
if (isset($_POST["join"])) {
	$title = htmlspecialchars($_POST["group_title"]);
	$group_id = htmlspecialchars($_POST["group_id"]);
	
	// if user signed in
	if (isset($_SESSION["user"])) {
	// check to see if the user is in this group
		$usergroup = NULL;
		CheckUserInGroup($title, $username, $conn);
		
	// if the user is in
	    $user = $usergroup->fetch_assoc();
		if ($user["group_user"] != NULL) {
			header("Location: group.php?id=" . $group_id); 
		} elseif ($group->num_rows == 1) {
			// if this group does not exist or does exist
				JoinGroup($title, $username, $conn);
				header("Location: group.php?id=" . $group_id); 
				
		} else {
	    	header("Location: groups.php"); 
	    }
	}
}
if (isset($_POST["leave"])) {
	$title = htmlspecialchars($_POST["group_title"]);
	$owner = htmlspecialchars($_POST["group_owner"]);
	$group_id = htmlspecialchars($_POST["group_id"]);
	
	// if user signed in
	if (isset($_SESSION["user"])) {
	// check to see if the user is in this group
		$usergroup = NULL;
		CheckUserInGroup($title, $username, $conn);
		
	// if the group owner tried to leave
		if ($username == $owner) {
			header("Location: group.php?id=" . $group_id); 
		}
		
	// if the user is in
	    $user = $usergroup->fetch_assoc();
		if ($user["group_user"] != NULL) {
			LeaveGroup($title, $username, $conn);
			header("Location: group.php?id=" . $group_id); 
		} elseif ($group->num_rows == 0) {
			// if this group does not exist or does exist
				header("Location: groups.php"); 
				
		} else {
	    	header("Location: groups.php"); 
	    }
	}
}

if (isset($_GET["id"]) && isset($_GET["kick"])) {
	$id = htmlspecialchars($_GET["id"]);
	$kick = htmlspecialchars($_GET["kick"]);
	
	$group = NULL;
	GetGroup($id, $conn);
	
	if ($group->num_rows == 1) {
		$groups2 = $group->fetch_assoc();
		// if user signed in
		if (isset($_SESSION["user"])) {
		// if a user tried to kick someone who does not own this group
			$owner = $groups2["group_owner"];
			if ($username != $owner) {
				header("Location: group.php?id=" . $id); 
			}
		// check to see if the user is in this group
			$usergroup = NULL;
			$title = $groups2["group_name"];
			CheckUserInGroup($title, $kick, $conn);
		// if the user is in
			$user = $usergroup->fetch_assoc();
			if ($user["group_user"] != NULL) {
				// if owner owns this group 
				if ($user["group_user"] == $owner) {
					header("Location: group.php?id=" . $id); 
				} else {
					LeaveGroup($title, $kick, $conn);
				}
				header("Location: group.php?id=" . $id); 
			} else {
				header("Location: group.php?id=" . $id); 
			}
		}
	}
}
?>

