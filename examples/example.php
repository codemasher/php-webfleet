<?php
/**
 *
 * @filesource   example.php
 * @created      02.08.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

require_once __DIR__.'/../vendor/autoload.php';

use chillerlan\TinyCurl\RequestOptions;
use Dotenv\Dotenv;

use TomTom\Telematics\{
	WebfleetConnect, WebfleetOptions, HTTP\TinyCurlClient
};

date_default_timezone_set('UTC');

(new Dotenv(__DIR__.'/../config', '.env'))->load();

$requestOptions = new RequestOptions([
	'ca_info'    => __DIR__.'/../config/cacert.pem',
	'user_agent' => 'chillerlan-php-webfleet/0.1 +https://github.com/codemasher/php-webfleet',
]);

$webfleetOptions = new WebfleetOptions([
	'account'  => getenv('WEBFLEET_ACCOUNT'),
	'username' => getenv('WEBFLEET_USERNAME'),
	'password' => getenv('WEBFLEET_PASSWORD'),
	'apikey'   => getenv('WEBFLEET_APIKEY'),
	'lang'     => 'en',
]);

$webfleet = (new WebfleetConnect(new TinyCurlClient($requestOptions), $webfleetOptions));

$wfGeocode = $webfleet->GeocodingAndRouting;

var_dump($wfGeocode->getMethods());

var_dump(
	$wfGeocode->geocodeAddress([
		'addrstreet'       => '...',
		'addrstreetnumber' => '...',
		'addrzip'          => '...',
		'addrcity'         => '...',
		'addrcountry'      => '...',
	])->json
);

