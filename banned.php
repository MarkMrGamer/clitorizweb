<?php require("lib/require/session.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/banned.php"); ?>
<html>
   <head>
      <title>clitorizweb | Account Banned</title>
      <link rel="stylesheet" href="styles/main.css">
      <link rel="shortcut icon" href="/favicon.ico" />
   </head>
   <body>
      <center>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <font size="+1"><b>Account Banned</b></font><br><br> <font size="1">You have been banned for <?php $now = time(); $date = strtotime($banned["ban_date"]); $datediff = $date - $now; echo round($datediff / (60 * 60 * 24)); ?> days</font>
                     <br><br><font size="1"><b>Moderator note</b>: <?php echo $banned["ban_note"]; ?></font><br>
                     <br>
                     <font size="1">If you try to bypass your ban or other things like ban evading, <br> your account ban time will be extended.</font><br><br>
                     <center>
                        <form action="/logout.php"><input type="submit" value="Log Out" class="updateSubmit"></form>
                     </center>
                  </td>
               </tr>
            </tbody>
         </table>
      </center>
   </body>
</html>