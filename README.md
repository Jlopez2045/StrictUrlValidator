StrictUrlValidator
==================

This class is designed to provide stricter URL validation than 
built-in PHP functions do on their own.


Usage
-----

`static function StrictUrlValidator::validate( $url, $validateHost = false, $validateAddress = false )`

<table>
<tr>
	<td>string	`$url`</td>
	<td>The URL to be validated</td>
</tr>
<tr>
	<td>boolean	`$validateHost`</td>
	<td>If set to `true`, existence of the hostname will be tested</td>
</tr>
<tr>
	<td>boolean	`$validateAddress`</td>
	<td>If set to `true`, server return code of the URL will be tested</td>
</tr>
</table>

Returns `true` if the URL appears to be valid, `false` otherwise.


`static function StrictUrlValidator::getError()`

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




