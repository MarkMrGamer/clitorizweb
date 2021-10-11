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

echo json_encode(array('username' => $details["username"], 'bio' => $details["bio"],  'badge' => $details["badge"],'customstars' => $details['custom_stars'], 'customrank' => $details['custom_rank'], 'custombadge' => $details["custom_badge"], 'status' => $details["status"],  'audio' => $details["song"].".".$details["audio_file_type"],  'audioautoplay' => $details["audio_autoplay"],  'hasvideoaccess' => $details['video_access'], 'video' => $details["video"].".mp4", 'css' => base64_encode($details['css']), 'picture' => $details['pfp'].'.gif'));

?>
