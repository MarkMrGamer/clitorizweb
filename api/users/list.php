<?php 
require("../lib/config/database.php"); 
require("../lib/config/functions.php"); 
require("../lib/users.php"); 

header("Content-Type: text/plain");

while($row = $users->fetch_assoc()) { 
 echo $row['username'];
}
?>

