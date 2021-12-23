<?php require("lib/require/session.php"); ?>
<?php require("lib/login/session.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/login.php"); ?>
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
                     <font size="+1"><b>clitorizweb login</b></font>
                     <br>
                     <br>
                     <form action="login.php" method="POST">
                        <label>username:</label> <input class="loginText" type="text" name="username"><br><br>
                        <label>password:</label> <input class="loginText" type="password" name="password"><br><br><input class="loginSubmit" type="submit" name="login" value="Login"> or <a href="signup.php">sign up</a>
                     </form>
                     <?php require("lib/login/counter.php"); ?> 
                     <br> 
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("lib/require/footer/footer.php"); ?>
      
   </body>
</html>