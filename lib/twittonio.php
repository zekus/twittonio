<?php
/**
 * a simple library for twitter
 *
 * @package twittonio
 * @author Antonio Lorusso < antonio@antoniolorusso.com >
 **/
class Twittonio
{	
	/**
	 * protected variables
	 *
	 * @var $username string
	 * @var $password string
	 */
	protected $username;
	protected $password;
	
	/**
	 * private variables
	 *
	 * @var $followers array
	 * @var $friends array
	 */
	private $followers;
	private $friends;
	
	/**
	 * the constructor method
	 *
	 * @return string
	 **/
	public function __construct( $username, $password )
	{
		$this->username = $username;
		$this->password = $password;
	}

	/*** PRIVATE METHODS ***/
	
	/**
	 * connect method to be used to connect to the API using curl
	 *
	 * @return array
	 **/
	private function connect( $url )
	{
		$curl_options = array(
			CURLOPT_URL				=> $url,
			CURLOPT_HTTPGET			=> 1,
			CURLOPT_HTTPAUTH		=> CURLAUTH_BASIC,
			CURLOPT_USERPWD			=> $this->username . ":" . $this->password,
			CURLOPT_SSL_VERIFYPEER	=> false,
			CURLOPT_RETURNTRANSFER	=> 1
		);

		$curl_handler = curl_init();
		
		curl_setopt_array( $curl_handler, $curl_options );
		
		$curl_result = curl_exec( $curl_handler );		
		$curl_http_code = curl_getinfo( $curl_handler, CURLINFO_HTTP_CODE );
		
		curl_close( $curl_handler );
		
		return array( 
			"content" => $curl_result, 
			"code" => $curl_http_code 
		);
	}
	
	/**
	 * function that extract the screen_names from a given array of objects
	 *
	 * @return array
	 **/
	private function getScreenNames( $array )
	{
		foreach($array as $value)
		{
			$values[] = $value->screen_name;
		}
		
		return $values;		
	}
	
	/*** PUBLIC METHODS ***/
	
	/**
	 * this method execute the login to twitter using the basic authentication
	 *
	 * @return bool
	 **/
	public function verifyCredentials()
	{
		$result = $this->connect( "http://twitter.com/account/verify_credentials.json" );
		
		/* 200 correspond to OK in the HTTP Status codes */
		return ($result["code"] == 200) ? true : false;
	}
	
	/**
	 *  this method return the full list of followers
	 *
	 * @return object
	 **/
	public function getFollowers()
	{
		if(!$this->followers)
		{
			$result = $this->connect( "http://twitter.com/statuses/followers.json" );
			$this->followers = json_decode($result["content"]);
		}
				
		return $this->followers;
	}

	/**
	 *  this method return an array of screen names of followers
	 *
	 * @return array
	 **/
	public function getFollowersScreenNames()
	{
		$followers = $this->getFollowers();
		return $this->getScreenNames($followers);
	}

	/**
	 *  this method return the full list of friends
	 *
	 * @return object
	 **/
	public function getFriends()
	{
		if(!$this->friends)
		{
			$result = $this->connect( "http://twitter.com/statuses/friends.json" );
			$this->friends = json_decode($result["content"]);
		}
				
		return $this->friends;
	}

	/**
	 *  this method return an array of screen names of friends
	 *
	 * @return array
	 **/
	public function getFriendsScreenNames()
	{
		$friends = $this->getFriends();		
		return $this->getScreenNames($friends);
	}
		
} // END class 
?>