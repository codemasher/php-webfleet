<?php
/**
 * Interface TripsAndWorkingTimes
 *
 * @filesource   TripsAndWorkingTimes.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.8 Trips and working times
 *
 * @method array getMethods():array
 */
interface TripsAndWorkingTimes{

	/**
	 * 4.8.1 showTripReportExtern
	 *
	 * Provides a list of trips of an object. Trips of deleted objects cannot be shown.
	 *  In order to prevent your system from being flooded with oversized responses, the
	 * result is limited to 10000 entries, if the continuous replication is used.
	 * The limit can be adjusted per account on request.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showTripReportExtern(array $params = [], $dateRangeFilterParams = []):WebfleetResponse;

	const showTripReportExtern = [
		'required' => [],
		'optional' => [
			'objectno', 'tripid', 'driverno', 'drivergroupname', 'objectgroupname', 'objectuid', 'externalid', 'driveruid',
		],
		'limits'   => [1, 60],
	];

	/**
	 * 4.8.2 showTripSummaryReportExtern
	 *
	 * This action provides general information about a trip.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showTripSummaryReportExtern(array $params = [], $dateRangeFilterParams = []):WebfleetResponse;

	const showTripSummaryReportExtern = [
		'required' => [],
		'optional' => ['objectno', 'objectuid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.8.3 showTracks
	 *
	 * This action retrieves a list of positions of a vehicle for a defined period.
	 * If certain information was not available the corresponding results can be empty.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showTracks(array $params = [], $dateRangeFilterParams = []):WebfleetResponse;

	const showTracks = [
		'required' => [],
		'optional' => ['objectno', 'objectuid', 'externalid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.8.4 updateLogbook
	 *
	 * This action updates some parameters of an existing logbook entry.
	 * When using updateLogbook, you only need to include the parameters for which you want to change or delete
	 * the values. If you include a parameter and do not indicate a value, the existing value will be deleted.
	 * In addition to the specific parameters listed below the parameters
	 * modifiedby and modifiedon are being automatically stored.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateLogbook(array $params):WebfleetResponse;

	const updateLogbook = [
		'required' => ['tripid'],
		'optional' => ['logflag', 'logpurpose', 'logcontact', 'logcomment', 'reason'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.8.5 showLogbook
	 *
	 * This action returns the most recent state of logbook information for an indicated object or trip.
	 *
	 * Date range filter behaviour:
	 *
	 * The date range filter applies to the trip end date/time, not the date/time when the trip record was created.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showLogbook(array $params = [], $dateRangeFilterParams = []):WebfleetResponse;

	const showLogbook = [
		'required' => [],
		'optional' => ['objectno', 'tripid', 'objectuid', 'modified_since'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.8.6 showLogbookHistory
	 *
	 * This action returns a logbook history showing logbook edits including the old and new values.
	 * Change history records are available as of 1st of January 2011.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showLogbookHistory(array $params = [], $dateRangeFilterParams = []):WebfleetResponse;

	const showLogbookHistory = [
		'required' => [],
		'optional' => ['objectno', 'tripid', 'objectuid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.8.7 updateLogbookMode
	 *
	 * This action changes the driver’s logbook mode on the TomTom LINK 5xx/4xx/3xx.
	 * The change of the logbook mode will become effective with the next trip. If
	 * updateLogbookMode is executed during a trip, this trip will be ended and a new
	 * trip using the new logbook mode will be created.
	 *
	 * Limitations:
	 *
	 * - For LINK 3xx - firmware version 1.92 or higher
	 * - For LINK 5xx/4xx - firmware version 2.0 or higher
	 * - The Function for the LINK device must be set to Logbook.
	 *   You can set the Function for your object (LINK device) in WEBFLEET as follows:
	 *    1. Select your object.
	 *    2. Under Contract / Device click Configure in the details panel on the right.
	 *    3. Go to the Basic settings tab and select Logbook under Function.
	 * - You cannot change the logbook mode when a digital tachograph is connected to the LINK device.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateLogbookMode(array $params):WebfleetResponse;

	const updateLogbookMode = [
		'required' => ['logbook_mode'],
		'optional' => ['objectno', 'objectuid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.8.8 showWorkingTimes
	 *
	 * This report shows work time states changes of the (co)driver, the locations and vehicle.
	 *
	 * Parameter restrictions:
	 *
	 * Before processing a request, all parameters are checked for invalid combinations and an error message
	 * is returned if an unacceptable parameter combination is detected.
	 *
	 * - At least one of the filter parameters objectno or driverno must be provided.
	 * - The time period covered by date range filter (Date range filter parameters) may not be greater than 1 month.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showWorkingTimes(array $params, $dateRangeFilterParams):WebfleetResponse;

	const showWorkingTimes = [
		'required' => ['driveruid'],
		'optional' => ['driverno', 'objectno', 'objectuid', 'drivergroupname', 'objectgroupname'],
		'limits'   => [6, 60],
	];

	/**
	 * 4.8.9 showStandStills
	 *
	 * This actions shows a list of all stops for a certain vehicle for a specified period.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showStandStills(array $params, $dateRangeFilterParams):WebfleetResponse;

	const showStandStills = [
		'required' => ['objectuid'],
		'optional' => ['objectno', 'externalid'],
		'limits'   => [6, 60],
	];

	/**
	 * 4.8.10 showIdleExceptions
	 *
	 * This report shows a list of idle exceptions detected by the LINK or ecoPLUS of an
	 * object or of all objects of a object group. An idle event occurs when an object is still
	 * for more than five minutes with engine running.
	 * The report shows all idle exceptions that have ended within the period defined with
	 * the start_time and end_time.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showIdleExceptions(array $params = [], $dateRangeFilterParams):WebfleetResponse;

	const showIdleExceptions = [
		'required' => [],
		'optional' => ['objectno', 'objectgroupname', 'driverno', 'drivergroupname', 'objectuid', 'driveruid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.8.11 getObjectKPIs
	 *
	 * Using getObjectKPIs you can retrieve one or more KPIs (Key Performance
	 * Indicators) specific to an individual object.
	 *
	 * Note: getObjectKPIs is the successor action of getKPIs. All calls to getKPIs will be redirected to getObjectKPIs.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getObjectKPIs(array $params, $dateRangeFilterParams):WebfleetResponse;

	const getObjectKPIs = [
		'required' => ['kpinames'],
		'optional' => ['objectno', 'objectuid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.8.12 getDriverKPIs
	 *
	 * Using getDriverKPIs you can retrieve one or more KPIs (Key Performance Indicators) specific to an individual
	 * driver.
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getDriverKPIs(array $params, $dateRangeFilterParams):WebfleetResponse;

	const getDriverKPIs = [
		'required' => ['kpinames'],
		'optional' => ['driverno', 'driveruid', 'level'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.8.13 getRemainingDrivingTimesEU
	 *
	 * getRemainingDrivingTimesEU returns several remaining driving times for one
	 * or multiple drivers according to the rules of the EU. The respective driver must be
	 * assigned to a vehicle for which the additional service Remote Download for
	 * WEBFLEET Tachograph Manager or Remaining Driving Times is booked.
	 *
	 * Disclaimer:
	 *
	 * The remaining driving times supplied by TomTom are indicative and
	 * are reliant upon the information being obtained from the tachograph and sent to
	 * WEBFLEET via the onboard device installed in a vehicle. The algorithms used to
	 * calculate the indicative remaining driving times are based on European driving time
	 * legislation and it is you responsibility to verify remaining driving times and any
	 * applicable national legislation.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getRemainingDrivingTimesEU(array $params = []):WebfleetResponse;

	const getRemainingDrivingTimesEU = [
		'required' => [],
		'optional' => ['driverno', 'driveruid', 'drivergroupname', 'drivergroupuid'],
		'limits'   => [10, 60],
	];

}
