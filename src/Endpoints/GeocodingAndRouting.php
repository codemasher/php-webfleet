<?php
/**
 * Interface GeocodingAndRouting
 *
 * @filesource   GeocodingAndRouting.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.10 Geocoding and routing
 *
 * @method array getMethods():array
 */
interface GeocodingAndRouting{

	/**
	 * 4.10.1 geocodeAddress
	 *
	 * Geocodes the address provided as request parameters and returns all possible matches, one per line.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function geocodeAddress(array $params):WebfleetResponse;

	const geocodeAddress = [
		'required' => ['addrcountry'],
		'optional' => ['addrstreet', 'addrstreetnumber', 'addrzip', 'addrcity', 'freetext'],
	    'limits'   => [900, 3600],
	];

	/**
	 * 4.10.2 calcRouteSimpleExtern
	 *
	 * Determines the route from a start location to an end location and calculates the
	 * resulting estimated time of arrival for a specific route-type.
	 * Optionally IQ Routes and/or HD Traffic information can be included.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function calcRouteSimpleExtern(array $params):WebfleetResponse;

	const calcRouteSimpleExtern = [
		'required' => ['start_latitude', 'start_longitude', 'end_latitude', 'end_longitude'],
		'optional' => ['route_type', 'use_traffic', 'start_datetime', 'start_day', 'start_time', 'use_tollroads'],
		'limits'   => [6, 60],
	];

}
