<?php
	session_start();

	$videoid = $HTTP_GET_VARS['videoid'];
	
	require_once('Connections/connect.php');
	$uid = $HTTP_SESSION_VARS['personid'];
	$query = "DELETE FROM movies WHERE videoid='$videoid'";
	$results = mysql_query($query, $connect) or die (mysql_error());
		
?>

<html>
<head>
<title>Brown Moovies | Deleting Entry</title>
<meta http-equiv="refresh" content="0; URL=userhome.php">
</head>
<body bgcolor="#330066" text="#FFFFFF">
<div align="center">
  <p align="center"><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">Deleting 
    your movie from the database...</font></p>
</div>
</body>
</html>
