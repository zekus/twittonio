<?php
	# disable E_NOTICE because SimpleTest is not ready for PHP 5.3
	error_reporting(E_ALL ^ E_NOTICE);
	
	require_once dirname(__FILE__) . '/simpletest/autorun.php';
	require_once '../lib/twittonio.php';
	
	class TestOfTwittonio extends UnitTestCase 
	{
		function __construct()
		{
			$this->UnitTestCase('Twittonio class test');
			$this->twittonio = new Twittonio('twittoniotest', '123twittonio');		
		}
		
		function testVerifyCredentialsTrue()
		{
			$this->assertTrue($this->twittonio->verifyCredentials(), "using correct credentials");
		}

		function testVerifyCredentialsFalse()
		{
			$this->twittonio_false = new Twittonio('twittoniotest', '321');		
			$this->assertFalse($this->twittonio_false->verifyCredentials(), "using wrong credentials");
		}
				
		function testGetFollowers()
		{
			$this->assertIsA($this->twittonio->getFollowers(), "array", "testing that the result is an array");
		}
	}
?>