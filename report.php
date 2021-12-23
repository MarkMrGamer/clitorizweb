<?php require("lib/require/session.php"); ?>
<?php require("lib/session/session.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/report.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="styles/main.css">
      <link rel="shortcut icon" href="/favicon.ico" />
   </head>
   <body>
      
         <?php require("lib/require/header/header.php"); ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <font size="+1"><b>report <?php echo $details["username"]; ?></b></font>
                     <br>
                     <br>
                     <form action="report.php?user=<?php echo $details["username"]; ?>" method="POST" enctype="multipart/form-data">
                        <label>reason:</label> <input class="UpdateText" type="text" name="reason"><br><br>
                        <label style="vertical-align: top;">short desc:</label> <textarea name="short_desc" class="UpdateText" style="width:300px;height:100px;"></textarea><br><br>
                        <br><br><input class="updateSubmit" type="submit" name="report" value="Report">
                     </form>
                     <br>
                     <?php require("lib/report/counter.php"); ?>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("lib/require/footer/footer.php"); ?>
      
   </body>
</html>