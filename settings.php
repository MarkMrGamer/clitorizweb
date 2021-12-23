<?php require("lib/require/session.php"); ?>
<?php require("lib/session/session.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/settings.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="styles/main.css">
      <link rel="shortcut icon" href="/favicon.ico" />
   </head>
   <body>
      <center>
         <?php require("lib/require/header/header.php"); ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <font size="+1"><b>settings</b></font>
                     <br>
                     <br>
                     <form action="settings.php" method="POST" enctype="multipart/form-data">
                        <label>nickname:</label> <input class="UpdateText" type="text" name="nickname" value="<?php echo $user["nickname"]; ?>"><br><br>
                        <label>status:</label> <input class="UpdateText" type="text" name="status" value="<?php echo $user["status"]; ?>"><br><br>
                        <label>change password:</label> <input class="UpdateText" type="password" name="change_password"><br><br>
                        <label style="vertical-align: top;">css:</label> <textarea name="css" class="UpdateText" style="width:300px;height:100px;"><?php echo $user["css"]; ?></textarea><br><br>
                        <label style="vertical-align: top;">bio:</label> <textarea name="bio" class="UpdateText" style="width:300px;height:100px;"><?php echo $user["bio"]; ?></textarea><br><br>
						<label style="vertical-align: top;">audio autoplay:</label> <input type="checkbox" id="autoplay_toggle" name="autoplay_toggle" <?php if ($user["audio_autoplay"] == "true") { echo "checked=\"checked\""; } ?> value="true"><br><br>
						<label style="vertical-align: top;">old header:</label> <input type="checkbox" id="oldheader_toggle" name="oldheader_toggle" <?php if ($user["old_header"] == "true") { echo "checked=\"checked\""; } ?> value="true"><br><br>
                        <label>profile picture:</label> <input type="file" name="fileupload" id="fileupload" /><input class="updateSubmit" type="submit" name="clear1" value="clear"><br><br>
                        <label>audio profile:</label> <input type="file" name="fileupload2" id="fileupload2" /><input class="updateSubmit" type="submit" name="clear2" value="clear"><br><br>
						<label>banner:</label> <input type="file" name="fileupload4" id="fileupload4" /><input class="updateSubmit" type="submit" name="clear3" value="clear"><br>
                        <?php if ($user["video_access"] == "true") { ?><br><la	bel>video profile:</label> <input type="file" name="fileupload3" id="fileupload3" /><input class="updateSubmit" type="submit" name="clear3" value="clear"><br><?php } ?>
                        <br><br><input class="updateSubmit" type="submit" name="update" value="Update">
                     </form>
                     <br>
                     <?php require("lib/settings/counter.php"); ?>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>