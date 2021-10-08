<?php
//forum php script by goom
//created: August 8, 2021

//get some threads from function
$forum = "discussion";
$forum2 = "halflife";
$forum3 = "technology";

//variables 2
$threads = NULL;
$threads2 = NULL;
$threads3 = NULL;

//variables 3
GetThreadsFromForumName($forum, $conn);
GetThreadsFromForumName2($forum2, $conn);
GetThreadsFromForumName3($forum3, $conn);

//make it so it can show the threads count
$show_threads = $threads->num_rows;
$show_threads2 = $threads2->num_rows;
$show_threads3 = $threads3->num_rows;
?>