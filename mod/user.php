<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/require/session.php"); ?>
<?php require("lib/user.php"); ?>
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
                     <?php if (isset($_GET["name"])) { ?>
                     <font size="2"><?php echo $details["username"]; ?></font>
                     <hr width="150" align="left">
                     <a href="settings.php?name=<?php echo $details["username"]; ?>">Change settings</a>
                     <br>
                     <br>
                     <?php } else { ?>
                     <font size="2">Choose a user:</font>
                     <form action="user.php" method="POST">
                        <label>username:</label> <input type="text" name="username"> <input class="updateSubmit" type="submit" name="get_user" value="Get User">
                     </form>
                     <?php 
                        }
                        ?>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php if (isset($_GET["name"])) { ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2" width="144" valign="top">
                     <font size="+1">settings</font>
                  </td>
                  <td class="hmcontainer2" align="center">
                     <form action="user.php?name=<?php echo $details["username"]; ?>" method="POST" enctype="multipart/form-data">
                        <label>pfp:</label> <input type="file" name="fileupload" id="fileupload" style="width:200px;"><input class="updateSubmit" type="submit" name="clear1" value="clear"><br><br>
                        <label>audio:</label> <input type="file" name="fileupload2" id="fileupload2" style="width:200px;"><input class="updateSubmit" type="submit" name="clear2" value="clear"><br>
                        <br><label>video:</label> <input type="file" name="fileupload3" id="fileupload3" style="width:200px;"><input class="updateSubmit" type="submit" name="clear3" value="clear">
                        <br><br><br><input class="updateSubmit" type="submit" name="update" value="Update"><br><br>
                        <?php require("lib/user/counter.php"); ?>
                     </form>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php } ?>
         <?php 
            if (!isset($_GET["name"])) {
                while($row = $users->fetch_assoc()) { 
            ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <table>
                        <tbody>
                           <tr>
                              <td><img src="<?php require("../lib/pfp.php"); ?>" height="32" width="32" border="1"><br></td>
                              <td><font size="+1" class="UserProfile"><a href="../profile.php?user=<?php echo $row['username']; ?>"><?php echo $row['username']; ?></a></font> <?php if (!empty($row['badge'])) { ?><img src="<?php  $custom_badge = $row['custom_badge']; $badge = $row['badge']; require("../lib/badge.php"); ?>"><?php } ?><br>
                                 <?php if (!empty($row['status'])) { ?><font class="UserProfile" size="-2"><?php echo $row['status']; ?></font><?php } ?> <font class="UserProfile" size="-2"><?php require("../lib/friend3.php"); ?></font>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php
            }
            }
            ?>
         <?php require("../lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>