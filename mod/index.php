<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/require/session.php"); ?>
<?php require("lib/webserver_status.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="styles/mod.css">
   </head>
   <body>
      <center>
         <?php require("lib/require/header/header.php"); ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2"><font size="+1"><b>webserver status</b></font><br><br>
                     <b>Allocated space for PHP:</b> <b><?php echo convert(memory_get_usage(true)); ?></b><br>
                     <b>PHP version:<b> <?php echo phpversion() ?><br>
                     <b>CPU usage:</b>  <?php echo $cpu['sys'] . "%"; ?>
                  </td>
               </tr>
            </tbody>
         </table>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2"><font size="+1"><b>mod panel</b></font><br><br>
                     <font size="2"><b>Users</b></font><br>
                     <a href="user.php">Play with users</a><br>
                     <a href="compare_user.php">Compare users</a><br>
                     <br>
                     <font size="2"><b>Reports</b></font><br>
                     <a href="reports.php">Check reports</a><br>
                     <a href="logs.php">Check the audit log</a><br>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("../lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>