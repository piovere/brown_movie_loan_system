<?php 
	session_start();
	require_once('Connections/connect.php');
	
	$uid = $HTTP_SESSION_VARS['personid'];
	$query = "UPDATE people SET fname=$HTTP_POST_VARS['change_fname'], 
		lname=$HTTP_POST_VARS['change_lname'], 
		room=$HTTP_POST_VARS['change_room'], 
		portal=$HTTP_POST_VARS['change_portal']
		phone=$HTTP_POST_VARS['change_phone']
		email=$HTTP_POST_VARS['change_email']
		WHERE (personid=$uid)
		LIMIT 1";
	$results = mysql_query($query, $connect);
?>
<html>
<head>
<title>Changing Info</title>
<meta http-equiv="refresh" content="0;URL=userhome.php">
</head>

<body>

</body>
</html>
