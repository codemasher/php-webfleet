<?php
/**
 * Interface LINKconnect
 *
 * @filesource   LINKconnect.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.16 LINK.connect
 *
 * @method array getMethods():array
 */
interface LINKconnect{

	/**
	 * 4.16.2 sendAuxDeviceData
	 *
	 * sendAuxDeviceData sends the given opaque payload data to the specified thrid
	 * party device using the indicated WEBFLEET unit/LINK device.
	 *
	 * Maximum allowed data size is 2560 byte raw opaque payload data. The base64
	 * encoding required for transmission of opaque payload through the web service API
	 * does not count as raw payload data size.
	 *
	 * There can only be one pending aux device data message for a LINK at a time.
	 * Further calls to sendAuxDeviceData for the same LINK will be rejected until the
	 * data is transferred to the LINK.
	 *
	 * To track the status of the opaque payload message once sent, please use the
	 * WEBFLEET.connect Queue Service.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function sendAuxDeviceData(array $params):WebfleetResponse;

	const sendAuxDeviceData = [
		'required' => ['objectuid'],
		'optional' => ['objectno', 'data', 'deviceid', 'correlationid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.16.3 getLocalAuxDeviceConfig
	 *
	 * getLocalAuxDeviceConfig returns the stored and applicable configuration of a
	 * WEBFLEET unit regarding Bluetooth connectivity.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getLocalAuxDeviceConfig(array $params = []):WebfleetResponse;

	const getLocalAuxDeviceConfig = [
		'required' => [],
		'optional' => ['objectno', 'objectuid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.16.4 configureLocalAuxDevice
	 *
	 * configureLocalAuxDevice allows the integration server backend to change
	 * configuration settings relating to aux devices. Currently the settings are Bluetooth
	 * specific. All configuration parameters are optional. Parameters not specified in the
	 * request will not be changed.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function configureLocalAuxDevice(array $params):WebfleetResponse;

	const configureLocalAuxDevice = [
		'required' => ['objectuid'],
		'optional' => [
			'objectno', 'servicename', 'serviceuuid', 'authentication', 'addgpsfix', 'addtimestamp', 'addodometer',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.16.5 getRemoteAuxDeviceConfig
	 *
	 * getRemoteAuxDeviceConfig returns the stored and applicable configuration of a
	 * WEBFLEET unit regarding Bluetooth remote aux devices.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getRemoteAuxDeviceConfig(array $params):WebfleetResponse;

	const getRemoteAuxDeviceConfig = [
		'required' => ['objectuid'],
		'optional' => ['objectno'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.16.6 configureRemoteAuxDevice
	 *
	 * configureRemoteAuxDevice allows the integration server backend to change
	 * configuration settings relating to a remote aux device. Currently the settings are
	 * Bluetooth specific. All configuration parameters are optional. Parameters not
	 * specified in the request will not be changed. To remove a value specify null or use
	 * an empty parameter value.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function configureRemoteAuxDevice(array $params):WebfleetResponse;

	const configureRemoteAuxDevice = [
		'required' => ['objectuid'],
		'optional' => [
			'objectno', 'configid', 'deviceid', 'friendlyname', 'servicename', 'serviceuuid', 'channel',
			'pin', 'sppbuffersize', 'sppflushtimeout',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.16.7 removeRemoteAuxDeviceConfig
	 *
	 * removeRemoteAuxDeviceConfig removes a remote aux device configuration.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function removeRemoteAuxDeviceConfig(array $params):WebfleetResponse;

	const removeRemoteAuxDeviceConfig = [
		'required' => ['objectuid', 'configid'],
		'optional' => ['objectno'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.16.8 clearAuxDeviceDataQueue
	 *
	 * clearAuxDeviceDataQueue removes data from the outgoing queue of the LINK.
	 * This can be used to remove stale data for third party devices that do not exist
	 * anymore or that are unlikely to connect anymore. The LINK does not remove
	 * outgoing data by itself because it cannot decide if a third party device will connect sometime.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function clearAuxDeviceDataQueue(array $params):WebfleetResponse;

	const clearAuxDeviceDataQueue = [
		'required' => ['objectuid', 'deviceid'],
		'optional' => ['objectno'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.16.9 resetAuxDeviceData
	 *
	 * If the LINK does not respond to outgoing aux device data sent with
	 * sendAuxDeviceData the transfer status is incomplete. In such cases
	 * resetAuxDeviceData must be used to reset the outgoing data transfer and get
	 * back to a consistent state between integration server backend and aux device. This
	 * is important because you cannot send new data until the current transfer is
	 * completed or cancelled/reset. If the opaque payload to be delivered with the original
	 * send is still important from the view of LINK.connect integration solution, the
	 * integration server backend should repeat the sendAuxDeviceData operation after the reset.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function resetAuxDeviceData(array $params):WebfleetResponse;

	const resetAuxDeviceData = [
		'required' => ['objectuid'],
		'optional' => ['objectno'],
		'limits'   => [10, 60],
	];

}
