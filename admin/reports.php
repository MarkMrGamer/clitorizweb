<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/require/session.php"); ?>
<?php require("lib/reports.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="styles/admin.css">
   </head>
   <body>
      <center>
         <?php require("lib/require/header/header.php"); ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <font size="2"><b>Check reports</b></font><br>
                     <font size="2">Moderation actions</font><br>
                     <a href="ban.php">Ban a user</a>
                     <br><a href="unban.php">Unban a user</a>
                     <br>
                     <br>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php
            while ($row = $reports->fetch_assoc()) {
            ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <font size="2"><b>User reported</b>: <?php echo $row["report_name"]; ?></font>
                     <br>
                     <font size="2">Reason: <?php echo $row["report_reason"]; ?></font><br>
                     <font size="2">Description: <?php echo $row["report_description"]; ?></font><br>
                     <font size="2">Report by: <?php echo $row["user_reporter"]; ?></font><br>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php
            }
            ?>
         <?php require("../lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>