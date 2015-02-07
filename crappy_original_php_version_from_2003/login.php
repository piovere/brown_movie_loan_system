<?php
	session_start();
	session_register('personid');
	
	require_once('Connections/connect.php');
	
	if ($HTTP_GET_VARS['mode'] == "update") {
		$user = $HTTP_GET_VARS['user'];
		
		$HTTP_SESSION_VARS['personid'] = $user;
				
		print "<html><meta http-equiv=\"refresh\" content=\"0;URL=userinfo.php?user=".$user."\">
					<title>Brownn Moovies | Logging In</title><body bgcolor=\"#330066\" text=\"#FFFFFF\">
					<center>
					  <font face=\"Verdana, Arial, Helvetica, sans-serif\"> <br><br>Please wait a moment while 
					  your profile loads....</font> 
					</center>
					</html>";
	
		die();
	}
	
	$email = $HTTP_POST_VARS['email'];
	$query = "SELECT * FROM people WHERE email='$email'";
	$results = mysql_query($query, $connect) or die (mysql_error());
	
	if (mysql_num_rows($results) == 1) {
		$uid = mysql_result($results, 0, 'personid');
		$HTTP_SESSION_VARS['personid'] = $uid;
			print "<html><meta http-equiv=\"refresh\" content=\"0;URL=userhome.php\">
					<title>Brownn Moovies | Logging In</title><body bgcolor=\"#330066\" text=\"#FFFFFF\">
					<center>
					  <font face=\"Verdana, Arial, Helvetica, sans-serif\"> <br><br>Please wait a moment while 
					  your profile loads....</font> 
					</center>
					</html>";
	
		}
	else {
			print "<html><meta http-equiv=\"refresh\" content=\"1;URL=adduser.html\">
					<title>Brownn Moovies | Logging In</title><body bgcolor=\"#330066\" text=\"#FFFFFF\">
					<center>
					  <font face=\"Verdana, Arial, Helvetica, sans-serif\"> <br><br>You do not exist in the database...</font> 
					</center>
					</html>";
		}
?>