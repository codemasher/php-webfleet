<?php
/**
 * Interface MiscellaneousReports
 *
 * @filesource   MiscellaneousReports.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.9 Miscellaneous reports
 *
 * @method array getMethods():array
 */
interface MiscellaneousReports{

	/**
	 * 4.9.1 showIOReportExtern
	 *
	 * This action returns a list of events recorded with the inputs and outputs of the LINK device.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showIOReportExtern(array $params = [], $dateRangeFilterParams):WebfleetResponse;

	const showIOReportExtern = [
		'required' => [],
		'optional' => ['objectno', 'iofilter', 'objectuid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.9.2 showAccelerationEvents
	 *
	 * This action shows unwanted driver behaviour. It shows a list of events with
	 * information on excessive acceleration, breaking or cornering, based on a threshold
	 * defined by the user. These events only cover short time periods, e.g. two to four
	 * seconds for a sharp turn.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showAccelerationEvents(array $params = [], $dateRangeFilterParams):WebfleetResponse;

	const showAccelerationEvents = [
		'required' => [],
		'optional' => [
			'objectno', 'driverno', 'drivergroupname', 'avg_accel', 'accelerationtypes', 'objectuid', 'externalid', 'driveruid',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.9.3 showSpeedingEvents
	 *
	 * This action shows unwanted driver behaviour.
	 * It shows a list of trips or part of trips with information on excessive speeding.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showSpeedingEvents(array $params = [], $dateRangeFilterParams):WebfleetResponse;

	const showSpeedingEvents = [
		'required' => [],
		'optional' => ['objectno', 'driverno', 'objectgroupname', 'drivergroupname', 'objectuid', 'externalid', 'driveruid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.9.4 getCrashLog
	 *
	 * Using getCrashLog you can retrieve all crash log data reported by a LINK 100 device.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getCrashLog(array $params, $dateRangeFilterParams):WebfleetResponse;

	const getCrashLog = [
		'required' => ['objectuid'],
		'optional' => ['objectno'],
		'limits'   => [10, 60],
	];

}
