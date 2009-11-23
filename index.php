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
		
		# try to login
		if( $twit->verifyCredentials() )
		{		
			# get the list of the followers' screen names
			$followers = $twit->getFollowersScreenNames();

			# get the list of the friends' screen names
			$friends = $twit->getFriendsScreenNames();
		}
		else
		{
			$flash_message = "Wrong credentials!";
		}
	}
	else
	{
		$flash_message = "Please enter a username and password!";
	}
	
	if(isset($followers) && isset($friends))
	{
		include "templates/list.html.php";
	}
	else
	{
		include "templates/index.html.php";
	}
}

?>
