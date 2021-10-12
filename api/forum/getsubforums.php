<?php 
require("../../lib/config/database.php"); 
require("../../lib/config/functions.php"); 
require("../../lib/profile.php"); 
require("../../forum/lib/forum.php");

header("Content-Type: application/json");

$jsonarr = array();

$jsonarr[0] = array('id' => 1, 'name' => "General Discussion", 'description' => "Talk about anything else.",'threadCount' => $show_threads);
$jsonarr[1] = array('id' => 2, 'name' => "Half-Life", 'description' => "Gordon Freeman in the flesh, or rather in the forums.",'threadCount' => $show_threads2);
$jsonarr[2] = array('id' => 3, 'name' => "Technology", 'description' => "Talk about tech stuff.",'threadCount' => $show_threads3);

echo json_encode($jsonarr);

?>
