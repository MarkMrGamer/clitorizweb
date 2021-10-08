<?php 
//idea from doom

if ( $details["video"] != 0) { 
    echo "/videos/".$details["video"].".mp4"; 
 } else { 
    $video_id = rand(1,2);
	$user_video = $details["username"];
	UpdateUsersZeroVideo($video_id, $user_video, $conn);
	echo "/videos/".$details["video"].".mp4";
 } 
 ?>