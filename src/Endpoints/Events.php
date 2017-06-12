<?php
/**
 * Interface Events
 *
 * @filesource   Events.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.7 Events
 *
 * @method array getMethods():array
 */
interface Events{

	/**
	 * 4.7.1 showEventReportExtern
	 *
	 * Provides a list of event notifications.
	 *
	 *
	 * @param array $params
	 * @param array $dateRangeFilterParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showEventReportExtern(array $params = [], $dateRangeFilterParams = []):WebfleetResponse;

	const showEventReportExtern = [
		'required' => [],
		'optional' => ['objectno', 'eventlevel_cur', 'resolved', 'acknowledged', 'objectuid'],
		'limits'   => [1, 60],
	];

	/**
	 * 4.7.2 acknowledgeEventExtern
	 *
	 * Flags an event at an alarmed level as acknowledged.
	 * The event level will be set to the next lower level.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function acknowledgeEventExtern(array $params):WebfleetResponse;

	const acknowledgeEventExtern = [
		'required' => ['eventid'],
		'optional' => [],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.7.3 resolveEventExtern
	 *
	 * Flags an event below an alarmed level as resolved.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function resolveEventExtern(array $params):WebfleetResponse;

	const resolveEventExtern = [
		'required' => ['eventid'],
		'optional' => [],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.7.4 getEventForwardConfigs
	 *
	 * This action returns event forwarding configurations.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getEventForwardConfigs(array $params = []):WebfleetResponse;

	const getEventForwardConfigs = [
		'required' => [],
		'optional' => ['objectgroupname', 'objectno', 'objectuid', 'eventlevel'],
		'limits'   => [10,  60],
	];

	/**
	 * 4.7.5 getEventForwardConfigRecipients
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getEventForwardConfigRecipients(array $params):WebfleetResponse;

	const getEventForwardConfigRecipients = [
		'required' => ['eventforwardconfiguid'],
		'optional' => [],
		'limits'   => [10,  60],
	];

	/**
	 * 4.7.6 insertEventForwardConfig
	 *
	 * Using insertEventForwardConfig you can create a new event forwarding configuration.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertEventForwardConfig(array $params):WebfleetResponse;

	const insertEventForwardConfig = [
		'required' => ['eventlevel', 'recipient'],
		'optional' => ['objectgroupname', 'objectno', 'objectuid'],
		'limits'   => [10,  60],
	];

	/**
	 * 4.7.7 updateEventForwardConfig
	 *
	 * Using updateEventForwardConfig you can update an existing event forwarding configuration.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateEventForwardConfig(array $params):WebfleetResponse;

	const updateEventForwardConfig = [
		'required' => ['eventforwardconfiguid', 'eventlevel', 'recipient'],
		'optional' => ['objectgroupname', 'objectno', 'objectuid'],
		'limits'   => [10,  60],
	];

	/**
	 * 4.7.8 deleteEventForwardConfig
	 *
	 * Using deleteEventForwardConfig you can delete an existing event forwarding configuration.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteEventForwardConfig(array $params):WebfleetResponse;

	const deleteEventForwardConfig = [
		'required' => ['eventforwardconfiguid'],
		'optional' => [],
		'limits'   => [10,  60],
	];

}
