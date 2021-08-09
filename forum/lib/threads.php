<?php
//threads php script by goom
//created: August 8, 2021

if (isset($_GET["id"])) { 
    if ($_GET["id"] == 1) {
		$forum = "discussion";
		
		$threads = NULL;
        GetThreadsFromForumName($forum, $conn);
	} else {
		header("Location: /forum/");
	}
}

if (!isset($_GET["id"])) { 
    header("Location: /forum/");
}
?>