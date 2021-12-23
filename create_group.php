<?php require("lib/require/session.php"); ?>
<?php require("lib/session/session.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/create_group.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="../styles/main.css">
      <link rel="shortcut icon" href="/favicon.ico" />
   </head>
   <body>
      
         <?php require("lib/require/header/header.php"); ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <font size="+1"><b>new group</b></font>
                     <br>
                     <br>
                     <form action="create_group.php" method="POST" enctype="multipart/form-data">
                        <label>name:</label> <input class="UpdateText" type="text" name="name"><br><br>
                        <label style="vertical-align: top;">description:</label> <textarea name="description" class="UpdateText" style="width:300px;height:100px;"></textarea><br><br>
						<label>group picture:</label> <input type="file" name="fileupload" id="fileupload" />
                        <br><br><input class="updateSubmit" type="submit" name="create" value="Create Group">
                     </form>
                     <br>
                     <?php require("lib/create_group/counter.php"); ?>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("lib/require/footer/footer.php"); ?>
      
   </body>
</html>