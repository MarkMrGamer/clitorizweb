<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/require/session.php"); ?>
<?php require("lib/logs.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="styles/admin.css">
   </head>
   <body>
      <center>
         <?php require("lib/require/header/header.php"); ?>
         <div style="padding-top: 5px;">
            <table width="440" class="BorderStrip" border="1">
               <tbody>
                  <tr class="blackstrip3" height="20">
                     <td class="blackstrip3">Logs</td>
                     <td class="blackstrip3" align="center">Date</td>
                  </tr>
                  <?php
                     while ($row = $logs->fetch_assoc()) {
                     ?>
                  <tr class="hmcontainer">
                     <td class="hmcontainer2" height="31">
                        <table>
                           <tbody>
                              <tr>
                                 <td>
                                    <font class="UserProfile" size="1"><?php echo $row["log_note"]; ?> (<?php echo $row["ip"]; ?>)</font>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td class="hmcontainer2" height="10" width="80">
                        <table align="center">
                           <tbody>
                              <tr>
                                 <td><font class="UserProfile" size="-2"><?php $date = strtotime($row["date"]); echo date('m/d/Y', $date); ?></font></td>
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