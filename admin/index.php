<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/require/session.php"); ?>
<?php require("lib/webserver_status.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="styles/admin.css">
   </head>
   <body>
      
         <?php require("lib/require/header/header.php"); ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2"><font size="+1"><b>webserver status</b></font><br><br>
                     <b>Allocated space for PHP:</b> <b><?php echo convert(memory_get_usage(true)); ?></b><br><br>
                     <b>PHP version:<b> <?php echo phpversion() ?><br><br>
                     <b>FFMPEG version:<b> <?php echo str_replace("ffmpeg version ", "", substr( shell_exec('ffmpeg -version') , 0, strpos( shell_exec('ffmpeg -version') , "Copyright (c)"))) ?><br><br>
                     <b>OS version:<b> <?php echo php_uname() ?><br><br>
                     <?php if ($cpu['sys'] != 0) { echo "<b>CPU usage: " . $cpu['sys'] . "%</b><br><br> "; } ?>
                  </td>
               </tr>
            </tbody>
         </table>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2"><font size="+1"><b>admin panel</b></font><br><br>
                     <font size="2"><b>Users</b></font><br>
                     <a href="user.php">Play with users</a><br>
                     <a href="compare_user.php">Compare users</a><br>
                     <br>
                     <font size="2"><b>Reports</b></font><br>
                     <a href="reports.php">Check reports</a><br>
                     <a href="logs.php">Check the audit log</a><br>
                     <a href="announce_message.php">Announce a message</a><br>
                     <a href="add_notes.php">Add notes about the website</a><br>
                     <br>
                     <font size="2"><b>Badges</b></font><br>
                     <a href="custom_badges.php">Create a custom badge</a><br>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("../lib/require/footer/footer.php"); ?>
      
   </body>
</html>