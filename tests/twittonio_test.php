<?php
	# disable E_NOTICE because SimpleTest is not ready for PHP 5.3
	error_reporting(E_ALL ^ E_NOTICE);
	
	require_once dirname(__FILE__) . '/simpletest/autorun.php';
	require_once '../lib/twittonio.php';
	
	class TestOfTwittonio extends UnitTestCase 
	{
		function __contruct()
		{
			$this->UnitTestCase('Twittonio class test');
			$this->twittonio = new Twittonio('', '');		
		}
		
		function testVerifyAuthentication()
		{
			$this->assertTrue($this->twittonio);
		}
		
		function testGetFollowers()
		{
			$this->assertTrue($this->twittonio);
		}
	}
?>