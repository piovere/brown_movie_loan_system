<?php
/*
	require_once('../Connections/connect.php');
	
	$query = "SELECT * FROM people";
	$results = mysql_query($query);
	
	while ($user = mysql_fetch_assoc($results)) {
		$message = "Jarbacca Systems is on the job!\n\nAfter a small session of Extreme Programming (more info here: http://www.extremeprogramming.org), we not only solved the problem that the University foisted on us, we also added a new, much requested feature.\n\nFor a long time, people have been borrowing things through the Brown Moovie Loan System, but the owners had no method of recourse for retrieving movies from delinquent borrowers. Now, while perusing your home page on the System, you can click a single link and an e-mail will be automatically sent to the person, saving you countless hours in tracking down your movies! \n\nWe hope that you enjoy this new feature, and always welcome suggestions for new features. \n\nThanks again for using the Brown Moovie Loand System.\n\n\t-Jarbacca Systems";

		$headers = "From: Jarbacca Systems<liesegang@virginia.edu>\r\nReply-To: Jarbacca Systems<liesegang@virginia.edu>\r\nX-Mailer: PHP/".phpversion();


		mail($user['email'], "Brown Moovies: Fixed and Improved!", $message, $headers); 

	}

*/
?>