<?php
// 8/16/2021
// credits to EQman for the code
// thank you

$bsql = $conn->query("SELECT * FROM clitorizweb_banner"); // calls for channel info
$bfetch = $bsql->fetch_assoc();

$text = htmlspecialchars($bfetch['bannertext']);
$textcolor = $bfetch['textcolor'];
$bcolor = $bfetch['bannercolor'];

if (empty($text) == FALSE) {
    echo "<table bgcolor='$textcolor' width='440' class='banner-alert'> <tr><td><font color='$bcolor'>$text</font></td></tr></table>";
}
?>