<?php
	session_start();
	
	session_unregister("personid");
	session_destroy();
?>

<html>
<head>
<title>Brown Moovies | Logout</title>
<meta http-equiv="refresh" content="0;URL=login.html">
</head>

<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
<center>
  <br>
  <br>
  <font face="Verdana, Arial, Helvetica, sans-serif">Logging Out.... </font> 
</center>
</body>
</html>
