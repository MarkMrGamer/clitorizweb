<?php
if (isset($_SESSION["user"])) {
    $username = $_SESSION['user'];
    $user = NULL;
    $get = NULL;
    GetCurrentUser($username, $conn);
}

if (isset($_SESSION["user"])) { 
    $username = $_SESSION["user"];
}

if ($user["badge"] != "administrator") {
	header("Location: /index.php"); 
}
?>

<table class="banner" width="440">
   <tbody>
      <tr class="blackstrip" height="20">
         <td class="blackstrip">
            <a href="/home.php">Home</a>|<a href="/forum/">Forum</a>|<a href="/groups.php">Groups</a>|<a href="/people.php">People</a>
         </td>
         <td class="blackstrip2">
            <?php if (!isset($_SESSION["user"])) { ?><a href="/login.php">Log In</a>or<a href="/signup.php">Sign Up</a><?php } else { ?>Hi, <?php echo "$username | <a href='/logout.php'>Log Out</a>"; } ?>
         </td>
      </tr>
   </tbody>
</table>
<div class="banner-image"></div>