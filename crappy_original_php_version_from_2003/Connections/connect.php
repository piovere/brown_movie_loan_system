<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connect = "dbm1.itc.virginia.edu";
$database_connect = "sjl7b_brownmovies";
$username_connect = "sjl7b";
$password_connect = ""; # ERASED BEFORE GIT COMMIT BECAUSE **SECRETS**
$connect = mysql_connect($hostname_connect, $username_connect, $password_connect) or die(mysql_error());
if (!$connect)
	die ("Couldn't connect to MySQL.");
mysql_select_db($database_connect, $connect);
?>