<?php
if (isset($_SESSION["user"])) {
    $username = $_SESSION['user'];
    $user = NULL;
    $get = NULL;
    GetCurrentUser($username, $conn);
	
	$bans = NULL;
    GrabBan($username, $conn);
    $banned = $bans->fetch_assoc();
	
	if ($user["isbanned"] == "true") {
	    header("Location: banned.php");
    }
	
	if (!empty($banned)) {
		if ($banned["ban_date"] < date("Y-m-d H:i:s")) {
			$ban = "false";
			ChangeBan($username, $ban, $conn);
		}
	}
}

if (isset($_SESSION["user"])) { 
    $username = $_SESSION["user"];
}
?>
<table class="banner" width="440">
   <tbody>
      <tr class="blackstrip" height="20">
         <td class="blackstrip">
            <a href="/home.php">Home</a>|<a href="/forum/">Forum</a>|<a href="/groups.php">Groups</a>|<a href="/people.php">People</a>
         </td>
         <td class="blackstrip2">
            <?php if (!isset($_SESSION["user"])) { ?><a href="/login.php">Log In</a>or<a href="/signup.php">Sign Up</a><?php } else { ?>Hi,<?php echo "<a href='/profile.php?user=$username'>$username</a>|<a href='/settings.php'>Settings</a>|<a href='/logout.php'>Log Out</a>"; } ?><?php if (isset($_SESSION["user"])) { if ($user["badge"] == "administrator") { ?>|<a href="/admin/">Admin</a></font><?php } elseif ($user["badge"] == "moderator") { ?>|<a href="/mod/">Mod</a></font><?php } } ?>
         </td>
      </tr>
   </tbody>
</table>
<div class="banner-image"></div>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/lib/require/banner/banner.php"); ?>
