<?php require("lib/require/session.php"); ?>
<?php require("lib/config/database.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/register/session.php"); ?>
<?php require("lib/register.php"); ?>
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
<td class="hmcontainer2"><font size="+1"><b>clitorizweb registration</b></font>
<br>
<br>
to sign up, fill this form out <br>
and click the <b>sign up</b> button <br>
once your done with it.
<br><br>
<form action="signup.php" method="POST">
<label>username:</label> <input class="loginText" type="text" name="username"><br><br><label>email:</label> <input class="loginText" type="text" name="email"><br><br>
<label>password:</label> <input class="loginText" type="password" name="password_one"><br><br><label>confirm password:</label> <input class="loginText" type="password" name="password_two"><br><br><input class="loginSubmit" type="submit" name="signup" value="Sign Up"> or <a href="login.php">login</a><br><br>
<?php require("lib/register/counter.php"); ?>
</form>  
</td>
</tr>
</tbody>
</table>
<?php require("lib/require/footer/footer.php"); ?>
</center>
</body>
</html>