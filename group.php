<?php require("lib/require/session.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/group.php"); ?>
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
                     <table>
                        <tbody>
                           <tr>
                              <td><img class="pfp" alt="" src="<?php echo $groups2["group_photo"]; ?>"><br></td>
                              <td style="vertical-align: top;"><font size="+1" class="UserProfile"><a href="group.php?id=1"><?php echo $groups2["group_name"]; ?></a></font><br><font size="1" class="UserProfile"><?php echo $groups2["group_description"]; ?></font>
                                 <br><br>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
         <div class="container">
            <div class="column">
            <div class="window">
               <table class="BorderStrip" width="225">
                  <tbody>
                     <tr class="blackstrip3" height="20">
                        <td class="blackstrip3">Group Members</td>
                     </tr>
                     <tr class="hmcontainer">
                        <td class="hmcontainer2">
                           <table>
                              <tbody>
                                 <tr></tr>
                                 <tr>
								<?php 
								    $counter1 = 0;
									while($user_rows = $group_users->fetch_assoc()) {
										$theuser = $user_rows["group_user"];
										$get_details3 = NULL;
										GetUserDetails($theuser, $conn);
										$get_detail2 = $get_details3->fetch_assoc();
								?>
                                    <td>
                                       <font class="UserProfile" size="-2"><img src="/images/pfps/<?php echo $get_detail2["pfp"]; ?>.gif" width="16" height="15" border="1"> <a href="profile.php?user=<?php echo $get_detail2["username"]; ?>" style="vertical-align: top;"><?php echo $get_detail2["username"]; ?></a>
									   <?php if (isset($_SESSION["user"])) { if ($username == $groups2["group_owner"]) { ?>(<a href="group.php?id=<?php echo $groups2["id"]; ?>&kick=<?php echo $get_detail2["username"]; ?>">Kick</a>)</font><?php } } ?></font>
                                    </td>
                                <?php
								    $counter1++;
									if ($counter1 == 3) {
										echo "</tr>";
										$counter = 0;
									}
									  
									}
									
								?>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="window">
               <table class="BorderStrip" width="225">
                  <tbody>
                     <tr class="blackstrip3" height="20">
                        <td class="blackstrip3">Group Actions</td>
                     </tr>
                     <tr class="hmcontainer" height="55">
                        <td class="hmcontainer2" align="center">
                           <form method="POST" action="group.php?id=<?php echo $groups2["id"]; ?>">
							  <input type="text" name="group_title" value="<?php echo $groups2["group_name"]; ?>" style="display:none;">
							  <input type="text" name="group_owner" value="<?php echo $groups2["group_owner"]; ?>" style="display:none;">
							  <input type="text" name="group_id" value="<?php echo $groups2["id"]; ?>" style="display:none;">
							  <?php if (isset($_SESSION["user"])) { 
							    if ($_SESSION["user"] != $groups2["group_owner"]) {
									$title = $groups2["group_name"];
									$group_id = $groups2["id"];
									
									$usergroup = NULL;
									CheckUserInGroup($title, $username, $conn);
									
									$user = $usergroup->fetch_assoc();
									if ($user["group_user"] == NULL) {
							  ?>
									<input type="submit" class="updateSubmit" value="Join" style="width:180px;margin-top:10px;margin-bottom:10px;" name="join">
							    <?php
										}
									}
							    }
							    ?>
								
							  <?php if (isset($_SESSION["user"])) { 
							    if ($_SESSION["user"] != $groups2["group_owner"]) {
									$title = $groups2["group_name"];
									$group_id = $groups2["id"];
									
									$usergroup = NULL;
									CheckUserInGroup($title, $username, $conn);
									
									$user = $usergroup->fetch_assoc();
									if ($user["group_user"] != NULL) {
							  ?>
									<input type="submit" class="updateSubmit" value="Leave" style="width:180px;margin-top:10px;margin-bottom:10px;" name="leave">
							    <?php
										}
									}
							    }
							    ?>
                              <input type="submit" class="updateSubmit" value="Report" style="width:180px;" name="report">
                           </form>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            </div>
            <div class="column">
            <div class="window">
               <table width="210" class="BorderStrip">
                  <tbody>
                     <tr class="blackstrip3" height="20">
                        <td class="blackstrip3">Group Status</td>
                     </tr>
                     <tr class="hmcontainer">
                        <td class="hmcontainer2" valign="top">
                           <table>
                              <tbody>
                                 <tr>
                                    <td valign="top">
                                       <font size="1"><b>Owner:</b> <?php echo $groups2["group_owner"]; ?></font><br>
                                       <font size="1"><b>Members:</b> <?php $group_name1 = $groups2["group_name"]; require("lib/group_users.php"); ?></font><br>
                                       <font size="1"><a href="edit_group.php?id=1">Edit Group</a></font>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="window">
               <table width="210" class="BorderStrip">
                  <tbody>
                     <tr class="blackstrip3" height="20">
                        <td class="blackstrip3">Group Comments</td>
                     </tr>
                     <tr class="hmcontainer">
                        <td class="hmcontainer2" align="center" height="25">
                           <br>
                           <form action="profile.php?user=test" method="POST">
                              <input class="UpdateText" type="text" name="comment"> <input class="updateSubmit" type="submit" name="post" value="Post">
                           </form>
                        </td>
                     </tr>
                     <tr class="hmcontainer">
                        <td class="hmcontainer2" height="51">
                           <table>
                              <tbody>
                                 <tr>
                                    <td>
                                       <table>
                                          <tbody>
                                             <tr>
                                                <td><img src="/images/pfps/1.gif" height="32" width="32" border="1"><br></td>
                                                <td style="vertical-align: top;"><font size="-1" class="UserProfile"><a href="profile.php?user=test">test</a> | 08/17/2021</font><br>
                                                   <font class="UserProfile" size="-2">tst<font size="1">(<a href="profile.php?delete_comment=151">Delete</a>)</font></font>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div></div>
         </div>
         <?php require("lib/require/footer/footer.php"); ?>
      
   </body>
</html>