<?php 
	session_start(); 
	require_once('Connections/connect.php');

/* grab the requestor's userid */
$uid = $HTTP_SESSION_VARS['personid'];
mysql_select_db($database_connect, $connect);
$query = "SELECT * FROM people WHERE (personid='$uid')";
	$user_results = mysql_query($query, $connect) or die (mysql_error());
$borrower = mysql_fetch_assoc($user_results);
	$borrower_name = $borrower['fname'] . " " . $borrower['lname'];
	$borrower_email = $borrower['email'];

/* grab the video information */
$vid = $HTTP_GET_VARS[videoid];
$query = "SELECT * FROM movies WHERE (videoid='$vid')";
	$video_results = mysql_query($query, $connect) or die (mysql_error());
$video = mysql_fetch_assoc($video_results);
	$title = $video['title'];
	$ownerid = $video['owner'];

/* grab the owner information */
$query = "SELECT * FROM people WHERE (personid='$ownerid')";
	$owner_results = mysql_query($query, $connect) or die (mysql_error());
$owner = mysql_fetch_assoc($owner_results);
	$owner_name = $owner['fname'] . " " . $owner['lname'];
	$owner_email = $owner['email'];
	$owner_phone = $owner['phone'];
	$owner_room = $owner['room'] . " " . $owner['portal'];
	
/* compose and send the email */

$message = "Greetings from the Brown Moovie Loan System! \n\n$borrower_name would like to borrow $title from you.\n
Follow this link to approve: \nhttp://www.people.virginia.edu/~sjl7b/brownmovies/videoout.php?videoid=$vid&borrower=$uid&owner=$ownerid\n\nIf the person doesn't contact you via phone, e-mail, or in person, however, it's their own fault, so don't feel bad.";

$headers = "From: ".$borrower_name."<".$borrower_email.">\r\nReply-To: ".$borrower_email."\r\nX-Mailer: PHP/".phpversion();

mail($owner_email, "Movie request for $title", $message, $headers); 



?>
<html>
<head>
<title>Brown Moovies | Movie Requested</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
<h1 align="center"><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">Movie 
  Requested</font></h1>
<hr><br><br>
<p align="center"><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">
  <?php 
print "<p align=\"center\">An email has been sent to $owner_name requesting $title.  <br>
We suggest you visit this person at $owner_room or call them at $owner_phone.
</p>";
?>
  </font></p>
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
