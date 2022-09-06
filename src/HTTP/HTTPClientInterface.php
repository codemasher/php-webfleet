<?php
/**
 * Interface HTTPClientInterface
 *
 * @filesource   HTTPClientInterface.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\HTTP
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\HTTP;

use TomTom\Telematics\WebfleetResponse;

/**
 *
 */
interface HTTPClientInterface{

	const API_BASE = 'https://csv.webfleet.com/extern/';

	/**
	 * @param array  $params
	 * @param string $method
	 * @param mixed  $body
	 * @param array  $headers
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function request(array $params = [], string $method = 'GET', $body = null, array $headers = []):WebfleetResponse;

	/**
	 * @param array $headers
	 *
	 * @return array
	 */
	public function normalizeHeaders(array $headers):array;

}
