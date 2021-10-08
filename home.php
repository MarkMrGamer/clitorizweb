<?php require("lib/require/session.php"); ?>
<?php require("lib/session/session.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/config/database.php"); ?>
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
               <td class="hmcontainer2"><font size="+1"><b>Welcome, <?php echo $_SESSION["user"]; ?></b></font><br><br><img src="/images/icons/card.png"> <font class="UserProfile" size="-2"><a href="settings.php">Settings</a></font> 
               <tr>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>