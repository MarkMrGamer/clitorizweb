<?php
//Some weird ass code from the internet
$cpu = [];

function convert($size)
{
    $unit = ["B", "KB", "MB", "GB", "TB", "PB"];
    return @round($size / pow(1024, $i = floor(log($size, 1024))), 2) .
        " " .
        $unit[$i];
}

if (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") {
    $cpu["sys"] = 0;
    return;
}

$stat1 = file("/proc/stat");
sleep(1);
$stat2 = file("/proc/stat");
$info1 = explode(" ", preg_replace("!cpu +!", "", $stat1[0]));
$info2 = explode(" ", preg_replace("!cpu +!", "", $stat2[0]));
$dif = [];
$dif["user"] = $info2[0] - $info1[0];
$dif["nice"] = $info2[1] - $info1[1];
$dif["sys"] = $info2[2] - $info1[2];
$dif["idle"] = $info2[3] - $info1[3];
$total = array_sum($dif);
foreach ($dif as $x => $y) {
    $cpu[$x] = round(($y / $total) * 100, 1);
}
?>
