<?php
	session_start();

	$videoid = $HTTP_POST_VARS['videoid'];
	$title = $HTTP_POST_VARS['title'];
	$year = $HTTP_POST_VARS['year'];
	$genre1 = $HTTP_POST_VARS['genre1'];
	$genre2 = $HTTP_POST_VARS['genre2'];
	$link = $HTTP_POST_VARS['link'];
	
	require_once('Connections/connect.php');
	$uid = $HTTP_SESSION_VARS['personid'];
	$query = "UPDATE movies SET title='$title', year='$year', genre1='$genre1', genre2='$genre2', link='$link' WHERE videoid='$videoid'";
	$results = mysql_query($query, $connect) or die (mysql_error());
		
?>
<html>
<head>

<title>Brown Movies | Updating Movie Info</title>
<meta http-equiv="refresh" content="0;URL=userhome.php">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#330066">
<p align="center"><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">Updating 
  movie info...<b> </b></font></p>
</body>
</html>
