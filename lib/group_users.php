<?php
$group_name = $groups2["group_name"];
		
$group_users = NULL;
GetUsersFromGroup($group_name, $conn);
echo $group_users->num_rows;
?>
