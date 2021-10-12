
<?php 
require("../../lib/config/database.php"); 
require("../../lib/config/functions.php"); 
require("../../lib/profile.php"); 
require("../../forum/lib/threads.php");

header("Content-Type: application/json");

$count = 0;
$jsonarr = array();

while($row = $threads->fetch_assoc()) {
 $replies = NULL;
 GetRepliesFromThread($row['thread_id'], $conn);
 $jsonarr[$count] = array('id' => $row['thread_id'], 'locked' => $row['thread_locked'], 'pinned' => $row['thread_pinned'], 'author' => $row['thread_author'], 'title' => $row['thread_title'], 'replyCount' => $replies->num_rows);
 $count = $count + 1;
}

echo json_encode($jsonarr);

?>
