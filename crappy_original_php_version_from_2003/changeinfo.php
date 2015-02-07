<?php 
	session_start();
	require_once('Connections/connect.php');
	
	$change_fname=$HTTP_POST_VARS['change_fname'];
	$change_lname=$HTTP_POST_VARS['change_lname'];
	$change_room=$HTTP_POST_VARS['change_room'];
	$change_portal=$HTTP_POST_VARS['change_portal'];
	$change_phone=$HTTP_POST_VARS['change_phone'];
	$change_email=$HTTP_POST_VARS['change_email'];
	$change_comments=$HTTP_POST_VARS['comments'];
		
	$uid = $HTTP_SESSION_VARS['personid'];
	$query = "UPDATE people SET fname='$change_fname', lname='$change_lname', room='$change_room', portal='$change_portal', phone='$change_phone', email='$change_email', comments='$change_comments' WHERE (personid=$uid) LIMIT 1";
	//print $query;
	$results = mysql_query($query, $connect);
?>
<html>
<head>
<title>Brown Moovies | Changing Info</title>
<meta http-equiv="refresh" content="0;URL=userhome.php">
</head>

<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
	<br><br>
	
<p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">Changing 
  your information...</font></p>

</body>
</html>
