<?php
	session_start();
	include("Connections/connect.php");

	$videoid = $HTTP_GET_VARS['videoid'];
	$query = "SELECT * FROM movies WHERE videoid=$videoid";
	$result = mysql_query($query);
	$movie = mysql_fetch_assoc($result);

	$datestring = date("F j, Y", $movie['checkedout']);

	$query = "SELECT * FROM people WHERE personid=".$movie['owner'];
	$result = mysql_query($query);
	$owner = mysql_fetch_assoc($result);
	
	$query = "SELECT * FROM people WHERE personid=".$movie['holder'];
	$result = mysql_query($query);
	$holder = mysql_fetch_assoc($result);
	

	$nag1 = "Hey! You've had ".$movie['title']." since ".$datestring.". \nThat's a really long time. ".$owner['fname']." wants it back!\n\nYou remember, they live at ".$owner['room']." ".$owner['portal'].". \n\nThanks for using the Brown Moovie Loan System, you delinquent schmuck. Cheerio.\n\n\t- Jarbacca Systems";

	$headers = "From: ".$owner['fname']." ".$owner['lname']." <".$owner['email'].">\r\nReply-To: ".$owner['fname']." ".$owner['lname']." <".$owner['email'].">\r\nX-Mailer: PHP/".phpversion();
	
	
	$message = $nag1;
	
	mail($holder['email'], "Where is ".$movie['title'], $message, $headers); 

?>
<html>
<head>

<title>Brown Movies | Nag Borrower</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
<h1 align="center"><font face="Verdana, Arial, Helvetica, sans-serif">Nagging....</h1></font>
<br><hr><br><br>
<p align="center"><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif"><b>The following e-mail has been sent to <?php print $holder['email']; ?>:</b><br><br></p><table align="center" width="80%"><tr><td><?php print nl2br($message); ?></td></tr></table><br><br><hr>
<p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">The Brown 
  Moovie System was created and is maintained by Jarbacca Systems. <br>
  The site uses <a href="http://www.apache.org">Apache</a>, <a href="http://www.mysql.com/">MySQL</a>, 
  and <a href="http://www.php.net/">PHP</a> technologies. <br>
  E-mail <a href="mailto:dangerpl@virginia.edu">Jar-Jar</a> or <a href="mailto:liesegang@virginia.edu">Chewie</a> 
  for more information. </font></p></font></p>
</body>
</html>
