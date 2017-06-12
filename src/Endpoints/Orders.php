<?php
/**
 * Interface Orders
 *
 * @filesource   Orders.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.3 Orders
 *
 * @method array getMethods():array
 */
interface Orders{

	/**
	 * 4.3.1 sendOrderExtern
	 *
	 * The sendOrderExtern operation allows you to send an order message to an object.
	 * The message is sent asynchronously and therefore a positive result of this operation
	 * does not indicate that the message was sent to the object successfully.
	 *
	 * Note: On the TomTom navigation device, the most recent order is shown at the top of the list of orders.
	 * But if you tap the 'new order' button in the Driving View, the oldest order is listed first.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function sendOrderExtern(array $params):WebfleetResponse;

	const sendOrderExtern = [
		'required' => ['objectuid', 'orderid', 'ordertext'],
		'optional' => ['objectno', 'useorderstates', 'orderautomations'],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.3.2 sendDestinationOrderExtern
	 *
	 * The sendDestinationOrderExtern operation allows you to send an order message together with target
	 * coordinates for a navigation system connected to the in-vehicle unit.
	 * The message is sent asynchronously and therefore a positive result of this operation does not
	 * indicate that the message was sent to the object successfully.
	 *
	 * Note: On the TomTom navigation device, the most recent order is shown at the top of the list of orders.
	 * But if you tap the 'new order' button in the Driving View, the oldest order is listed first.
	 *
	 * Use with ISO8601 date and time formats. If used in conjunction with useISO8601=true,
	 * you need to take care of specifying the time zone as otherwise UTC will be assumed by definition.
	 * Therefore you should always provide a time zone definition with orderdate,
	 * e.g. 2009-01-20T+01:00 and provide your local time part to ordertime.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function sendDestinationOrderExtern(array $params):WebfleetResponse;

	const sendDestinationOrderExtern = [
		'required' => ['objectuid', 'orderid', 'ordertext', 'longitude', 'latitude'],
		'optional' => [
			'objectno', 'ordertype', 'orderdate', 'ordertime', 'arrivaltolerance', 'notify_enabled',
			'notify_leadtime', 'contact', 'contacttel', 'addrnr', 'country', 'zip', 'city', 'street',
			'useorderstates', 'orderautomations', 'wp', 'mapcode',
		],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.3.3 updateOrderExtern
	 *
	 * Updates an order that was submitted with sendOrderExtern.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateOrderExtern(array $params):WebfleetResponse;

	const updateOrderExtern = [
		'required' => ['orderid', 'ordertext'],
		'optional' => ['orderautomations'],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.3.4 updateDestinationOrderExtern
	 *
	 * Updates an order that was submitted with sendDestinationOrderExtern or with insertDestinationOrderExtern.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateDestinationOrderExtern(array $params):WebfleetResponse;

	const updateDestinationOrderExtern = [
		'required' => ['orderid'],
		'optional' => [
			'ordertext', 'orderdate', 'ordertime', 'arrivaltolerance', 'contact', 'contacttel', 'addrnr',
			'longitude', 'latitude', 'country', 'zip', 'city', 'street', 'orderautomations', 'wp', 'mapcode',
		],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.3.5 insertDestinationOrderExtern
	 *
	 * The insertDestinationOrderExtern operation allows you to transmit an order message to WEBFLEET.
	 * The message is not sent and must be manually dispatched to an object within WEBFLEET.
	 *
	 * @todo doc: parameter objectuid listed w/o objectno. superfluos?
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertDestinationOrderExtern(array $params):WebfleetResponse;

	const insertDestinationOrderExtern = [
		'required' => ['orderid', 'ordertext'],
		'optional' => [
			'ordertype', 'orderdate', 'ordertime', 'arrivaltolerance', 'notify_enabled', 'notify_leadtime',
			'contact', 'contacttel', 'addrnr', 'longitude', 'latitude', 'country', 'zip', 'city', 'street',
			'wp', 'mapcode',
		],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.3.6 cancelOrderExtern
	 *
	 * Cancels orders that were submitted using one of sendDestinationOrderExtern,
	 * insertDestinationOrderExtern or sendOrderExtern.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function cancelOrderExtern(array $params):WebfleetResponse;

	const cancelOrderExtern = [
		'required' => ['orderid'],
		'optional' => [],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.3.7 assignOrderExtern
	 *
	 * Assigns an existing order to an object and can be used to accomplish the following:
	 *
	 * - send an order that was inserted before using insertDestinationOrderExtern
	 * - resend an order that has been rejected or cancelled
	 *
	 * @todo doc: objectno/objectuid listed as optional, should be required.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function assignOrderExtern(array $params):WebfleetResponse;

	const assignOrderExtern = [
		'required' => ['orderid', 'objectuid'],
		'optional' => ['objectno', 'orderautomations'],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.3.8 reassignOrderExtern
	 *
	 * Reassigns an order that was submitted using one of sendDestinationOrderExtern,
	 * insertDestinationOrderExtern or sendOrderExtern to another object.
	 * This is done by cancelling the order on the old object that is currently assigned
	 * to this order and assigning the new object to the order. The order is then sent to the new object.
	 *
	 * @todo api: objectid -> objectno
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function reassignOrderExtern(array $params):WebfleetResponse;

	const reassignOrderExtern = [
		'required' => ['orderid', 'objectuid'],
		'optional' => ['objectid', 'orderautomations'],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.3.9 deleteOrderExtern
	 *
	 * Deletes an order from a device and optionally marks it as deleted in WEBFLEET.
	 * Supported for the stand-alone TomTom navigation devices connected to
	 * WEBFLEET and the TomTom navigation devices connected to LINK 5xx/4xx/3xx.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteOrderExtern(array $params):WebfleetResponse;

	const deleteOrderExtern = [
		'required' => ['orderid'],
		'optional' => ['mark_deleted'],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.3.10 clearOrdersExtern
	 *
	 * Removes all orders from the device and optionally marks them as deleted in WEBFLEET.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function clearOrdersExtern(array $params):WebfleetResponse;

	const clearOrdersExtern = [
		'required' => ['objectuid'],
		'optional' => ['objectno', 'mark_deleted'],
		'limits'   => [300, 1800],
	];

	/**
	 * 4.3.11 showOrderReportExtern
	 *
	 * Shows a list of orders that match the search parameters.
	 * Each entry shows the order details and current status information.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showOrderReportExtern(array $params):WebfleetResponse;

	const showOrderReportExtern = [
		'required' => [],
		'optional' => ['objectno', 'objectgroupname', 'orderid', 'ordertype', 'objectuid'],
		'limits'   => [6, 60],
	];

	/**
	 * 4.3.12 showOrderWaypoints
	 *
	 * This action retrieves the waypoints for an itinerary order with additional information on the validity and state.
	 * The waypoints are sorted in the same order which was used when creating the itinerary.
	 * Itinerary orders (predefined routes over the air) are supported on all TomTom PRO devices with
	 * software version 10.537 or higher.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showOrderWaypoints(array $params):WebfleetResponse;

	const showOrderWaypoints = [
		'required' => [],
		'optional' => ['orderid'],
		'limits'   => [10, 60],
	];

}
