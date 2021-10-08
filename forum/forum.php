<?php require("../lib/require/session.php"); ?>
<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/threads.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="../styles/main.css">
      <link rel="shortcut icon" href="/favicon.ico" />
   </head>
   <body>
      <center>
         <?php require("../lib/require/header/header.php"); ?>
         <div style="padding-top: 5px;">
            <table width="440" class="BorderStrip" border="1">
               <tbody>
                  <tr class="blackstrip3" height="20">
                     <td class="blackstrip3">
                        <table>
                           <tbody>
                              <tr>
                                 <td class="blackstrip4">
                                    Threads
                                 </td>
                                 <td>
                                    <a href="new_thread.php?id=<?php echo $_GET["id"]; ?>"><img src="images/newThread.png"></a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td class="blackstrip3" align="center">Replies</td>
                     <td class="blackstrip3" align="center">Date Created</td>
                  </tr>
                  <?php
                     while($row = $threads->fetch_assoc()) {
                     ?>
                  <tr class="hmcontainer">
                     <td class="hmcontainer2" height="30">
                        <table>
                           <tbody>
                              <tr>
                                 <td>
                                    <table>
                                       <tbody>
                                          <tr>
                                             <td><?php if ($row["thread_locked"] == "yes" AND $row["thread_pinned"] == "yes") { ?><img src="images/pinned_locked.png"><?php } ?> <?php if ($row["thread_locked"] == "yes" AND $row["thread_pinned"] == "no") { ?><img src="images/locked.png"><?php } ?> <?php if ($row["thread_pinned"] == "yes" AND $row["thread_locked"] == "no") { ?><img src="images/pinned.png"><?php } ?></td>
                                             <td><font class="UserProfile" size="1"><a href="/forum/thread.php?id=<?php echo $row["thread_id"]; ?>"><b><?php echo $row["thread_title"]; ?></b></a> by <?php echo $row["thread_author"]; ?> <?php if (isset($username)) { if ($username == $row["thread_author"] OR $user["badge"] == "administrator" ) { ?>(<a href="thread.php?delete_thread=<?php echo $row["thread_id"]; ?>">Delete</a>)<?php } } ?> <?php if (isset($username)) { if ($user["badge"] == "administrator"  AND $row["thread_pinned"] == "no") { ?>(<a href="thread.php?pin_thread=<?php echo $row["thread_id"]; ?>">Pin</a>)<?php } } ?> <?php if (isset($username)) { if ($user["badge"] == "administrator" AND $row["thread_pinned"] == "yes") { ?>(<a href="thread.php?unpin_thread=<?php echo $row["thread_id"]; ?>">Unpin</a>)<?php } } ?> <?php if (isset($username)) { if ($user["badge"] == "administrator"  AND $row["thread_locked"] == "no") { ?>(<a href="thread.php?lock_thread=<?php echo $row["thread_id"]; ?>">Lock</a>)<?php } } ?> <?php if (isset($username)) { if ($user["badge"] == "administrator"  AND $row["thread_locked"] == "yes") { ?>(<a href="thread.php?unlock_thread=<?php echo $row["thread_id"]; ?>">Unlock</a>)<?php } } ?> <?php if (isset($username)) { if ($user["badge"] == "moderator" ) { ?>(<a href="thread.php?delete_thread=<?php echo $row["thread_id"]; ?>">Delete</a>)<?php } } ?> <?php if (isset($username)) { if ($user["badge"] == "moderator"  AND $row["thread_pinned"] == "no") { ?>(<a href="thread.php?pin_thread=<?php echo $row["thread_id"]; ?>">Pin</a>)<?php } } ?> <?php if (isset($username)) { if ($user["badge"] == "moderator" AND $row["thread_pinned"] == "yes") { ?>(<a href="thread.php?unpin_thread=<?php echo $row["thread_id"]; ?>">Unpin</a>)<?php } } ?> <?php if (isset($username)) { if ($user["badge"] == "moderator"  AND $row["thread_locked"] == "no") { ?>(<a href="thread.php?lock_thread=<?php echo $row["thread_id"]; ?>">Lock</a>)<?php } } ?> <?php if (isset($username)) { if ($user["badge"] == "moderator"  AND $row["thread_locked"] == "yes") { ?>(<a href="thread.php?unlock_thread=<?php echo $row["thread_id"]; ?>">Unlock</a>)<?php } } ?></font></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td class="hmcontainer2" width="45" height="30">
                        <table align="center">
                           <tbody>
                              <tr>
                                 <td><font class="UserProfile" size="-2"><?php require("lib/replies.php"); ?></font></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td class="hmcontainer2" width="81" height="30">
                        <table align="center">
                           <tbody>
                              <tr>
                                 <td><font class="UserProfile" size="-2"><?php $date = strtotime($row["thread_date"]); echo date('d M y', $date); ?></font></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <?php
                     }
                     ?>
               </tbody>
            </table>
         </div>
         <?php require("../lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>