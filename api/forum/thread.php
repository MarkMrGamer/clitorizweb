<?php
require ("../../lib/config/database.php");
require ("../../lib/config/functions.php");
require ("../../forum/lib/thread.php");
require ("../../forum/lib/forum_post_counter2.php");
header("Content-Type: application/json");
$count = 0;
$jsonarr = array();
$cbadge;
$badge;
$custom_badge;

while ($replies_details = $replies->fetch_assoc())
{
    $author2 = $replies_details['post_author'];
    $replies_author = NULL;
    GetPostAuthor($author2, $conn);
    $author_details2 = $replies_author->fetch_assoc();
    require ("../../forum/lib/forum_post_counter1.php");
    $custom_badge =  $row['custom_badge'];

$badge =  $author_details2["badge"];
$custom_badge =  $author_details2["custom_badge"];

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

    $jsonarr[$count] = array(
        'text' => $replies_details["post_text"],
        'date' => strtotime($replies_details["post_date"]) ,
        'author' => $author_details2["username"],
        'authorPostcount' => $post_counter3,
        'authorStars' => $author_details2["custom_stars"],
        'authorRank' => $author_details2["custom_rank"],
        'authorPicture' => "http://clitoriz.cf/images/pfps/" .$author_details2["pfp"].".gif",
        'authorBadge' => $cbadge
    );
    $count = $count + 1;
}


$badge =  $author_details["badge"];
$custom_badge =  $author_details["custom_badge"];

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
    'threadLocked' => filter_var($thread_details["thread_locked"], FILTER_VALIDATE_BOOLEAN) ,
    'threadPinned' => filter_var($thread_details["thread_pinned"], FILTER_VALIDATE_BOOLEAN) ,
    'threadDate' => strtotime($thread_details["thread_date"]) ,
    'threadText' => $thread_details["thread_text"],
    'threadTitle' => $thread_details["thread_title"],
    'authorUsername' => $author_details["username"],
    'authorPostcount' => $post_counter4,
    'authorStars' => $author_details["custom_stars"],
    'authorRank' => $author_details["custom_rank"],
    'authorBadge' => $cbadge,
    'authorPicture' => "http://clitoriz.cf/images/pfps/" .$author_details["pfp"].".gif",
    'replies' => $jsonarr
));
?>
