<?php
	session_start();

	$videoid = $HTTP_GET_VARS['videoid'];
	
	require_once('Connections/connect.php');
	$uid = $HTTP_SESSION_VARS['personid'];
	$query = "SELECT * FROM movies WHERE videoid='$videoid'";
	$results = mysql_query($query, $connect) or die (mysql_error());
	$this_movie = mysql_fetch_assoc($results);
		
?>
<html>
<head>
<title>Brown Moovies | Change Movie Info</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#330066" text="#FFFFFF" link="#66FF00">
<div align="center">
  <p align="center"><font color="#FFFFFF" size="6" face="Verdana, Arial, Helvetica, sans-serif">Change 
    Movie Info</font></p>
  <p align="center"><hr>
  <p align="center">
<form name="form1" method="post" action="dochangemovie.php">
    <table width="75%" border="0" cellpadding="4">
      <tr> 
        <td width="50%"><div align="right"> 
            <p align="right"><b><font color="#66FF00" face="Verdana, Arial, Helvetica, sans-serif">*</font><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">Title</font></b></p>
          </div></td>
        <td width="50%"><input name="title" type="text" id="title" value="<?php print $this_movie['title']; ?>" size="20" maxlength="255"></td>
      </tr>
      <tr> 
        <td><div align="right"> 
            <p align="right"><b><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">Year</font></b></p>
          </div></td>
        <td><input name="year" type="text" id="year" value="<?php print $this_movie['year']; ?>" size="4" maxlength="4"></td>
      </tr>
      <tr> 
        <td><div align="right"> 
            <p align="right"><b><font color="#66FF00" face="Verdana, Arial, Helvetica, sans-serif">*</font><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">Genre 
              1</font></b></p>
          </div></td>
        <td><select name="genre1">
            <option <?php if ($this_movie['genre1'] == "") {print "selected";} ?>>Choose 
            a Genre...</option>
            <option <?php if ($this_movie['genre1'] == "Action") {print "selected";} ?>>Action</option>
            <option <?php if ($this_movie['genre1'] == "Adventure") {print "selected";} ?>>Adventure</option>
            <option <?php if ($this_movie['genre1'] == "Animation") {print "selected";} ?>>Animation</option>
            <option <?php if ($this_movie['genre1'] == "Comedy") {print "selected";} ?>>Comedy</option>
            <option <?php if ($this_movie['genre1'] == "Crime") {print "selected";} ?>>Crime</option>
            <option <?php if ($this_movie['genre1'] == "Drama") {print "selected";} ?>>Drama</option>
            <option <?php if ($this_movie['genre1'] == "Family") {print "selected";} ?>>Family</option>
            <option <?php if ($this_movie['genre1'] == "Fantasy") {print "selected";} ?>>Fantasy</option>
            <option <?php if ($this_movie['genre1'] == "Film-Noir") {print "selected";} ?>>Film-Noir</option>
            <option <?php if ($this_movie['genre1'] == "Horror") {print "selected";} ?>>Horror</option>
            <option <?php if ($this_movie['genre1'] == "Musical") {print "selected";} ?>>Musical</option>
            <option <?php if ($this_movie['genre1'] == "Mystery") {print "selected";} ?>>Mystery</option>
            <option <?php if ($this_movie['genre1'] == "Romance") {print "selected";} ?>>Romance</option>
            <option <?php if ($this_movie['genre1'] == "Sci-Fi") {print "selected";} ?>>Sci-Fi</option>
            <option <?php if ($this_movie['genre1'] == "Thriller") {print "selected";} ?>>Thriller</option>
            <option <?php if ($this_movie['genre1'] == "War") {print "selected";} ?>>War</option>
            <option <?php if ($this_movie['genre1'] == "Western") {print "selected";} ?>>Western</option>
          </select></td>
      </tr>
      <tr> 
        <td><div align="right"> 
            <p align="right"><b><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">Genre 
              2</font></b></p>
          </div></td>
        <td><select name="genre2" id="genre2">
            <option <?php if ($this_movie['genre2'] == "") {print "selected";} ?>>Choose 
            a Genre...</option>
            <option <?php if ($this_movie['genre2'] == "Action") {print "selected";} ?>>Action</option>
            <option <?php if ($this_movie['genre2'] == "Adventure") {print "selected";} ?>>Adventure</option>
            <option <?php if ($this_movie['genre2'] == "Animation") {print "selected";} ?>>Animation</option>
            <option <?php if ($this_movie['genre2'] == "Comedy") {print "selected";} ?>>Comedy</option>
            <option <?php if ($this_movie['genre2'] == "Crime") {print "selected";} ?>>Crime</option>
            <option <?php if ($this_movie['genre2'] == "Drama") {print "selected";} ?>>Drama</option>
            <option <?php if ($this_movie['genre2'] == "Family") {print "selected";} ?>>Family</option>
            <option <?php if ($this_movie['genre2'] == "Fantasy") {print "selected";} ?>>Fantasy</option>
            <option <?php if ($this_movie['genre2'] == "Film-Noir") {print "selected";} ?>>Film-Noir</option>
            <option <?php if ($this_movie['genre2'] == "Horror") {print "selected";} ?>>Horror</option>
            <option <?php if ($this_movie['genre2'] == "Musical") {print "selected";} ?>>Musical</option>
            <option <?php if ($this_movie['genre2'] == "Mystery") {print "selected";} ?>>Mystery</option>
            <option <?php if ($this_movie['genre2'] == "Romance") {print "selected";} ?>>Romance</option>
            <option <?php if ($this_movie['genre2'] == "Sci-Fi") {print "selected";} ?>>Sci-Fi</option>
            <option <?php if ($this_movie['genre2'] == "Thriller") {print "selected";} ?>>Thriller</option>
            <option <?php if ($this_movie['genre2'] == "War") {print "selected";} ?>>War</option>
            <option <?php if ($this_movie['genre2'] == "Western") {print "selected";} ?>>Western</option>
          </select></td>
      </tr>
      <tr> 
        <td><div align="right"> 
            <p align="right"><b><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">IMDB 
              Link</font></b></p>
          </div></td>
        <td><input name="link" type="text" id="link" value="<?php print $this_movie['link']; ?>" size="35" maxlength="255"></td>
      </tr>
      <tr> 
        <td><div align="right"> 
            <p align="right"><b><font color="#66FF00" face="Verdana, Arial, Helvetica, sans-serif">*</font><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">Format</font></b></p>
          </div></td>
        <td><select name="format">
            <option <?php if ($this_movie['format'] == "") {print "selected";} ?>>Choose 
            a Format...</option>
            <option <?php if ($this_movie['format'] == "DVD") {print "selected";} ?>>DVD</option>
            <option <?php if ($this_movie['format'] == "VHS") {print "selected";} ?>>VHS</option>
            <option <?php if ($this_movie['format'] == "LaserDisc") {print "selected";} ?>>LaserDisc</option>
            <option <?php if ($this_movie['format'] == "DivX/VCD") {print "selected";} ?>>DivX/VCD</option>
          </select></td>
      </tr>
      <tr>
        <td colspan="3"><div align="right"> 
            <input type="submit" name="Submit" value="Change the info">
          </div></td>
      </tr>
      <tr>
        <td colspan="3"><div align="right">
            <p align="right"><b><font color="#66FF00" face="Verdana, Arial, Helvetica, sans-serif"><a href="delete.php?videoid=<?php print $videoid; ?>">DELETE</a></font></b></p>
          </div></td>
      </tr>
    </table>
    <input name="videoid" type="hidden" id="videoid" value="<?php print $videoid; ?>">
  </form>
</div>
</body>
</html>
