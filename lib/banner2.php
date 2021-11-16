<?php 
//idea from doom

if ( $details['banner'] != 0) { 
    echo "/images/banners/".$details['banner'].".gif"; 
 } else { 
    $banner_id = rand(0,4);
	$user_banner = $details['username'];
	UpdateUsersZeroBanner($banner_id, $user_banner, $conn);
	echo "/images/banners/".$details['banner'].".gif"; 
 } 
 ?>