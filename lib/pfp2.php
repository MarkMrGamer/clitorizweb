<?php 
//idea from doom

if ( $details['pfp'] != 0) { 
    echo "/images/pfps/".$details['pfp'].".gif"; 
 } else { 
    $pfp_id = rand(0,27);
	$user_pfp = $details['username'];
	UpdateUsersZeroPFP($pfp_id, $user_pfp, $conn);
	echo "/images/pfps/".$details['pfp'].".gif"; 
 } 
 ?>