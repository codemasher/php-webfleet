<?php
/**
 * Interface ConfigurationAndSecurity
 *
 * @filesource   ConfigurationAndSecurity.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.11 Configuration and security
 *
 * @method array getMethods():array
 */
interface ConfigurationAndSecurity{

	/**
	 * 4.11.1 showSettings
	 *
	 * showSettings shows a number of WEBFLEET settings.
	 *
	 * Currently showSettings returns OptiDrive indicator related account settings only.
	 * The settings indicate the weight given to each influencing variable used for the
	 * calculation of the OptiDrive indicator. In WEBFLEET, when you move a slider of a
	 * variable under Settings in the Reporting tab, the given weight in relation to the
	 * weight of the other three variables is indicated in brackets.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showSettings(array $params):WebfleetResponse;

	const showSettings = [
		'required' => [],
		'optional' => ['target_username'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.11.2 createSession
	 *
	 * Using createSession a session on the server will be created. The result structure
	 * contains a sessiontoken, also see Authentication parameters. For the lifetime of
	 * the session that is usually ~60 minutes, this token can be used alternatively to
	 * account, username or password to authorise further requests to
	 * WEBFLEET.connect.
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function createSession():WebfleetResponse;

	const createSession = [
		'required' => [],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.11.3 terminateSession
	 *
	 * Using terminateSession you can invalidate a session that was created using
	 * createSession. After that you can create a new session.
	 *
	 * terminateSession does not require any specific parameters. You only need to
	 * indicate sessiontoken of the session that you want to invalidate, see Authentication
	 * parameters.
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function terminateSession():WebfleetResponse;

	const terminateSession = [
		'required' => [],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.11.4 showAccountOrderStates
	 *
	 * showAccountOrderStates retrieves the list of order states and their properties.
	 * The properties indicate if the respective order state appears in the order workflow
	 * and whether a notification shall be created when the respective order state was
	 * reported. These settings apply to all newly created orders within the WEBFLEET
	 * account.
	 *
	 * The settings of properties of order states correspond to the settings you can make
	 * in the WEBFLEET user interface.
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showAccountOrderStates():WebfleetResponse;

	const showAccountOrderStates = [
		'required' => [],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.11.5 updateAccountOrderState
	 *
	 * updateAccountOrderState updates the properties of an order state. This update
	 * applies to all newly created orders within an account. Previously created orders are
	 * not affected by this change. If you want to update the properties of multiple order
	 * states for the whole account you have to update each order state separately.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateAccountOrderState(array $params):WebfleetResponse;

	const updateAccountOrderState = [
		'required' => ['orderstate', 'enabled'],
		'optional' => ['eventlevel'],
		'limits'   => [50, 3600],
	];

	/**
	 * 4.11.6 showAccountOrderAutomations
	 *
	 * showAccountOrderAutomations retrieves the list of order automation steps.
	 * These properties indicate if an order shall be automatically accepted, started,
	 * navigated to etc. or if the driver shall be asked to actively confirm the steps. These
	 * settings apply to all newly created orders within the WEBFLEET account.
	 *
	 * The settings of the order workflow control correspond to the settings you can make
	 * in the WEBFLEET user interface.
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showAccountOrderAutomations():WebfleetResponse;

	const showAccountOrderAutomations = [
		'required' => [],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.11.7 updateAccountOrderAutomation
	 *
	 * updateAccountOrderAutomation updates the properties of the workflow steps
	 * of orders. This update applies to all newly created orders within an account.
	 * Previously created orders are not affected by this change. You can update multiple
	 * workflow steps by running the action for each step separately.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateAccountOrderAutomation(array $params):WebfleetResponse;

	const updateAccountOrderAutomation = [
		'required' => ['orderautomation', 'enabled'],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.11.8 getAccountStatusMessages
	 *
	 * getStatusMessages returns the predefined status messages for the WEBFLEET
	 * account. This includes both free text and order related status messages which are
	 * visible as predefined messages on the navigation device. By default the units
	 * synchronise these account status messages. For a configuration for individual
	 * objects refer to getStatusMessages.
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getAccountStatusMessages():WebfleetResponse;

	const getAccountStatusMessages = [
		'required' => [],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.11.9 getStatusMessages
	 *
	 * getStatusMessages returns the predefined status messages for a single object.
	 * This applies to both free text and order related status messages which are visible as
	 * predefined messages on the navigation device. By default these messages are
	 * synchronised with the status messages in the WEBFLEET account. For account
	 * wide configuration please refer to getAccountStatusMessages.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getStatusMessages(array $params):WebfleetResponse;

	const getStatusMessages = [
		'required' => ['objectuid'],
		'optional' => ['objectno'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.11.10 setVehicleConfig
	 *
	 * Using setVehicleConfig you can change one or more LINK specific configurations at once.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function setVehicleConfig(array $params):WebfleetResponse;

	const setVehicleConfig = [
		'required' => ['objectuid'],
		'optional' => ['objectno', 'ign_tripstart_timeout', 'ign_tripstop_timeout', 'standstill_timeout'],
		'limits'   => [30, 3600],
	];

	/**
	 * 4.11.11 getVehicleConfig
	 *
	 * Using getVehicleConfig you can retrieve LINK specific configuration settings for
	 * individual vehicles or all vehicles in the WEBFLEET account.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getVehicleConfig(array $params = []):WebfleetResponse;

	const getVehicleConfig = [
		'required' => [],
		'optional' => ['objectno', 'objectuid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.11.12 setStatusMessages
	 *
	 * setStatusMessages sets predefined text and order status messages for a specific
	 * object. These messages are visible as predefined messages on the driver terminal.
	 * Setting predefined status messages for the WEBFLEET account can be done using
	 * setAccountStatusMessages.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function setStatusMessages(array $params):WebfleetResponse;

	const setStatusMessages = [
		'required' => ['objectuid'],
		'optional' => ['objectno', 'reset'], // ts_txt_*, ts_el_*, os_txt_*, os_el_*
		'limits'   => [50, 28800],
	];

	/**
	 * 4.11.13 setAccountStatusMessages
	 *
	 * setAccountStatusMessages sets the predefined order and text status messages
	 * for a whole WEBFLEET account. For object specific configurations use
	 * setStatusMessages.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function setAccountStatusMessages(array $params):WebfleetResponse;

	const setAccountStatusMessages = [
		'required' => [],
		'optional' => [], // ts_txt_*, ts_el_*, os_txt_*, os_el_*
		'limits'   => [1, 14400],
	];

}
