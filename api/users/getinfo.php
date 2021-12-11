<?php

if (empty($_GET["user"]))
{
    echo json_encode(array(
        'error' => "No user provided"
    ));
    die();
}

require ("../../lib/config/database.php");
require ("../../lib/config/functions.php");
require ("../../lib/profile.php");
require ("../../forum/lib/forum_post_counter3.php");

error_reporting(0);

$count = 0;
$jsonarr = array();
$frarr = array();
$frarr2 = array();
$ccount = 0;
$cccount = 0;
$custom_badge = $details["custom_badge"];
$badge = $details["badge"];
$cbadge;
$cbanner;

header("Content-Type: application/json");

while ($row1 = $comments->fetch_assoc())
{
    $author = $row1['comment_username'];
    $comment_author = NULL;
    GetCommentAuthor($author, $conn);
    $row2 = $comment_author->fetch_assoc();
    $jsonarr[$count] = array(
        'author' => $row2['username'],
        'picture' => $row2['pfp'],
        'text' => $row1['comment_description'],
    );
    $count = $count + 1;
}



if ($friend->num_rows > 0 or $friend2->num_rows > 0)
{
    if ($friend->num_rows > 0)
    {

        while ($friend_details = $friend->fetch_assoc())
        {
            $friend_details1 = $friend_details['buddy2'];
            $friend_details2 = NULL;
            $get_friend = NULL;
            GetUserFriend($friend_details1, $conn);
            $frarr[$ccount] = array('name' => $friend_details2["username"], 'pfp' => $friend_details2["pfp"]);
            $ccount = $ccount + 1;
        }
    }
    if ($friend2->num_rows > 0)
    {
        while ($friend_details_2 = $friend2->fetch_assoc())
        {
            $friend_details3 = $friend_details_2['buddy1'];
            $friend_details4 = NULL;
            $get_friend2 = NULL;
            GetUserFriend2($friend_details1, $conn);
            $frarr2[$cccount] = array('name' => $friend_details4["username"], 'pfp' => $friend_details4["pfp"]);
              $cccount = $cccount + 1;
        }
    }
}


if ($details['banner'] != 0) { 
    $cbanner = "http://clitoriz.cf/images/banners/".$details['banner'].".gif"; 
 } else { 
        $banner_id = rand(0,4);
	$user_banner = $details['username'];
	UpdateUsersZeroBanner($banner_id, $user_banner, $conn);
	$cbanner = "http://clitoriz.cf/images/banners/".$details['banner'].".gif"; 
 } 

switch(true) {
	case $custom_badge != NULL:
       GetCustomBadge($custom_badge, $conn);
	   $badge_detail = $get_custom_badge->fetch_assoc();
	   $cbadge = "http://clitoriz.cf/images/custom_badges/".$badge_detail["badge_pic"].".gif";
	   break;
	case $badge == "user" AND $custom_badge == NULL:
	    $cbadge = "http://clitoriz.cf/images/badges/user.png";
	   break;
	case $badge == "verified" AND $custom_badge == NULL:
	    $cbadge = "http://clitoriz.cf/images/badges/verified.png";
	   break;
	case $badge == "moderator" AND $custom_badge == NULL:
	    $cbadge = "http://clitoriz.cf/images/badges/moderator.png";
	   break;
	case $badge == "administrator" AND $custom_badge == NULL:
	    $cbadge = "http://clitoriz.cf/images/badges/administrator.png";
	   break;
	case $badge == "pfp_creator" AND $custom_badge == NULL:
	    $cbadge = "http://clitoriz.cf/images/badges/pfp_creator.png";
	   break;
    case $badge == "portal2" AND $custom_badge == NULL:
	    $cbadge = "http://clitoriz.cf/images/badges/portal2.png";
	   break;
	case $badge == "owner" AND $custom_badge == NULL:
	   break;
}
echo json_encode(array(
    'username' => $details["username"],
    'bio' => $details["bio"],
    'badge' =>$cbadge ,
    'customStars' => $details['custom_stars'],
    'customRank' => $details['custom_rank'],
    'oldHeader' => filter_var($details["old_header"], FILTER_VALIDATE_BOOLEAN),
    'status' => $details["status"],
    'audio' => "http://clitoriz.cf/songs/" . $details["song"] . "." . $details["audio_file_type"],
    'audioAutoplay' => filter_var($details["audio_autoplay"], FILTER_VALIDATE_BOOLEAN),
    'videoAccess' => filter_var($details["video_access"], FILTER_VALIDATE_BOOLEAN),
    'video' => "http://clitoriz.cf/videos/" . $details["video"] . ".mp4",
    'css' => base64_encode($details['css']) ,
    'picture' => "http://clitoriz.cf/images/pfps/" . $details['pfp'] . '.gif',
    'comments' => $jsonarr,
    'friends' => $frarr,
));

?>
