<?php require("../lib/require/session.php"); ?>
<?php require("../lib/config/database.php"); ?>
<?php require("../lib/config/functions.php"); ?>
<?php require("lib/forum.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="../styles/main.css">
      <link rel="shortcut icon" href="/favicon.ico" />
   </head>
   <body>
      
         <?php require("../lib/require/header/header.php"); ?>
         <div style="padding-top: 5px;">
            <table width="440" class="BorderStrip" border="1">
               <tbody>
                  <tr class="blackstrip3" height="20">
                     <td class="blackstrip3">Forum</td>
                     <td class="blackstrip3" align="center">Threads</td>
                  </tr>
                  <tr class="hmcontainer">
                     <td class="hmcontainer2" height="39">
                        <table>
                           <tbody>
                              <tr>
                                 <td><font class="UserProfile" size="2"><a href="/forum/forum.php?id=1"><b>General Discussion</b></a></font>
                                    <br><font class="UserProfile" size="1">Talk about anything else.</font>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td class="hmcontainer2" height="39" width="51">
                        <table align="center">
                           <tbody>
                              <tr>
                                 <td><font class="UserProfile" size="-2"><?php echo $show_threads; ?></font></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr class="hmcontainer">
                     <td class="hmcontainer2" height="39">
                        <table>
                           <tbody>
                              <tr>
                                 <td><font class="UserProfile" size="2"><a href="/forum/forum.php?id=2"><b>Half-Life</b></a></font>
                                    <br><font class="UserProfile" size="1">Gordon Freeman in the flesh, or rather in the forums.</font>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td class="hmcontainer2" height="39" width="51">
                        <table align="center">
                           <tbody>
                              <tr>
                                 <td><font class="UserProfile" size="-2"><?php echo $show_threads2; ?></font></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr class="hmcontainer">
                     <td class="hmcontainer2" height="39">
                        <table>
                           <tbody>
                              <tr>
                                 <td><font class="UserProfile" size="2"><a href="/forum/forum.php?id=3"><b>Technology</b></a></font>
                                    <br><font class="UserProfile" size="1">Talk about tech stuff.</font>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td class="hmcontainer2" height="39" width="51">
                        <table align="center">
                           <tbody>
                              <tr>
                                 <td><font class="UserProfile" size="-2"><?php echo $show_threads3; ?></font></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <?php require("../lib/require/footer/footer.php"); ?>
      
   </body>
</html>