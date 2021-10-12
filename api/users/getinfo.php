<?php 
require("../../lib/config/database.php"); 
require("../../lib/config/functions.php"); 
require("../../lib/profile.php"); 
require("../../forum/lib/forum_post_counter3.php");

$count = 0;

header("Content-Type: application/json");

if (empty($_GET["user"])) { 
  echo json_encode(array('error' => "No user provided"));
  die();
}

echo json_encode(array('username' => $details["username"], 'bio' => $details["bio"],  'badge' => $details["badge"],'customStars' => $details['custom_stars'], 'customRank' => $details['custom_rank'], 'customBadge' => $details["custom_badge"], 'status' => $details["status"],  'audio' => $details["song"].".".$details["audio_file_type"],  'audioAutoplay' => $details["audio_autoplay"],  'videoAccess' => $details['video_access'], 'video' => $details["video"].".mp4", 'css' => base64_encode($details['css']), 'picture' => $details['pfp'].'.gif'));

?>
