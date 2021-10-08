<?php require("lib/require/session.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("../lib/config/database.php"); ?>
<?php require("lib/ban.php"); ?>
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
                     <font size="+1"><b>Unban a user</b></font>
                     <br>
                     <br>
                     <form action="unban.php" method="POST" enctype="multipart/form-data">
                        <label>username:</label> <input class="UpdateText" type="text" name="username">
                        <br>
                        <br>
                        <input class="updateSubmit" type="submit" name="unban" value="Unban">
                     </form>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("../lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>