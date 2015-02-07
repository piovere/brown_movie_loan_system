<?php

	$video = $HTTP_GET_VARS['videoid'];
	$owner = $HTTP_GET_VARS['owner'];
	$borrower = $HTTP_GET_VARS['borrower'];
	require_once('Connections/connect.php');
	
	//make the change to the database
	$time = time();
	$query = "UPDATE movies SET holder='$borrower', checkedout='$time' WHERE videoid='$video'";
	mysql_query($query, $connect);
	
	//fetch info about the movie itself
	$query = "SELECT title FROM movies WHERE videoid='$video'";
	$results = mysql_query($query, $connect);
	$movie = mysql_fetch_assoc($results);
	$title = $movie['title'];
	
	//fetch info about the borrower
	$query = "SELECT * FROM people WHERE personid='$borrower'";
	$results = mysql_query($query, $connect);
	$newholder = mysql_fetch_assoc($results);
	$name = $newholder['fname']." ".$newholder['lname'];
	
	//fetch info about the owner
	$query = "SELECT * FROM people WHERE personid='$owner'";
	$results = mysql_query($query, $connect);
	$vowner = mysql_fetch_assoc($results);
	$email = $vowner['email'];
?>

<html>
<head>
<title>Brown Moovies | Checkout</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
  
<h1 align="center"><font face="Verdana, Arial, Helvetica, sans-serif">Movie Checked 
  Out</font></h1>
  <hr>
  <br><br>
  <p align="center"><font face="Verdana, Arial, Helvetica, sans-serif"><?php print $title; ?> has been checked out to <?php print $name; ?>.</font></p>

	
<center>
  <br>
</center>
<form name="form1" method="post" action="login.php">
  <p align="center">
    <input type="hidden" name="email" value="<?php print $email; ?>">
  </p>
  <p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">Click the 
    button below to log in to your home page. </font></p>
  <p align="center"> 
    <input type="submit" name="Submit" value="Log In">
  </p>
</form>
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
