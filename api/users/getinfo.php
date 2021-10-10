<?php 
require("../../lib/config/database.php"); 
require("../../lib/config/functions.php"); 
require("../../lib/profile.php"); 
require("../../forum/lib/forum_post_counter3.php");

$count = 0;

header("Content-Type: application/json");

if (empty($_GET["user"])) { 
  echo json_encode(array('Error' => "No user provided"));
  die();
}

echo json_encode(array('Username' => $details["username"], 'Bio' => $details["bio"],  'Badge' => $details["badge"],'CustomStars' => $details['custom_stars'], 'CustomRank' => $details['custom_rank'], 'CustomBadge' => $details["custom_badge"], 'Status' => $details["status"],  'Audio' => $details["song"].".".$details["audio_file_type"],  'AudioAutoplay' => $user["audio_autoplay"],  'HasVideoPerms' => $details['video_access'], 'Video' => $details["video"].".mp4", 'CSS' => $details['css'], 'Picture' => $details['pfp'].'.gif'));

?>
