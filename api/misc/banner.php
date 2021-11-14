<?php
require ("../../lib/config/database.php");
require ("../../lib/config/functions.php");

header("Content-Type: application/json");

$bsql = $conn->query("SELECT * FROM clitorizweb_banner"); // calls for channel info
$bfetch = $bsql->fetch_assoc();

echo json_encode(array(
    'text' => $bfetch['bannertext'],
    'textColor' =>  $bfetch['textcolor'],
    'backgroundColor' =>  $bfetch['bannercolor']
));

?>
