<?php
/**
 * Class WebfleetConnect
 *
 * @filesource   WebfleetConnect.php
 * @created      14.03.2017
 * @package      TomTom\Telematics
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics;

use ReflectionClass;
use TomTom\Telematics\HTTP\HTTPClientInterface;

use TomTom\Telematics\Endpoints\{
	Addresses, Areas, ConfigurationAndSecurity, Drivers, Events, GeocodingAndRouting,
	LINKconnect, MessageQueues, Messages, MiscellaneousReports, Objects, Orders,
	Reporting, TripsAndWorkingTimes, UserManagement, VehicleMaintenance
};

/**
 * @property MessageQueues            $MessageQueues            // 4.1
 * @property Objects                  $Objects                  // 4.2
 * @property Orders                   $Orders                   // 4.3
 * @property Messages                 $Messages                 // 4.4
 * @property Drivers                  $Drivers                  // 4.5
 * @property Addresses                $Addresses                // 4.6
 * @property Events                   $Events                   // 4.7
 * @property TripsAndWorkingTimes     $TripsAndWorkingTimes     // 4.8
 * @property MiscellaneousReports     $MiscellaneousReports     // 4.9
 * @property GeocodingAndRouting      $GeocodingAndRouting      // 4.10
 * @property ConfigurationAndSecurity $ConfigurationAndSecurity // 4.11
 * @property UserManagement           $UserManagement           // 4.12
 * @property VehicleMaintenance       $VehicleMaintenance       // 4.13
 * @property Reporting                $Reporting                // 4.14
 * @property Areas                    $Areas                    // 4.15
 * @property LINKconnect              $LINKconnect              // 4.16
 */
class WebfleetConnect{

	const INTERFACES = [
		MessageQueues::class,
		Objects::class,
		Orders::class,
		Messages::class,
		Drivers::class,
		Addresses::class,
		Events::class,
		TripsAndWorkingTimes::class,
		MiscellaneousReports::class,
		GeocodingAndRouting::class,
		ConfigurationAndSecurity::class,
		UserManagement::class,
		VehicleMaintenance::class,
		Reporting::class,
		Areas::class,
		LINKconnect::class,
	];

	/**
	 * @var array
	 */
	protected $method_map = [];

	/**
	 * @var string
	 */
	protected $endpoint;

	/**
	 * @var \TomTom\Telematics\HTTP\HTTPClientInterface
	 */
	protected $http;

	/**
	 * @var \TomTom\Telematics\WebfleetOptions
	 */
	protected $options;

	/**
	 * WebfleetConnect constructor.
	 *
	 * @param \TomTom\Telematics\HTTP\HTTPClientInterface $http
	 * @param \TomTom\Telematics\WebfleetOptions          $options
	 */
	public function __construct(HTTPClientInterface $http, WebfleetOptions $options){
		$this->http    = $http;
		$this->options = $options;

		$this->mapApiMethods();
	}

	/**
	 * @param string $interface
	 *
	 * @return \TomTom\Telematics\WebfleetEndpoint
	 * @throws \TomTom\Telematics\WebfleetException
	 */
	public function __get(string $interface):WebfleetEndpoint{
		$interface = __NAMESPACE__.'\\Endpoints\\'.$interface;

		if(array_key_exists($interface, $this->method_map)){
			return new WebfleetEndpoint($this->http, $this->options, $interface);
		}

		throw new WebfleetException('interface does not exist: '.$interface);
	}

	/**
	 * Maps the WebfleetConnectInterface methods -> Interface name
	 */
	protected function mapApiMethods(){

		foreach(self::INTERFACES as $interface){
			$reflection_class = new ReflectionClass($interface);

			foreach($reflection_class->getMethods() as $method){
				$this->method_map[$interface][$method->name] = $reflection_class->getConstant($method->name);
			}
		}
#		file_put_contents(__DIR__.'/../config/webfleet_interface.json', json_encode($this->method_map, JSON_PRETTY_PRINT));
	}

	/**
	 * @return array
	 */
	public function getMethods():array {
		return $this->endpoint ? $this->method_map[$this->endpoint] : $this->method_map;
	}

	/**
	 * @param string $dms input = 11°12'56,6 O (TomTom API)
	 *
	 * @return string
	 */
	public function dms2dec($dms){
		$deg = explode(chr(176), trim($dms));
		$min = explode(chr(39), $deg[1]);

		return (in_array(substr($dms, -1), ['S', 'W'], true) ? '-' : '').($deg[0]+round(($min[0]*60+$min[1])/3600,8));
	}

	/**
	 * @param string $method
	 * @param int    $timestamp
	 *
	 * @return bool
	 */
	protected function timerCheck(string $method, int $timestamp):bool{

		$limits = $this->method_map[$this->endpoint][$method]['limits'];

		if(time() > $timestamp + intval($limits[0] / $limits[1])){
			return true;
		}

		return false;
	}

}
