<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/require/session.php"); ?>
<?php require("lib/announce_message.php"); ?>
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
                  <td class="hmcontainer2">
                     <font size="+1"><b>Announce a message</b></font>
                     <br>
                     <br>
                     <form action="announce_message.php" method="POST" enctype="multipart/form-data">
                        <label>text:</label> <input class="UpdateText" type="text" name="text_announce"><br><br>
                        <label>bgcolor:</label> <input class="UpdateText" type="color" name="bgcolor_announce"><br><br>
                        <label>textcolor:</label> <input class="UpdateText" type="color" name="textcolor_announce"><br><br>
                        <br><br><input class="updateSubmit" type="submit" name="announce" value="Announce message"> <input class="updateSubmit" type="submit" name="clear" value="clear">
                     </form>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("../lib/require/footer/footer.php"); ?>
      
   </body>
</html>