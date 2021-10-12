
<?php 
require("../../lib/config/database.php"); 
require("../../lib/config/functions.php"); 
require("../../forum/lib/thread.php");
require("../../forum/lib/forum_post_counter2.php");

header("Content-Type: application/json");

$count = 0;
$jsonarr = array();

while($replies_details = $replies->fetch_assoc()) {
 $author2 = $replies_details['post_author'];
 $replies_author = NULL;
 GetPostAuthor($author2, $conn);
 $author_details2 = $replies_author->fetch_assoc();
 require("../../forum/lib/forum_post_counter1.php");
 $jsonarr[$count] = array('text' => $replies_details["post_text"], 'date' => strtotime($replies_details["post_date"]),  'author' => $author_details2["username"],  'authorPostcount' => $post_counter3,  'authorStars' => $author_details2["custom_stars"],  'authorRank' => $author_details2["custom_rank"],  'authorPicture' => $author_details2["pfp"], 'authorCustombadge' => $author_details2["custom_badge"],'authorBadge' => $author_details2["badge"]);
 $count = $count + 1;
}

echo json_encode(array('threadLocked' => $thread_details["thread_locked"], 'threadDate' => strtotime($thread_details["thread_date"]), 'threadText' => $thread_details["thread_text"], 'threadTitle' => $thread_details["thread_title"], 'authorUsername' => $author_details["username"], 'authorPostcount' => $post_counter4, 'authorStars' => $author_details["custom_stars"], 'authorRank' => $author_details["custom_rank"], 'authorCustombadge' => $author_details["custom_badge"],  'authorBadge' => $author_details["badge"], 'authorPicture' => $author_details["pfp"], 'replies' => $jsonarr));

?>
