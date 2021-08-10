<?php require("lib/require/session.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/profile.php"); ?>
<html>
<head>
<title>clitorizweb - <?php echo $details["username"]; ?></title>
<link rel="stylesheet" href="styles/main.css">
<?php if (!empty($details['css'])) { ?>
<style>
<?php echo $details['css']; ?>
</style>
<?php } ?>
</head>
<body>
<center>
<?php require("lib/require/header/header.php"); ?>
<table class="hmcontainer" width="440">
<tbody>
<tr>
<td class="hmcontainer2"><table><tbody><tr><td><img class="pfp" alt="" src="<?php require("lib/pfp2.php"); ?>"><br>
</td>
<td style="vertical-align: top;"><font size="+1" class="UserProfile"><a href="profile.php?user=<?php echo $details["username"]; ?>"><?php echo $details["username"]; ?></a></font> <?php if (!empty($details['badge'])) { ?><img src="<?php $badge = $details['badge']; require("lib/badge.php"); ?>"><?php } ?> <?php require("lib/friend2.php"); ?><br>
<font class="UserProfile" size="-2"><?php if (!empty($details["status"])) { echo $details["status"]; } ?></font>
<img src="../images/star.png"><img src="../images/star.png"><img src="../images/star.png"><img src="../images/star.png"><img src="../images/star.png">
<font class="UserProfile" size="-2"><b>Member</b></font></td></tr></tbody></table></td>
</tr>
</tbody>
</table>
<div class="container">
  <div class="about">
<table width="230" class="BorderStrip" border="1">
<tbody><tr class="blackstrip3" height="20">
<td class="blackstrip3">
 About <?php echo $details["username"]; ?>
</td>
</tr>

<tr class="hmcontainer">
<td class="hmcontainer2" height="39"><table><tbody><tr>
<td><font class="UserProfile" size="-2"><?php if (!empty($details["bio"])) { echo $details["bio"]; } else { echo "This user hasn't set their about me yet."; } ?></font>
</td></tr></tbody></table></td>
</tr>
</tbody>
</table>
</div>
  <div class="media-player">
<table class="BorderStrip" width="205" border="1">
<tbody><tr class="blackstrip3" height="20">
<td class="blackstrip3">Media Player
</td>
</tr>

<tr class="hmcontainer">
<td class="hmcontainer3"><table><tbody><tr>
<td>
<audio controls autoplay style="width:190px;height:30px;">
<source src="<?php require("lib/song.php"); ?>" type="audio/mpeg">
<font size="-2">Audio element not supported on this browser</font>
</audio>
</td></tr></tbody></table></td>
</tr>
</tbody>
</table>
</div>
  <div class="contact">
<table class="BorderStrip" border="1" width="205">
<tbody><tr class="blackstrip3" height="20">
<td class="blackstrip3">Contact <?php echo $details["username"]; ?>
</td>
</tr>

<tr class="hmcontainer" height="55">
<?php 
if (isset($_SESSION["user"]) && $details["username"] == $_SESSION["user"]) { 
?>
<td class="hmcontainer2" align="center"><table>
<tbody>
<font class="UserProfile" size="-2" style="text-align: center;">This is you!</font>
<?php
} else {
?>
<td class="hmcontainer2"><table>
<tbody>
<tr>
<td>
<font class="UserProfile" size="-2"><?php require("lib/friend.php"); ?></font>
<td>
<font class="UserProfile" size="-2"><img src="/images/icons/send_message.png"> <a href="message.php?user=<?php echo $details["username"]; ?>">Message</a></font>
</td></tr>
<tr>
<td>
<font class="UserProfile" size="-2"><img src="/images/icons/report_user.png"> <a href="report.php?user=<?php echo $details["username"]; ?>">Report</a></font>
</td>
<td>
<font class="UserProfile" size="-2"><img src="/images/icons/block_user.png"> <a href="block.php?user=<?php echo $details["username"]; ?>">Block</a></font></td>
</tr>
<?php
}
?>
</tbody></table></td>
</tr>
</tbody>
</table></td><td>
<!-- <table width="230" class="BorderStrip" border="1">
<tbody><tr class="blackstrip3" height="20">
<td class="blackstrip3">Comments
</td>
</tr>

<tr class="hmcontainer">
<td class="hmcontainer2" height="51"> <table><tbody><tr>
<td><table><tbody><tr><td><img src="/images/default_pfps/9.gif" height="32" width="32" border="1"><br>
</td>
<td style="vertical-align: top;"><font size="-1" class="UserProfile"><a href="profile.php?user=<?php echo $details["username"]; ?>">placeholder</a> | 8/2/2021</font><br>
<font class="UserProfile" size="-2">placeholder</font></td></tr></tbody></table>
</td></tr></tbody></table> </td>
</tr>
</tbody>
</table> --></td></tr></tbody>
</table>
</div>
  <div class="friends">
<?php 
if ($friend->num_rows > 0 OR $friend2->num_rows > 0) {
?>
<table class="BorderStrip" border="1" width="230">
<tbody><tr class="blackstrip3" height="20">
<td class="blackstrip3">Friends</td>
</tr>

<tr class="hmcontainer">
<td class="hmcontainer2"><table><tbody><tr>
<?php 
$counter2 = 0;
if ($friend->num_rows > 0) {
    while($friend_details = $friend->fetch_assoc()) { 
        $counter2++;
        $friend_details1 = $friend_details['buddy2'];
        $friend_details2 = NULL;
        $get_friend = NULL;
        GetUserFriend($friend_details1, $conn);
		if ($counter2%3 == 1) {
	    echo "</tr>";
        }
?>
<td>
<font class="UserProfile" size="-2"><img src="/images/pfps/<?php echo $friend_details2["pfp"]; ?>.gif" width="16" height="15" border="1"> <a href="profile.php?user=<?php echo $friend_details2["username"]; ?>" style="vertical-align: top;"><?php echo $friend_details2["username"]; ?></a></font>
</td>
<?php
    }
}

if ($friend2->num_rows > 0) {
    while($friend_details_2 = $friend2->fetch_assoc()) {
        $counter2++;	
        $friend_details3 = $friend_details_2['buddy1'];
        $friend_details4 = NULL;
        $get_friend2 = NULL;
        GetUserFriend2($friend_details3, $conn);
		if ($counter2%3 == 1) {
	    echo "</tr>";
        }
?>
<td>
<font class="UserProfile" size="-2"><img src="/images/pfps/<?php echo $friend_details4["pfp"]; ?>.gif" width="16" height="15" border="1"> <a href="profile.php?user=<?php echo $friend_details4["username"]; ?>" style="vertical-align: top;"><?php echo $friend_details4["username"]; ?></a></font>
</td>
<?php
    }
}
?>
</tr>
</tbody></table></td>
</tr>
</tbody>
</table>
<?php
}
?>
</div>
</div>
<?php require("lib/require/footer/footer.php"); ?>
</center>
</body>
</html>
