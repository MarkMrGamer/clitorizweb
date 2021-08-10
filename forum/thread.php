<?php require("../lib/require/session.php"); ?>
<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/thread.php"); ?>
<?php require("lib/forum_post_counter2.php"); ?>
<html>
<head>
<title>clitorizweb</title>
<link rel="stylesheet" href="../styles/main.css">
</head>
<body>
<center>
<?php require("../lib/require/header/header.php"); ?>
<div style="padding-top: 5px;">
<table width="440" class="BorderStrip" border="1">
<tbody><tr class="blackstrip3" height="20">
<td class="blackstrip3">Author</td>
<td class="blackstrip3" align="center"><?php echo $thread_details["thread_title"]; ?></td>


</tr>

<tr class="hmcontainer">
<td class="hmcontainer2" height="30"><table><tbody><tr>
<td>
<font size="1" class="Profile"><a href="/profile.php?user=<?php echo $author_details["username"]; ?>"><b><?php echo $author_details["username"]; ?></b></a></font><br>
<img src="/images/pfps/<?php echo $author_details["pfp"]; ?>.gif" class="pfp">
<font size="1" class="Profile"><img src="<?php $badge = $author_details['badge']; require("../lib/badge.php"); ?>"></font>
<img src="../images/star.png"><img src="../images/star.png"><img src="../images/star.png"><img src="../images/star.png"><img src="../images/star.png">
<br><b>Member</b>
<br><font size="1" class="Profile"><b>Forum Posts</b>: <?php echo $post_counter4; ?></font>
</td></tr></tbody></table></td>
<td class="hmcontainer2" width="300" height="30" valign="top"><table><tbody><tr>
<td><font class="Profile" size="2"><b><?php echo $thread_details["thread_title"]; ?></b></font><br><font class="Profile" size="1"><b>Posted</b>: <?php $date = strtotime($thread_details["thread_date"]); echo date('d/m/Y h:i A', $date); ?></font><b><br></b><font class="Profile" size="1"><?php echo $thread_details["thread_text"]; ?></font><br><br><?php if (isset($username)) { ?><font size="1"><a href="new_reply.php?id=<?php echo $thread_details["thread_id"]; ?>">Post Reply</a></font><?php } ?></td>
</tr>

</tbody></table></td></tr>

<?php
while($replies_details = $replies->fetch_assoc()) {
$author2 = $replies_details['post_author'];
$replies_author = NULL;
GetPostAuthor($author2, $conn);
$author_details2 = $replies_author->fetch_assoc();
require("lib/forum_post_counter1.php");
?>
<tr class="hmcontainer">
<td class="hmcontainer2" height="30"><table><tbody><tr>
<td>
<font size="1" class="Profile"><a href="/profile.php?user=<?php echo $author_details2["username"]; ?>"><b><?php echo $author_details2["username"]; ?></b></a></font><br>
<img src="/images/pfps/<?php echo $author_details2["pfp"]; ?>.gif" class="pfp">
<font size="1" class="Profile"><img src="<?php $badge = $author_details2['badge']; require("../lib/badge.php"); ?>"></font>
<img src="../images/star.png"><img src="../images/star.png"><img src="../images/star.png"><img src="../images/star.png"><img src="../images/star.png">
<br><b>Member</b>
<br><font size="1" class="Profile"><b>Forum Posts</b>: <?php echo $post_counter3; ?></font>
</td></tr></tbody></table></td>
<td class="hmcontainer2" width="300" height="30" valign="top"><table><tbody><tr>
<td><font class="Profile" size="1"><b>Posted</b>: <?php $date = strtotime($replies_details["post_date"]); echo date('d/m/Y h:i A', $date); ?></font><b><br></b><font class="Profile" size="1"><?php echo $replies_details["post_text"]; ?></font><br><br><?php if (isset($username)) { if ($username == $author_details2["username"]) { ?><font size="1"><a href="thread.php?delete_reply=<?php echo $replies_details["post_id"]; ?>">Delete</a></font><?php } } ?></td>
</tr>
</tbody></table></td></tr>
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
