<?php
require ("../../lib/config/database.php");
require ("../../lib/config/functions.php");
require ("../../lib/profile.php");
require ("../../forum/lib/forum_post_counter3.php");

$count = 0;
$jsonarr = array();
$frarr = array();
$frarr2 = array();

header("Content-Type: application/json");

if (empty($_GET["user"]))
{
    echo json_encode(array(
        'error' => "No user provided"
    ));
    die();
}

function GetBadge(string $custom_badge, string $badge)
{
    $return = "";
case $custom_badge != NULL:
    $get_custom_badge = NULL;
    GetCustomBadge($custom_badge, $conn);
    $badge_detail = $get_custom_badge->fetch_assoc();
    $return = "/images/custom_badges/" . $badge_detail["badge_pic"] . ".gif";
    break;
case $badge == "user" and $custom_badge == NULL:
    $return = "/images/badges/user.png";
    break;
case $badge == "verified" and $custom_badge == NULL:
    $return = "/images/badges/verified.png";
    break;
case $badge == "moderator" and $custom_badge == NULL:
    $return = "/images/badges/moderator.png";
    break;
case $badge == "administrator" and $custom_badge == NULL:
    $return = "/images/badges/administrator.png";
    break;
case $badge == "pfp_creator" and $custom_badge == NULL:
    $return = "/images/badges/pfp_creator.png";
    break;
case $badge == "portal2" and $custom_badge == NULL:
    $return = "/images/badges/portal2.png";
    break;
case $badge == "owner" and $custom_badge == NULL:
    break;
    return $return;
}

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
        $count = 0;
        while ($friend_details = $friend->fetch_assoc())
        {
            $count++;
            $friend_details1 = $friend_details['buddy2'];
            $friend_details2 = NULL;
            $get_friend = NULL;
            GetUserFriend($friend_details1, $conn);
            $frarr[$count] = array(
                'name' => $friend_details2["username"],
                'picture' => $friend_details2["pfp"]
            );
        }
    }
    if ($friend2->num_rows > 0)
    {
        $count = 0;
        while ($friend_details_2 = $friend2->fetch_assoc())
        {
            $counter2++;
            $friend_details3 = $friend_details_2['buddy1'];
            $friend_details4 = NULL;
            $get_friend2 = NULL;
            GetUserFriend2($friend_details1, $conn);
            $frarr2[$count] = array(
                'name' => $friend_details4["username"],
                'picture' => $friend_details4["pfp"]
            );
        }
    }
}

echo json_encode(array(
    'username' => $details["username"],
    'bio' => $details["bio"],
    'badgeImage' => GetBadge($details["custom_badge"], $details["badge"]) ,
    'customStars' => $details['custom_stars'],
    'customRank' => $details['custom_rank'],
    'status' => $details["status"],
    'audio' => $details["song"] . "." . $details["audio_file_type"],
    'audioAutoplay' => $details["audio_autoplay"],
    'videoAccess' => $details['video_access'],
    'video' => $details["video"] . ".mp4",
    'css' => base64_encode($details['css']) ,
    'picture' => $details['pfp'] . '.gif',
    'comments' => $jsonarr,
    'friend' => $frarr,
    'friend2' => $frarr2
));

?>
