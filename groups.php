<?php require("lib/require/session.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/groups.php"); ?>
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
                     <font size="+1"><b>groups</b></font> <font size="1">| <a href="create_group.php">Create a group</a></font>
					 <?php 
					    while($groups2 = $groups->fetch_assoc()) {
					 ?>
                     <table class="hmcontainer" width="430" align="center">
                        <tbody>
                           <tr>
                              <td class="hmcontainer2">
                                 <table>
                                    <tbody>
                                       <tr>
                                          <td><img src="<?php echo $groups2["group_photo"]; ?>" height="32" width="32" border="1"><br></td>
                                          <td><font size="+1" class="UserProfile"><a href="group.php?id=<?php echo $groups2["id"]; ?>"><?php echo $groups2["group_name"]; ?></a></font> <br>
                                             <font class="UserProfile" size="-2"><?php echo $groups2["group_description"]; ?> | <?php $group_name1 = $groups2["group_name"]; require("lib/group_users.php"); ?> members</font> <font class="UserProfile" size="-2"></font>
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
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>