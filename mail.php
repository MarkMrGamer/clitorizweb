<?php require("lib/require/session.php"); ?>
<?php require("lib/session/session.php"); ?>
<?php require("lib/config/functions.php"); ?>
<?php require("lib/config/database.php"); ?>
<html>
   <head>
      <title>clitorizweb</title>
      <link rel="stylesheet" href="styles/main.css">
      <link rel="shortcut icon" href="/favicon.ico" />
   </head>
   <body>
      <center>
         <?php require("lib/require/header/header.php"); ?>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2"><font size="+1"><b>Mail</b></font><img><a> Clear All</a><br>
                     <font>You have </font><b>3 Unread</b><font> messages.</font> <font></font>  
                  </td>
               </tr>
            </tbody>
         </table>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <table>
                        <tbody>
                           <tr>
                              <td><img src="/images/pfps/492647004.gif" width="32" height="32" border="1"><br></td>
                              <td><font class="UserProfile" size="+1"><a href="profile.php?user=wii">wii</a></font><br>
                                 <font class="UserProfile" size="-2"><i>Commented on your profile "weenor"</i></font> <font class="UserProfile" size="-2"></font>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <table>
                        <tbody>
                           <tr>
                              <td><img src="https://a0b23d856fd1.ngrok.io/images/pfps/2050955693.gif" width="32" height="32" border="1"><br></td>
                              <td><font class="UserProfile" size="+1"><a href="profile.php?user=wii">eqman</a></font><br>
                                 <font class="UserProfile" size="-2"><i>Replied to your fourm post <b>"i love dance"</b></i></font> <font class="UserProfile" size="-2"></font>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
         <table class="hmcontainer" width="440">
            <tbody>
               <tr>
                  <td class="hmcontainer2">
                     <table>
                        <tbody>
                           <tr>
                              <td><img src="/images/pfps/492647004.gif" width="32" height="32" border="1"><br></td>
                              <td><font class="UserProfile" size="+1"><a href="profile.php?user=wii">wii</a></font><br>
                                 <font class="UserProfile" size="-2"><i>Sent a friend request!</i>
                                 <b>Accept | Decline</b></font> <font class="UserProfile" size="-2"></font>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
         <?php require("lib/require/footer/footer.php"); ?>
      </center>
   </body>
</html>