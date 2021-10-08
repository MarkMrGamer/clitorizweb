<?php require("../lib/require/session.php"); ?>
<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/thread.php"); ?>
<?php require("lib/forum_post_counter2.php"); ?>
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
                     <td class="blackstrip3">Author</td>
                     <td class="blackstrip3" align="center"><?php echo $thread_details["thread_title"]; ?></td>
                  </tr>
                  <tr class="hmcontainer">
                     <td class="hmcontainer2" height="30" valign="top">
                        <table>
                           <tbody>
                              <tr>
                                 <td>
                                    <font size="1" class="Profile"><a href="/profile.php?user=<?php echo $author_details["username"]; ?>"><b><?php echo $author_details["username"]; ?></b></a></font><br>
                                    <img src="/images/pfps/<?php echo $author_details["pfp"]; ?>.gif" class="pfp">
                                    <font size="1" class="Profile"><img src="<?php $custom_badge = $author_details['custom_badge']; $badge = $author_details['badge']; require("../lib/badge.php"); ?>"></font><br><?php $counter_posts = $post_counter4; $custom_stars = $author_details["custom_stars"]; $custom_rank = $author_details["custom_rank"]; require("../lib/rank.php"); ?></font>
                                    <br><font size="1" class="Profile"><b>Forum Posts</b>: <?php echo $post_counter4; ?></font>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td class="hmcontainer2" width="300" height="30" valign="top">
                        <table>
                           <tbody>
                              <tr>
                                 <td><font class="Profile" size="2"><b><?php echo $thread_details["thread_title"]; ?></b></font><br><font class="Profile" size="1"><b>Posted</b>: <?php $date = strtotime($thread_details["thread_date"]); echo date('d/m/Y h:i A', $date); ?></font><b><br></b><font class="Profile" size="1"><?php $post = $thread_details["thread_text"]; require("lib/embeds.php"); ?></font><br><br><?php if (isset($username)) { if ($thread_details["thread_locked"] == "no") { ?><font size="1"><a href="new_reply.php?id=<?php echo $thread_details["thread_id"]; ?>">Post Reply</a></font><?php } } ?> <?php if (isset($username)) { if ($username == $author_details["username"] OR $user["badge"] == "administrator") { ?><font size="1"><a href="thread.php?delete_reply=<?php echo $thread_details["thread_id"]; ?>">Delete</a></font><?php } } ?> <?php if ($thread_details["thread_id"] == "207") { ?><font size="1"><a href="https://cdn.discordapp.com/attachments/876204595041411083/876556207429673050/blursed-images-that-are-cursed-and-blessed.png">Click here to achive banan</a></font><?php } ?></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <?php
                     while($replies_details = $replies->fetch_assoc()) {
                     $author2 = $replies_details['post_author'];
                     $replies_author = NULL;
                     GetPostAuthor($author2, $conn);
                     $author_details2 = $replies_author->fetch_assoc();
                     require("lib/forum_post_counter1.php");
                     ?>
                  <tr class="hmcontainer">
                     <td class="hmcontainer2" height="30" valign="top">
                        <table>
                           <tbody>
                              <tr>
                                 <td>
                                    <font size="1" class="Profile"><a href="/profile.php?user=<?php echo $author_details2["username"]; ?>"><b><?php echo $author_details2["username"]; ?></b></a></font><br>
                                    <img src="/images/pfps/<?php echo $author_details2["pfp"]; ?>.gif" class="pfp">
                                    <font size="1" class="Profile"><img src="<?php $custom_badge = $author_details2['custom_badge']; $badge = $author_details2['badge']; require("../lib/badge.php"); ?>"></font><br><?php $counter_posts = $post_counter3; $custom_stars = $author_details2["custom_stars"]; $custom_rank = $author_details2["custom_rank"]; require("../lib/rank.php"); ?></font>
                                    <br><font size="1" class="Profile"><b>Forum Posts</b>: <?php echo $post_counter3; ?></font>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td class="hmcontainer2" width="300" height="30" valign="top">
                        <table>
                           <tbody>
                              <tr>
                                 <td><font class="Profile" size="1"><b>Posted</b>: <?php $date = strtotime($replies_details["post_date"]); echo date('d/m/Y h:i A', $date); ?></font><b><br></b><font class="Profile" size="1"><?php $post = $replies_details["post_text"]; require("lib/embeds.php"); ?></font><br><br><?php if (isset($username)) { if ($thread_details["thread_locked"] == "no") { ?><font size="1"><a href="new_reply.php?id=<?php echo $thread_details["thread_id"]; ?>">Post Reply</a></font><?php } } ?> <?php if (isset($username)) { if ($username == $author_details2["username"] OR $user["badge"] == "administrator" OR $user["badge"] == "moderator") { ?><font size="1"><a href="thread.php?delete_reply=<?php echo $replies_details["post_id"]; ?>">Delete</a></font><?php } } ?></td>
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