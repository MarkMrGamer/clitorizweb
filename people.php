<?php require("lib/require/session.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/users.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="styles/main.css">
      <link rel="shortcut icon" href="/favicon.ico" />
   </head>
   <body>
      
         <?php require("lib/require/header/header.php"); ?>
         <?php 
            while($row = $users->fetch_assoc()) { 
            ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <table>
                        <tbody>
                           <tr>
                              <td><img src="<?php require("lib/pfp.php"); ?>" height="32" width="32" border="1"><br></td>
                              <td><font size="+1" class="UserProfile"><a href="profile.php?user=<?php echo $row['username']; ?>"><?php  if ($row['nickname'] == NULL) { echo $row['username'];  } else {  echo $row['nickname']; } ?></a></font> <?php if (!empty($row['badge'])) { ?><img src="<?php  $custom_badge = $row['custom_badge']; $badge = $row['badge']; require("lib/badge.php"); ?>"><?php } ?><br>
                                 <font class="UserProfile" size="-2"><a href="profile.php?user=<?php echo $row['username']; ?>"><b>@<?php echo $row['username']; ?></b></a></font><font class="UserProfile" size="-2"><?php require("lib/friend3.php"); ?></font><br>
								 <?php if (!empty($row['status'])) { ?><font class="UserProfile" size="-2"><?php echo $row['status']; ?></font><?php } ?>
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
            ?>
         <?php require("lib/require/footer/footer.php"); ?>
      
	  
   </body>
</html>