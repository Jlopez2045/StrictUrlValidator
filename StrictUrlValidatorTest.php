<?php
require_once 'StrictUrlValidator.php';


class StrictUrlValidatorTest extends PHPUnit_Framework_TestCase
{
	private static $urlArray = array(
			'http' => array(
					'basic' => false,
					'host'	=> false,
					'full'	=> false,
				),
				
			'http:80' => array(
					'basic' => false,
					'host'	=> false,
					'full'	=> false,
				),
				
				
			'http:www' => array(
					'basic' => false,
					'host'	=> false,
					'full'	=> false,
				),

			'http://www' => array(
					'basic' => true,
					'host'	=> false,
					'full'	=> false,
				),
				
			'http://www/moo/page' => array(
					'basic' => true,
					'host'	=> false,
					'full'	=> false,
				),

			'www' => array(
					'basic' => false,
					'host'	=> false,
					'full'	=> false,
				),

			'www.google.com' => array(
					'basic' => false,
					'host'	=> false,
					'full'	=> false,
				),

			'www.google.com/' => array(
					'basic' => false,
					'host'	=> false,
					'full'	=> false,
				),

			'http://www.google.com' => array(
					'basic' => true,
					'host'	=> true,
					'full'	=> true,
				),

			'http://www.google.com/' => array(
					'basic' => true,
					'host'	=> true,
					'full'	=> true,
				),

			'http://http://www.google.com' => array(
					'basic' => false,
					'host'	=> false,
					'full'	=> false,
				),

			'http://https://www.google.com' => array(
					'basic' => true,
					'host'	=> false,
					'full'	=> false,
				),

			'http://www.google.com/Wt39Rudkf83aKSfOUekh24v' => array(
					'basic' => true,
					'host'	=> true,
					'full'	=> false,
				),

			'http://www.google.com:80' => array(
					'basic' => true,
					'host'	=> true,
					'full'	=> true,
				),

			'http://www.google.com:80/' => array(
					'basic' => true,
					'host'	=> true,
					'full'	=> true,
				),

			'http://anonymous@www.google.com' => array(
					'basic' => true,
					'host'	=> true,
					'full'	=> true,
				),

			'http://user:password@www.google.com' => array(
					'basic' => true,
					'host'	=> true,
					'full'	=> true,
				),
		);


	public function testUrlsWithoutRemoteAccess()
	{
		$this->runTests( 'basic', false, false );	
	}
	
	
	public function testUrlsWithHostnameSolving()
	{
		$this->runTests( 'host', true, false );
	}
	
	
	public function testUrlsWithFullSolving()
	{
		$this->runTests( 'full', true, true );
	}
		
	
	private function runTests( $mode, $validateHost, $validateAddress )
	{
		foreach( self::$urlArray as $url => $expectedResults )
		{
			$returnValue = StrictUrlValidator::validate( $url, $validateHost, $validateAddress );
			
			if( $expectedResults[ $mode ] === false )
			{
				$this->assertFalse( $returnValue, "$mode -- $url (was expecting error; success returned)" );
			}
			else
			{
				$this->assertTrue( $returnValue, "$mode -- $url: " . StrictUrlValidator::getError() . " (was expecting success)" );				
			}
		}
	}
	
}
