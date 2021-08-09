<?php require("lib/require/session.php"); ?>
<?php require("lib/session/session.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/settings.php"); ?>
<html>
<head>
<title>clitorizweb</title>
<link rel="stylesheet" href="styles/main.css">
</head>
<body>
<center>
<?php require("lib/require/header/header.php"); ?>
<table class="hmcontainer" width="440">
<tbody>
<tr>
<td class="hmcontainer2"><font size="+1"><b>settings</b></font>
<br>
<br>
<form action="settings.php" method="POST" enctype="multipart/form-data">
<label>status:</label> <input class="UpdateText" type="text" name="status" value="<?php echo $user["status"]; ?>"><br><br>
<label style="vertical-align: top;">css:</label> <textarea name="css" class="UpdateText" style="width:300px;height:100px;"><?php echo $user["css"]; ?></textarea><br><br>
<label style="vertical-align: top;">bio:</label> <textarea name="bio" class="UpdateText" style="width:300px;height:100px;"><?php echo $user["bio"]; ?></textarea><br><br>
<label>profile picture:</label> <input type="file" name="fileupload" id="fileupload"><br><br>
<label>audio profile:</label> <input type="file" name="fileupload2" id="fileupload2"><br>
<br><br><input class="updateSubmit" type="submit" name="update" value="Update"></form>
<br>
<?php require("lib/settings/counter.php"); ?>
</td>
</tr>
</tbody>
</table>
<?php require("lib/require/footer/footer.php"); ?>
</center>
</body>
</html>