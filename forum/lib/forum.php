<?php
//forum php script by goom
//created: August 8, 2021

//get some threads from function
$threads = NULL;
GetThreads($conn);

//make it so it can show the threads count
$show_threads = $threads->num_rows;
?>