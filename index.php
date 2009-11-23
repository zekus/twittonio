<?php

# simple REST approach

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    include "template/index.html.php";
}
else if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['_method']))
{	
	if( !empty($_POST["username"]) && !empty($_POST["password"]) )
	{
		require_once "lib/twittonio.php";
		
		# sanitize the post parameters
		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);
	
		#initialize the twitter object
		$twit = new Twittonio($username, $password);
		
		# get the list of the followers' screen names
		$followers = $twit->getFollowersScreenNames();

		# get the list of the friends' screen names
		$friends = $twit->getFriendsScreenNames();
		
		include "template/list.html.php";
	}
	else
	{
		include "template/index.html.php";
	}
}

?>
