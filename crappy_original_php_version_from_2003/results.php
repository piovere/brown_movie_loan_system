<?php
	session_start();
	require_once('Connections/connect.php');
?>
<html>
<head>
<title>Brown Moovies | Search</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#330066" text="#FFFFFF" link="#66FF00" vlink="#FFFF00">
<h1 align="center"><font face="Verdana, Arial, Helvetica, sans-serif">Search Results</font></h1>
<hr>

  <p align="center"><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif"><i>If 
    a movie title is not a link, that movie is currently checked out</i> <br>
    <br><table align="center" width="90%" border="0" cellpadding="4">
    </font></p>
  <?php
	
	$stitle = $HTTP_GET_VARS['searchtitle'];
	$sformat = $HTTP_GET_VARS['searchformat'];
	$sgenre = $HTTP_GET_VARS['searchgenre'];
	$sorder = $HTTP_GET_VARS['searchorder'];
	
	if ($sorder == "")
		$sorder = "title";


	$query = "SELECT * FROM movies WHERE ";
	
	if ( ($sgenre == "Search by Genre...") && ($sformat == "Search by Format...") && ($stitle == "") ) {
		$query = "SELECT * FROM movies";
	}
	else if ($stitle == "") {
		if (  ($sformat != "Search by Format...") && ($sgenre != "Search by Genre...")  )
			$query = $query."format='".$sformat."' AND (genre1='$sgenre' OR genre2='$sgenre')";
		else if ($sgenre != "Search by Genre...")
			$query = $query."(genre1='$sgenre' OR genre2='$sgenre')";
		else
			$query = $query."format='".$sformat."'";
	}
	else if ($sformat == "Search by Format...") {
		if (  ($stitle != "") && ($sgenre != "Search by Genre...")  )
			$query = $query."title LIKE \"%".$stitle."%\" AND (genre1='$sgenre' OR genre2='$sgenre')";
		else if ($sgenre != "Search by Genre...")
			$query = $query."(genre1='$sgenre' OR genre2='$sgenre')";
		else
			$query = $query."title LIKE \"%".$stitle."%\"";
	}
	else if ($sgenre == "Search by Genre...") {
		if (  ($stitle != "") && ($sformat != "Search by Format...")  )
			$query = $query."title LIKE \"%".$stitle."%\" AND format='".$sformat."'";
		else if ($format != "Search by Format...")
			$query = $query."format='".$sformat."'";
		else
			$query = $query."title LIKE \"%".$stitle."%\"";
	}
	else {
		$query = $query."title LIKE \"%".$stitle."%\" AND format='".$sformat."' AND (genre1='$sgenre' OR genre2='$sgenre')";
	}

	$query = $query." ORDER BY '$sorder'";

//	print $query;
	$results = mysql_query($query, $connect);

	$num = mysql_num_rows($results);
	print "<br><p align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">Your search returned $num results.</font></p>"
?>
	<tr> 
    <td width="21%"><center>
        <b><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"> Title</font></b><br>
        <font size="-1" face="Verdana, Arial, Helvetica, sans-serif">(Click to 
        check out)</font> </center></td>
    <td width="8%"><center>
        <b><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"> Year<br>
        </font></b></center></td>
    <td width="9%"><center>
        <b><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"> Format<br>
        </font></b></center></td>
    <td width="12%"><center>
        <b><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"> Genre<br>
        </font></b></center></td>
    <td width="29%"><center>
        <b><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"> Owner</font></b><br>
        <font size="-1" face="Verdana, Arial, Helvetica, sans-serif">(Click for 
        information)</font></center></td>
    <td width="21%"><div align="center"><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"><b>Link</b></font></div></td>
  </tr>
<?php

	print "<tr>";
	while( $movie = mysql_fetch_assoc($results) ) {
		print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\"><i>";
		if ( $movie['owner'] == $movie['holder'] ) {
			print "<a href=\"request.php?videoid=".$movie['videoid']."\">".$movie['title']."</a>";
		}
		else {
			print $movie['title'];
		}
		print "</i></td></font>";
		if ($movie['year'] != 0) {
			print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">".$movie['year']."</font></td>";
		}
		else { 
			print "<td></td>";
		}
		print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">".$movie['format']."</font></td>";
		$genre = $movie['genre1'];
		if ( $movie['genre2'] != "" )  {
			$genre = $genre."/".$movie['genre2'];
		}
		print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">".$genre."</font></td>";
		
		$query2 = "SELECT * FROM people WHERE personid='".$movie['owner']."'";
		$results2 = mysql_query($query2, $connect);
		$owner = mysql_fetch_assoc($results2);
		print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=\"userinfo.php?user=".$owner['personid']."\">".$owner['fname']." ".$owner['lname']."</a></td>";
		if ($movie['link'] == "") {
			print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">--</td>";
			}
		else {
			print "<td align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=\"".$movie['link']."\">info</a></td>";
			}
		print "</tr>";    
	}
	
	print "</table>";
?>

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
