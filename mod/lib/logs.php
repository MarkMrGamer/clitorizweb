<?php
// This thing grabs logs from the
// database so moderators can check 
// without the log showing the ip

$logs = NULL;
GrabLogs($logs, $conn);
?>