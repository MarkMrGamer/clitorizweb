<?php
$author_name = $thread_details["thread_author"];
$post_counter = NULL;
$post_counter2 = NULL;
GetThreadFromAuthor($author_name, $conn);
GetRepliesFromAuthor($author_name, $conn);
$thread_rows = $post_counter->num_rows;
$replies_rows = $post_counter2->num_rows;
$post_counter4 = $thread_rows+$replies_rows;
?>