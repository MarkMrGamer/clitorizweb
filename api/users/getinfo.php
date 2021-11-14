<?php
require ("../../lib/config/database.php");
require ("../../lib/config/functions.php");
require ("../../lib/profile.php");
require ("../../forum/lib/forum_post_counter3.php");

error_reporting(0);

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
            $frarr[$count] = array('name' => $friend_details2["username"], 'pfp' => $friend_details2["pfp"]);
        }
    }
    if ($friend2->num_rows > 0)
    {
        $count = 0;
        while ($friend_details_2 = $friend2->fetch_assoc())
        {
            $count++;
            $friend_details3 = $friend_details_2['buddy1'];
            $friend_details4 = NULL;
            $get_friend2 = NULL;
            GetUserFriend2($friend_details1, $conn);
            $frarr2[$count] = array('name' => $friend_details2["username"], 'pfp' => $friend_details2["pfp"]);
        }
    }
}

echo json_encode(array(
    'username' => $details["username"],
    'bio' => $details["bio"],
    'badge' =>$details["badge"],
    'customBadge' =>$details["custom_badge"],
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
