<?php
/**
 *
 * @filesource   WebfleetEndpoint.php
 * @created      19.03.2017
 * @package      TomTom\Telematics
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics;

use TomTom\Telematics\HTTP\HTTPClientInterface;

/**
 * Class WebfleetEndpoint
 */
class WebfleetEndpoint extends WebfleetConnect{

	const  RANGE_PATTERN = [
		'd0', 'd-1', 'd-2', 'd-3', 'd-4', 'd-5', 'd-6',
		'w0', 'w-1', 'w-2', 'w-3',
		'wf0', 'wf-1', 'wf-2', 'wf-3',
		'm0', 'm-1', 'm-2', 'm-3',
	];

	/**
	 * __anonymous constructor.
	 *
	 * @param \TomTom\Telematics\HTTP\HTTPClientInterface $http
	 * @param \TomTom\Telematics\WebfleetOptions          $options
	 * @param string                                      $interface
	 */
	public function __construct(HTTPClientInterface $http, WebfleetOptions $options, string $interface){
		parent::__construct($http, $options);

		$this->endpoint = $interface;
	}

	/**
	 * @param string $method
	 * @param array $arguments
	 *
	 * @todo rate limits
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 * @throws \TomTom\Telematics\WebfleetException
	 */
	public function __call(string $method, array $arguments):WebfleetResponse{

		if(isset($this->method_map[$this->endpoint]) && array_key_exists($method, $this->method_map[$this->endpoint])){
			$_method = $this->method_map[$this->endpoint][$method];

			// ...limiter

			// method parameters
			$params = isset($arguments[0]) && !empty($arguments[0]) ? $arguments[0] : [];

			if(isset($_method['required']) && !empty($_method['required']) && empty(array_intersect($_method['required'], array_keys($params)))){
				throw new WebfleetException('required parameter missing');
			}

			// date range
			if(isset($arguments[1]) && !empty($arguments[1])){
				$params = array_merge($params, $this->dateRangeFilter($arguments[1]));
			}

			$params = array_merge($this->options->__toArray(), $params, ['action' => $method]);

			foreach($params as $param => $value){

				if(is_null($value)){
					unset($params[$param]);
				}
				elseif(is_bool($value)){
					$params[$param] = $value ? 'true' : 'false';
				}

			}

			return $this->http->request($params);
		}

		throw new WebfleetException('method does not exist in class "'.$this->endpoint.'": '.$method);
	}

	/**
	 * @param array $date_range_params
	 *
	 * @todo doc: Table 3-3: Date range filter parameters -> ISO8601 (only mentioned in general params)
	 *
	 * @return array
	 * @throws \TomTom\Telematics\WebfleetException
	 */
	protected function dateRangeFilter(array $date_range_params):array {

		// range pattern
		if(isset($date_range_params['range_pattern']) && in_array($date_range_params['range_pattern'], self::RANGE_PATTERN)){
			return ['range_pattern' => $date_range_params['range_pattern']];
		}

		// range_from/to, either as string or unix timestamp
		elseif(isset($date_range_params['rangefrom_string'], $date_range_params['rangeto_string'])){
			$params = ['range_pattern' => 'ud'];

			foreach(['rangefrom_string', 'rangeto_string'] as $k){

				if(empty($date_range_params[$k])){
					throw new WebfleetException('invalid date range value: '.$k);
				}

				$params[$k] = is_int($date_range_params[$k])
					? date('c', $date_range_params[$k])
					: $date_range_params[$k];
			}

			return $params;
		}

		// year/month/day
		elseif(isset($date_range_params['year'])){
			$year = intval($date_range_params['year']);

			if(!in_array($year, range(2004, (int)date('Y')), true)){
				throw new WebfleetException('invalid year value: '.$date_range_params['year']);
			}

			$params = ['year' => $year];

			if(isset($date_range_params['month'])){
				$month = intval($date_range_params['month']);

				if(!in_array($month, range(1, 12), true)){
					throw new WebfleetException('invalid month value: '.$date_range_params['month']);
				}

				$params['month'] =  $month;

				if(isset($date_range_params['day'])){
					$day = intval($date_range_params['day']);

					if(!in_array($day, range(1, (int)date('t', mktime(0,0,0, $month, 1, $year))), true)){
						throw new WebfleetException('invalid day value: '.$date_range_params['day']);
					}

					$params['day'] =  $day;
				}

			}

			return $params;
		}

		throw new WebfleetException('invalid date range parameters');
	}

}
