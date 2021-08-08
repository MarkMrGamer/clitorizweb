<?php 
//idea from doom

if ( $row['pfp'] != 0) { 
    echo "/images/pfps/".$row['pfp'].".gif"; 
 } else { 
    $pfp_id = rand(0,27);
	$user_pfp = $row['username'];
	UpdateUsersZeroPFP($pfp_id, $user_pfp, $conn);
	echo "/images/pfps/".$row['pfp'].".gif"; 
 } 
 ?>