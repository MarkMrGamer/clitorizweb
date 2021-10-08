<?php require("lib/require/session.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("../lib/config/database.php"); ?>
<?php require("lib/ban.php"); ?>
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
                  <td class="hmcontainer2">
                     <font size="+1"><b>Ban a user</b></font><br><font size="1">Can you ban an administrator? No</font>
                     <br>
                     <br>
                     <form action="ban.php" method="POST" enctype="multipart/form-data">
                        <label>username:</label> <input class="UpdateText" type="text" name="username">
                        <br><br><label>ban date:</label>
                        <input type="date" id="date" name="date"><br><br>
                        <label style="vertical-align: top;">moderation note:</label> <textarea name="note" class="UpdateText" style="width:300px;height:100px;"></textarea><br><br>
                        <input class="updateSubmit" type="submit" name="ban" value="Ban">
                     </form>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("../lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>