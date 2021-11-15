<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/require/session.php"); ?>
<?php require("lib/rank_settings.php"); ?>
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
                     <font size="+1"><b>rank settings for <?php echo $details["username"]; ?></b></font>
                     <br>
                     <br>
                     <form action="rank_settings.php?name=<?php echo $details["username"]; ?>" method="POST" enctype="multipart/form-data">
                        <label>badge:</label> <input class="UpdateText" type="text" name="badge" value="<?php echo $details["badge"]; ?>"><br><br>
                        <label>
                           custom badge: 
                           <select id="custom_badge" name="custom_badge">
                              <option value="">NONE</option>
                              <?php 
                                 while($badge_row = $custom_badges->fetch_assoc()) { 
                                 ?>
                              <option value="<?php echo $badge_row["badge_name"]; ?>"><?php echo $badge_row["badge_name"]; ?></option>
                              <?php
                                 }
                                 ?>
                           </select>
                           <br><br>
                        <label>custom rank:</label> <input class="UpdateText" type="text" name="custom_rank" value="<?php echo $details["custom_rank"]; ?>"><br><br>
                        <label>custom stars:</label> <input class="UpdateText" type="text" name="custom_stars" value="<?php echo $details["custom_stars"]; ?>"><br><br>
                        <br><br><input class="updateSubmit" type="submit" name="update" value="Update">
                     </form>
                     <br>
                     <?php require("lib/user/counter.php"); ?>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("../lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>