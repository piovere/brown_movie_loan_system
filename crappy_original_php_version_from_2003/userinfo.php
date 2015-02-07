<?php 
	session_start();
	require_once('Connections/connect.php');
	
	$uid = $HTTP_SESSION_VARS['personid'];
	$query = "SELECT * FROM people WHERE personid='".$HTTP_GET_VARS['user']."'";
	$results = mysql_query($query, $connect);
	$user = mysql_fetch_assoc($results);
	
?>

<html>
<head>
<title>Brown Moovies | User Info</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
<center>
  <h1><font face="Verdana, Arial, Helvetica, sans-serif">User Information</font></h1>
  <hr>
  <br><br><br>
<?php if ($uid == $user['personid']) {?>
	<form action="changeinfo.php" method="post" name="changeinfo">
    <table width="59%" border="0" align="center" cellpadding="4">
      <tr> 
        <td align="right" width="50%"> <font face="Verdana, Arial, Helvetica, sans-serif"><b>First 
          name:</b></font> </td>
        <td><input name="change_fname" type="text" id="change_fname" value="<?php print $user['fname']; ?>" size="20" maxlength="20"></td>
      </tr>
      <tr> 
        <td align="right" width="50%"> <font face="Verdana, Arial, Helvetica, sans-serif"><b>Last 
          name:</b></font> </td>
        <td><font face="Verdana, Arial, Helvetica, sans-serif"> 
          <input name="change_lname" type="text" id="change_lname" value="<?php print $user['lname']; ?>" size="20" maxlength="20">
          </font></td>
      </tr>
      <tr> 
        <td align="right"> <font face="Verdana, Arial, Helvetica, sans-serif"><b>Room:</b></font> 
        </td>
        <td><font face="Verdana, Arial, Helvetica, sans-serif"> 
          <input name="change_room" type="text" id="change_room" value="<?php print $user['room']; ?>" size="3" maxlength="3">
          </font></td>
      </tr>
      <tr> 
        <td align="right"><font face="Verdana, Arial, Helvetica, sans-serif"><strong>Portal:</strong></font></td>
        <td><select name="change_portal">
            <option value="Smith" <?php if ($user['portal'] == 'Smith') {print "selected";}?>>Smith</option>
            <option value="Long" <?php if ($user['portal'] == 'Long') {print "selected";}?>>Long</option>
            <option value="Mallet" <?php if ($user['portal'] == 'Mallet') {print "selected";}?>>Mallet</option>
            <option value="Davis" <?php if ($user['portal'] == 'Davis') {print "selected";}?>>Davis</option>
            <option value="Venable" <?php if ($user['portal'] == 'Venable') {print "selected";}?>>Venable</option>
            <option value="Gildersleeve" <?php if ($user['portal'] == 'Gildersleeve') {print "selected";}?>>Gildersleeve</option>
            <option value="McGuffey" <?php if ($user['portal'] == 'McGuffey') {print "selected";}?>>McGuffey</option>
            <option value="Harrison" <?php if ($user['portal'] == 'Harrison') {print "selected";}?>>Harrison</option>
            <option value="Tucker" <?php if ($user['portal'] == 'Tucker') {print "selected";}?>>Tucker</option>
            <option value="Holmes" <?php if ($user['portal'] == 'Holmes') {print "selected";}?>>Holmes</option>
            <option value="Rogers" <?php if ($user['portal'] == 'Rogers') {print "selected";}?>>Rogers</option>
            <option value="Peters" <?php if ($user['portal'] == 'Peters') {print "selected";}?>>Peters</option>
          </select></td>
      </tr>
      <tr> 
        <td align="right"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Phone 
          Number:</b></font></div></td>
        <td><input name="change_phone" type="text" id="change_phone" value="<?php print $user['phone']; ?>" size="15" maxlength="15"></td>
      </tr>
      <tr> 
        <td align="right"><font face="Verdana, Arial, Helvetica, sans-serif"><b>E-mail:</b></font></td>
        <td><font face="Verdana, Arial, Helvetica, sans-serif"> 
          <input name="change_email" type="text" id="change_email" value="<?php print $user['email']; ?>" size="35" maxlength="50">
          </font></td>
      </tr>
      <tr> 
        <td colspan="3" align="right"><div align="center"> 
            <p><font face="Verdana, Arial, Helvetica, sans-serif"><strong>Comments</strong></font><br>
              <font face="Verdana, Arial, Helvetica, sans-serif">(These are seen 
              when the user requests to view your information. Feel free to add 
              rental notes or movie preferences)</font></p>
            <p>
              <textarea name="comments" cols="45" rows="4" id="comments"><?php print $user['comments']; ?></textarea>
            </p>
          </div></td>
      </tr>
      <tr>
        <td colspan="3" align="right"><input name="submit" type="submit" value="Update"></td>
      </tr>
    </table>
	</form>
	
  <?php 
  }
  else {
  ?>
  <table width="59%" border="0" align="center" cellpadding="4">
    <tr> 
      <td align="right" width="50%"> <font face="Verdana, Arial, Helvetica, sans-serif"><b>Name:</b></font> 
      </td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif"><?php print $user['fname']." ".$user['lname']; ?></font></td>
    </tr>
    <tr> 
      <td align="right"> <font face="Verdana, Arial, Helvetica, sans-serif"><b>Location:</b></font> 
      </td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif"><?php print $user['portal']." ".$user['room']; ?></font></td>
    </tr>
    <tr> 
      <td align="right"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Phone 
        Number:</b></font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif"><?php print $user['phone']; ?></font></td>
    </tr>
    <tr> 
      <td align="right"><font face="Verdana, Arial, Helvetica, sans-serif"><b>E-mail:</b></font></div></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif"><?php print "<a href=\"mailto:".$user['email']."\">".$user['email']."</a>"; ?></font></td>
    </tr>
	</tr>
    <tr>
      <td align="center" colspan="2"><p><strong><font face="Verdana, Arial, Helvetica, sans-serif"><br>Comments</font></strong></p>
        <p><font face="Verdana, Arial, Helvetica, sans-serif"><?php print $user['comments'];?></font></p></td>
    </tr>
  </table><br>
<?php 
  }
?>
</center>
<p align="center"><a href="userhome.php"><font face="Verdana, Arial, Helvetica, sans-serif">Go 
  back to your Brown Moovie Home Page</font></a></p>
<br><br><hr>
<p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">The Brown 
  Moovie System was created and is maintained by Jarbacca Systems. <br>
  The site uses <a href="http://www.apache.org">Apache</a>, <a href="http://www.mysql.com/">MySQL</a>, 
  and <a href="http://www.php.net/">PHP</a> technologies. <br>
  E-mail <a href="mailto:dangerpl@virginia.edu">Jar-Jar</a> or <a href="mailto:liesegang@virginia.edu">Chewie</a> 
  for more information. </font></p>
</body>
</html>
