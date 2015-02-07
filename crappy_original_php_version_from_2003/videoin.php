<?php

	session_start();
	
	$video = $HTTP_GET_VARS['videoid'];
	$owner = $HTTP_SESSION_VARS['personid'];
	require_once('Connections/connect.php');

	$query = "UPDATE movies SET holder='$owner' WHERE videoid='$video'";
	mysql_query($query, $connect);

?>

<html>
<head>
<title>Brown Moovies | Checkin</title>
<meta http-equiv="refresh" content="0;URL=userhome.php">
</head>

<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
  <br><br><br>
	<p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">Checking in...</font></p>

</body>
</html>
