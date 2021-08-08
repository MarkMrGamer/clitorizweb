<?php 
//idea from doom

if ( $details["song"] != 0) { 
    echo "/songs/".$details["song"].".mp3"; 
 } else { 
    $song_id = rand(1,3);
	$user_song = $details["username"];
	UpdateUsersZeroSong($song_id, $user_song, $conn);
	echo "/songs/".$details["song"].".mp3";
 } 
 ?>