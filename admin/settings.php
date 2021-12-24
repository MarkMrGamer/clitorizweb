<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/require/session.php"); ?>
<?php require("lib/settings.php"); ?>
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
                     <font size="+1"><b>settings for <?php echo $details["username"]; ?></b></font>
                     <br>
                     <br>
                     <form action="settings.php?name=<?php echo $details["username"]; ?>" method="POST" enctype="multipart/form-data">
                        <a href="settings.php?reset_password=<?php echo $details["username"]; ?>">reset password</a><br><br>
                        <label>status:</label> <input class="UpdateText" type="text" name="status" value="<?php echo $details["status"]; ?>"><br><br>
                        <label style="vertical-align: top;">css:</label> <textarea name="css" class="UpdateText" style="width:300px;height:100px;"><?php echo $details["css"]; ?></textarea><br><br>
                        <label style="vertical-align: top;">bio:</label> <textarea name="bio" class="UpdateText" style="width:300px;height:100px;"><?php echo $details["bio"]; ?></textarea><br>
                        <br><br><input class="updateSubmit" type="submit" name="update" value="Update">
                     </form>
                     <br>
                     <?php require("lib/settings/counter.php"); ?>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("../lib/require/footer/footer.php"); ?>
      
   </body>
</html>