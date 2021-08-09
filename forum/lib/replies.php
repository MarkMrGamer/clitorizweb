<?php
$thread_name = $row["thread_id"];
		
$replies = NULL;
GetRepliesFromThread($thread_name, $conn);
echo $replies->num_rows;
?>
