<?php
	session_start();
?>
<?php require_once('Connections/connect.php'); ?> 
<?php

mysql_select_db($database_connect, $connect);
 
 $fname = $HTTP_POST_VARS[fname];
 $lname = $HTTP_POST_VARS[lname];
 $portal = $HTTP_POST_VARS[portal];
 $room = $HTTP_POST_VARS[room];
 $email = $HTTP_POST_VARS[email];
 $phone = $HTTP_POST_VARS[phone];
 
 if ( !strstr($email, '@') )
 	$email = $email."@virginia.edu";

$query = "INSERT INTO people (fname, lname, portal, room, email, phone) VALUES ( '$fname', '$lname', '$portal', '$room', '$email', '$phone')";

mysql_query($query, $connect) or die("It didn't work.");

$query = "SELECT * FROM people WHERE (fname='$fname' AND lname='$lname' AND portal='$portal' AND room='$room' AND email='$email' AND phone='$phone')";
	$results = mysql_query($query, $connect) or die (mysql_error());
	$uid = mysql_result($results, 0, 'personid');
	session_register( "personid" );
	$HTTP_SESSION_VARS['personid'] = $uid;

?>

<html><meta http-equiv="refresh" content="0;URL=userhome.php">
</html>