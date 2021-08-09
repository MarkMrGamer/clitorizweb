<?php require("../lib/require/session.php"); ?>
<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/threads.php"); ?>
<html>
<head>
<title>clitorizweb</title>
<link rel="stylesheet" href="../styles/main.css">
</head>
<body>
<center>
<?php require("../lib/require/header/header.php"); ?>
<div style="padding-top: 5px;">
<table>
<tbody>
<tr>
<td width="440">
<a href="new_thread.php?id=<?php echo $_GET["id"]; ?>"><img src="images/newThread.png" align="left"></a>
</td>
</tr>
</tbody>
<table>
<table width="440" class="BorderStrip" border="1">
<tbody><tr class="blackstrip3" height="20">
<td class="blackstrip3">Threads</td>
<td class="blackstrip3" align="center">Replies</td>
<td class="blackstrip3" align="center">Date Created</td>

</tr>

<?php
while($row = $threads->fetch_assoc()) {
?>
<tr class="hmcontainer">
<td class="hmcontainer2" height="30"><table><tbody><tr>
<td><font class="UserProfile" size="1"><a href="/forum/thread.php?id=<?php echo $row["thread_id"]; ?>"><b><?php echo $row["thread_title"]; ?></b></a> by <?php echo $row["thread_author"]; ?></font></td></tr></tbody></table></td>
<td class="hmcontainer2" width="45" height="30"><table align="center"><tbody><tr>
<td><font class="UserProfile" size="-2"><?php require("lib/replies.php"); ?></font></td>
</tr>

</tbody></table></td><td class="hmcontainer2" width="81" height="30"><table align="center"><tbody><tr>
<td><font class="UserProfile" size="-2"><?php $date = strtotime($row["thread_date"]); echo date('d M y', $date); ?></font></td>
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