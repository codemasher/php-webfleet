<?php
/**
 * Class WebfleetResponse
 *
 * @filesource   WebfleetResponse.php
 * @created      14.03.2017
 * @package      TomTom\Telematics
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics;

/**
 * @property array          $headers
 * @property string         $body
 * @property bool|\stdClass $json
 */
class WebfleetResponse extends Container{

	/**
	 * @var array
	 */
	protected $headers = [];

	protected $request_time;
	protected $response_time;

	/**
	 * @var string
	 */
	protected $body;

	public function __get(string $property){

		if($property === 'json'){
			return json_decode($this->body);
		}
		else if(property_exists($this, $property)){
			return $this->{$property};
		}

		return false;
	}

}
