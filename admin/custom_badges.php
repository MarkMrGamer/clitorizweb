<?php require("lib/require/session.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("../lib/config/database.php"); ?>
<?php require("lib/custom_badges.php"); ?>
<html>
<head>
<title>clitorizweb</title>
<link rel="stylesheet" href="styles/admin.css">
</head>
<body>
<center>
<?php require("lib/require/header/header.php"); ?>
<table class="hmcontainer" width="440">
<tbody>
<tr>
<td class="hmcontainer2"><font size="+1"><b>Create a custom badge</b></font>
<br>
<br>
<a href="../images/custom_badges/template.gif">Custom badges template here</a>
<br>
<br>
<form action="custom_badges.php" method="POST" enctype="multipart/form-data">
<label>name:</label> <input class="UpdateText" type="text" name="badge_name"><br><br>
<label>image:</label> <input type="file" name="fileupload" id="fileupload" style="width:200px;"><br><br>
<br><br><input class="updateSubmit" type="submit" name="add" value="Add Badge"></form>
<br>
<?php require("lib/custom_badges/counter.php"); ?>
</td>
</tr>
</tbody>
</table>
<?php require("../lib/require/footer/footer.php"); ?>
</center>
</body>
</html>