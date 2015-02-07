<?php
	session_start();
	require_once('Connections/connect.php');
	
	$personid = $HTTP_SESSION_VARS['personid'];
	$title = $HTTP_POST_VARS['title'];
	$year = $HTTP_POST_VARS['year'];
	$genre1 = $HTTP_POST_VARS['genre1'];
	$genre2 = $HTTP_POST_VARS['genre2'];
	$link = $HTTP_POST_VARS['link'];
	$format = $HTTP_POST_VARS['format'];		

	$query = "INSERT INTO movies ( owner, holder, title, year, genre1, genre2, link, format ) VALUES ('$personid', '$personid', '$title', '$year', '$genre1', '$genre2', '$link', '$format' )";
	mysql_query($query, $connect) or die("Couldn't add the movie to the database.");

?>

<html>
<head>
<title>Brown Moovies | Add Movie</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
<h1 align="center"><font face="Verdana, Arial, Helvetica, sans-serif">
	Movie Added!</font></h1>
	<hr>
	<br>
<p align="center"><font face="Verdana, Arial, Helvetica, sans-serif"><a href="addvideo.html"><b>Add 
  Another Movie</b></a></font></p>
<p align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif"><a href="userhome.php">Return 
  to Your Home Page</a></font></b></p>
<br><br><hr>
<p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">The Brown 
  Moovie System was created and is maintained by Jarbacca Systems. <br>
  The site uses <a href="http://www.apache.org">Apache</a>, <a href="http://www.mysql.com/">MySQL</a>, 
  and <a href="http://www.php.net/">PHP</a> technologies. <br>
  E-mail <a href="mailto:dangerpl@virginia.edu">Jar-Jar</a> or <a href="mailto:liesegang@virginia.edu">Chewie</a> 
  for more information. </font></p>
</body>
</html>
