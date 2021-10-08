<?php require("../lib/require/session.php"); ?>
<?php require("../lib/session/session.php"); ?>
<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/new_reply.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="../styles/main.css">
      <link rel="shortcut icon" href="/favicon.ico" />
   </head>
   <body>
      <center>
         <?php require("../lib/require/header/header.php"); ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <font size="+1"><b>new reply</b></font>
                     <br>
                     <br>
                     <label style="vertical-align: top;"><b>response to</b>:</label> <?php echo $thread_details["thread_title"]; ?><br><br>
                     <form action="new_reply.php?id=<?php echo $_GET["id"]; ?>" method="POST" enctype="multipart/form-data">
                        <label style="vertical-align: top;">text:</label> <textarea name="text" class="UpdateText" style="width:300px;height:100px;"></textarea><br>
                        <br><br><input class="updateSubmit" type="submit" name="create" value="Create Reply">
                     </form>
                     <br>
                     <?php require("lib/new_reply/counter.php"); ?>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("../lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>