<?php
/**
 * Interface Addresses
 *
 * @filesource   Addresses.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.6 Addresses
 *
 * @todo api: addrnr -> addrno
 *
 *
 * @method array getMethods():array
 */
interface Addresses{

	/**
	 * 4.6.1 showAddressReportExtern
	 *
	 * This action returns a list of addresses matching the parameters and filters.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showAddressReportExtern(array $params = []):WebfleetResponse;

	const showAddressReportExtern = [
		'required' => [],
		'optional' => ['filterstring', 'addressgroupname', 'ungroupedonly', 'addrnr', 'addruid'],
		'limits'   => [6, 60],
	];

	/**
	 * 4.6.2 showAddressGroupReportExtern
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showAddressGroupReportExtern(array $params = []):WebfleetResponse;

	const showAddressGroupReportExtern = [
		'required' => [],
		'optional' => ['filterstring'],
		'limits'   => [900, 3600],
	];

	/**
	 * 4.6.3 showAddressGroupAddressReportExtern
	 *
	 * Shows a list with all associations between addresses and address groups.
	 * Each address can be in more than one address group, but must not necessarily belong to a group.
	 * The relationship between addresses and address groups is of m:n cardinality.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showAddressGroupAddressReportExtern(array $params = []):WebfleetResponse;

	const showAddressGroupAddressReportExtern = [
		'required' => [],
		'optional' => ['filterstring'],
		'limits'   => [900, 3600],
	];

	/**
	 * 4.6.4 insertAddressExtern
	 *
	 * Inserts an address record.
	 *
	 * @todo api: positiony/positionx -> latitude/longitude
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertAddressExtern(array $params):WebfleetResponse;

	const insertAddressExtern = [
		'required' => ['addrnr'],
		'optional' => [
			'addrname1', 'addrname2', 'addrname3', 'addrstreet', 'addrzip', 'addrcity', 'addrcountry',
			'addrregion', 'contact', 'teloffice', 'telmobile', 'telprivate', 'fax', 'mailaddr', 'radius',
			'addrinfo', 'location', 'positiony', 'positionx', 'visible', 'color', 'addrgrpname',
			'addrgrpuid', 'mapcode',
		],
		'limits'   => [900, 3600],
	];

	/**
	 * 4.6.5 updateAddressExtern
	 *
	 * Updates an existing address record.
	 *
	 * @todo api: positiony/positionx -> latitude/longitude
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateAddressExtern(array $params):WebfleetResponse;

	const updateAddressExtern = [
		'required' => ['addruid'],
		'optional' => [
			'addrnr', 'addrname1', 'addrname2', 'addrname3', 'addrstreet', 'addrzip', 'addrcity', 'addrcountry',
			'addrregion', 'contact', 'teloffice', 'telmobile', 'telprivate', 'fax', 'mailaddr', 'radius',
			'addrinfo', 'location', 'positiony', 'positionx', 'visible', 'color', 'mapcode',
		],
		'limits'   => [900, 3600],
	];

	/**
	 * 4.6.6 deleteAddressExtern
	 *
	 * @param array $params
	 *
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteAddressExtern(array $params):WebfleetResponse;

	const deleteAddressExtern = [
		'required' => ['addruid'],
		'optional' => ['addrnr'],
		'limits'   => [900, 3600],
	];

	/**
	 * 4.6.7 attachAddressToGroupExtern
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function attachAddressToGroupExtern(array $params):WebfleetResponse;

	const attachAddressToGroupExtern = [
		'required' => ['addruid', 'addrgrpuid'],
		'optional' => ['addrnr', 'addrgrpname'],
		'limits'   => [900, 3600],
	];

	/**
	 * 4.6.8 detachAddressFromGroupExtern
	 *
	 * Deletes the assignment of an address to an address group.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function detachAddressFromGroupExtern(array $params):WebfleetResponse;

	const detachAddressFromGroupExtern = [
		'required' => ['addruid', 'addrgrpuid'],
		'optional' => ['addrnr', 'addrgrpname'],
		'limits'   => [900, 3600],
	];

	/**
	 * 4.6.9 insertAddressGroupExtern
	 *
	 * This action creates an address group in an account.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertAddressGroupExtern(array $params):WebfleetResponse;

	const insertAddressGroupExtern = [
		'required' => ['addrgrpname'],
		'optional' => [],
		'limits'   => [900, 3600],
	];

	/**
	 * 4.6.10 deleteAddressGroupExtern
	 *
	 * This action deletes an address group and the assignments of all addresses assigned to that group.
	 * With this action you can also delete all addresses that are assigned to the address group.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteAddressGroupExtern(array $params):WebfleetResponse;

	const deleteAddressGroupExtern = [
		'required' => ['addrgrpuid'],
		'optional' => ['addrgrpname', 'deleteaddresses'],
		'limits'   => [900, 3600],
	];

}
