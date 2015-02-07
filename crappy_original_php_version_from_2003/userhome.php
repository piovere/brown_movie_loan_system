<?php
	session_start();

	require_once('Connections/connect.php');
	$uid = $HTTP_SESSION_VARS['personid'];
	$query = "SELECT * FROM people WHERE personid='$uid'";
	$results = mysql_query($query, $connect) or die (mysql_error());
	$this_person = mysql_fetch_assoc($results);
		
?>

<?php
	if (mysql_num_rows($results) != 1){
		?>
		
<html>
<head>
<title>Brown Moovie System | Error</title>
<meta http-equiv="refresh" content="5;URL=login.html">
</head>

<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
<h1 align="center"><font face="Verdana, Arial, Helvetica, sans-serif">Login Error</h1></font>
<hr><br><br>
<p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">You do not appear to be registered with the system. Redirecting you to Login...</font></p>
<?php

	die();
	}
?>

<html>
<head>
<title>Brown Moovie System | User Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
<h1 align="center"><font face="Verdana, Arial, Helvetica, sans-serif">
	<?php print $this_person['fname']." ".$this_person['lname']."'s Home"; ?></font></h1>
	<hr>
	<br>
<font face="Verdana, Arial, Helvetica, sans-serif"><b>Search Database:</b></font> 
<table width="95%" border="0" cellpadding="4">
    <tr>
      <td width="50%">  
	  <form action="results.php" method="get">
	    <table width="62%" border="0" cellpadding="4">
          <tr> 
            <td colspan="2"><p><font face="Verdana, Arial, Helvetica, sans-serif">Search 
                by Title:</font> 
                <input type="text" name="searchtitle" size="30">
              </p></td>
          </tr>
          <tr> 
            <td width="40%"> <select name="searchgenre">
                <option>Search by Genre...</option>
                <option>Action</option>
                <option>Adventure</option>
                <option>Animation</option>
                <option>Comedy</option>
                <option>Crime</option>
                <option>Drama</option>
                <option>Family</option>
                <option>Fantasy</option>
                <option>Film-Noir</option>
                <option>Horror</option>
                <option>Musical</option>
                <option>Mystery</option>
                <option>Romance</option>
                <option>Sci-Fi</option>
                <option>Thriller</option>
                <option>War</option>
                <option>Western</option>
              </select> </td>
            <td width="60%"> <select name="searchformat">
                <option>Search by Format...</option>
                <option>DVD</option>
                <option>VHS</option>
                <option>LaserDisc</option>
                <option>DivX/VCD</option>
              </select> </td>
          </tr>
          <tr> 
            <td colspan="2" align="right"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif">Sort 
              By:</font> <font size="-1">
              <input name="searchorder" type="radio" value="title" checked>
              <font face="Verdana, Arial, Helvetica, sans-serif">Title</font></font> 
              <font size="-1">
              <input type="radio" name="searchorder" value="format">
              <font face="Verdana, Arial, Helvetica, sans-serif">Format</font></font> 
              <font size="-1">
              <!-- <input type="radio" name="searchorder" value="genre1">
              <font face="Verdana, Arial, Helvetica, sans-serif">Genre</font></font>  -->
            </td>
          </tr>
          <tr>
            <td colspan="2" align="right"><input name="submit" type="submit" value="Search"></td>
          </tr>
        </table>
   </form>
  </td>
      <td width="50%"><div align="right">
        <p><b><font face="Verdana, Arial, Helvetica, sans-serif"><a href="userinfo.php?user=<?php print $HTTP_SESSION_VARS['personid']; ?>">Change 
          Your User Information</a></font></b></p>
        <p><b><font face="Verdana, Arial, Helvetica, sans-serif"><a href="addvideo.html">Add 
          a Movie to Your Profile</a></font></b></p>
        <p><b><font face="Verdana, Arial, Helvetica, sans-serif"><a href="logout.php">Log 
          Out</a></font></b></p>
        </div></td>
    </tr>
  </table>
<br><br>
<p align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="+3"><b>Your 
  Movies</b></font></p>
<table align="center" width="80%" border="0" cellpadding="4">
  <tr> 
    <td width="16%"><center>
        <b><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"> Title</font></b></center></td>
    <td width="7%"><center>
        <b><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"> Year</font></b></center></td>
    <td width="10%"><center>
        <b><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"> Format</font></b></center></td>
    <td width="9%"><center>
        <b><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"> Genre</font></b></center></td>
    <td width="18%"><center>
        <b><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"> Location</font></b></center></td>
    <td width="24%"><div align="center"><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Return</strong></font></div></td>
    <td width="16%"><div align="center"><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Edit 
        info</strong></font></div></td>
  </tr>
  <?php
	$query = "SELECT * FROM movies WHERE owner='$uid' ORDER BY title";
	$results = mysql_query($query, $connect);
	print "<tr>";
	while( $movie = mysql_fetch_assoc($results) ) {
		$title = "<i>".$movie['title']."</i>";
		if ( $movie['link'] != "" )
			$title = "<a href=\"".$movie['link']."\">$title</a>";
		print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">".$title."</font></td>";
		if ($movie['year'] != 0)
			print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">".$movie['year']."</font></td>";
		else print "<td></td>";
		print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">".$movie['format']."</font></td>";
		$genre = $movie['genre1'];
		if ( $movie['genre2'] != "" ) 
			$genre .= "/".$movie['genre2'];
		print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">".$genre."</font></td>";
		if ( $movie['owner'] == $movie['holder'] )
			print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">---</font></td>";
		else {
			$query = "SELECT * FROM people WHERE personid='".$movie['holder']."'";
			$results2 = mysql_query($query, $connect);
			$holder = mysql_fetch_assoc($results2);
			print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">".$holder['fname']." ".$holder[lname]."<br><a href=\"userinfo.php?user=".$movie['holder']."\">[Info]</a> <a href=\"nag.php?videoid=".$movie['videoid']."\">[Nag]</a></td>";
			print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=\"videoin.php?videoid=".$movie['videoid']."\">Check In</a></td>";
		}
		if ($movie['owner'] == $movie['holder']) {print "<td></td>";}
		print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=\"changemovie.php?videoid=".$movie['videoid']."\">edit</a></td>";
		print "</tr>";
	}
?>
</table>
<br><br><hr>
<p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">The Brown 
  Moovie System was created and is maintained by Jarbacca Systems. <br>
  The site uses <a href="http://www.apache.org">Apache</a>, <a href="http://www.mysql.com/">MySQL</a>, 
  and <a href="http://www.php.net/">PHP</a> technologies. <br>
  E-mail <a href="mailto:dangerpl@virginia.edu">Jar-Jar</a> or <a href="mailto:liesegang@virginia.edu">Chewie</a> 
  for more information. </font></p>
</body>
</html>
