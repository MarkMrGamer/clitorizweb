
<?php
require("../../lib/config/database.php");
require("../../lib/config/functions.php");
require("../../forum/lib/threads.php");
header("Content-Type: application/json");
$count = 0;
$jsonarr = array();
while($row = $threads->fetch_assoc()) {
$replies = NULL;
GetRepliesFromThread($row['thread_id'], $conn);
$jsonarr[$count] = array('id' => $row['thread_id'], 'locked' => filter_var($row['thread_locked'], FILTER_VALIDATE_BOOLEAN) , 'pinned' => filter_var($row['thread_pinned'], FILTER_VALIDATE_BOOLEAN), 'author' => $row['thread_author'], 'title' => $row['thread_title'], 'replyCount' => $replies->num_rows);
$count = $count + 1;
}
echo json_encode($jsonarr);
?>
