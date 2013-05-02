StrictUrlValidator
==================

This class is designed to provide stricter URL validation than 
built-in PHP functions do on their own.


Usage
-----

static function StrictUrlValidator::validate( $url, $validateHost = false, $validateAddress = false )

string	$url				The URL to be validated
boolean	$validateHost		If set to true, existence of the hostname will be tested
boolean	$validateAddress	If set to true, return code of the URL will be tested

Returns true if the URL appears to be valid, false otherwise.


static function StrictUrlValidator::getError()

Returns the error message which describes the reason behind the latest validation
error or an empty string if the latest validation was successful.


Example
-------


```php
<?php

if( StrictUrlValidator::validate( 'http://www.google.com/', true, true ) === true )
{
	echo "URL validated!\n";
}


if( StrictUrlValidator::validate( 'hello world', true, true ) === false )
{
	echo "URL validation failed: " . StrictUrlValidator::getError() . "\n";
}
```




