<?php
/**
 * Interface Messages
 *
 * @filesource   Messages.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.4 Messages
 *
 * @method array getMethods():array
 */
interface Messages{

	/**
	 * 4.4.1 sendTextMessageExtern
	 *
	 * The sendTextMessageExtern operation allows you to send a text message to an object.
	 * The message is sent asynchronously and therefore a positive result of this operation
	 * does not indicate that the message was sent to the object successfully
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function sendTextMessageExtern(array $params):WebfleetResponse;

	const sendTextMessageExtern = [
		'required' => ['objectuid', 'messagetext'],
		'optional' => ['objectno'],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.4.2 clearTextMessagesExtern
	 *
	 * Removes all text messages from the device.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function clearTextMessagesExtern(array $params):WebfleetResponse;

	const clearTextMessagesExtern = [
		'required' => ['objectuid'],
		'optional' => [],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.4.3 showMessages
	 *
	 * Using showMessages you can retrieve exclusively text, order, or status messages without using the queue service.
	 * The maximum result size is limited to 500 entries.
	 * To get an additional batch of messages the date range parameter has to be changed.
	 *
	 *
	 * @param array $params
	 * @param array $dateRangeParams
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showMessages(array $params = [], $dateRangeParams = []):WebfleetResponse;

	const showMessages = [
		'required' => [],
		'optional' => ['objectno', 'category', 'objectuid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.4.4 sendBinaryMessage
	 *
	 * sendBinaryMessage sends a maximum of 2560 byte raw data to a the driver terminal.
	 * The base64 encoding required for transmission of binary messages through the web service
	 * API does not count as raw payload data size. Be aware that there can only be one pending binary
	 * message for a driver terminal at a time. Further calls of sendBinaryMessage for the same driver
	 * terminal will be rejected until the data is transferred to the driver terminal.
	 * To track the status of the binary message, please use the WEBFLEET.connect Queue Service.
	 *
	 * To run sendBinaryMessage an API key is required.
	 * This action is supported on TomTom PRO 82xx devices only.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function sendBinaryMessage(array $params):WebfleetResponse;

	const sendBinaryMessage = [
		'required' => ['objectuid', 'appid', 'data'],
		'optional' => ['objectno', 'correlationid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.4.5 resetBinaryMessages
	 *
	 * If the driver terminal does not respond to outgoing data sent using sendBinaryMessage the transfer
	 * status is incomplete. resetBinaryMessages resets the outgoing data transfer and gets back to a consistent
	 * state between integration server backend and device. This is important because you cannot send new data
	 * until the current transfer is completed or cancelled/reset. If the binary data to be delivered with the
	 * original send is still important from the view of the PRO.connect integration solution, the integration
	 * server backend should repeat the sendBinaryMessages operation after the reset.
	 *
	 * This action is supported on TomTom PRO 82xx devices only.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function resetBinaryMessages(array $params):WebfleetResponse;

	const resetBinaryMessages = [
		'required' => ['objectuid'],
		'optional' => ['objectno'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.4.6 clearBinaryMessages
	 *
	 * clearBinaryMessages removes data from the outgoing queue on the triver terminal. This can be used to remove
	 * stale data for applications on the driver terminal that do not exist anymore or that are unlikely to
	 * connect anymore. clearBinaryMessages is needed because the driver terminal does not remove outgoing
	 * data by itself as it cannot decide if an application will connect sometime.
	 *
	 * This action is supported on TomTom PRO 82xx devices only.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function clearBinaryMessages(array $params):WebfleetResponse;

	const clearBinaryMessages = [
		'required' => ['objectuid'],
		'optional' => ['objectno', 'appid'],
		'limits'   => [10, 60],
	];

}
