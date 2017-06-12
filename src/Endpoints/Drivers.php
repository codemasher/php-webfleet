<?php
/**
 * Interface Drivers
 *
 * @filesource   Drivers.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.5 Drivers
 *
 * @method array getMethods():array
 */
interface Drivers{

	/**
	 * 4.5.2 showDriverReportExtern
	 *
	 * Lists all drivers matching the indicated parameters and filters.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showDriverReportExtern(array $params = []):WebfleetResponse;

	const showDriverReportExtern = [
		'required' => [],
		'optional' => ['filterstring', 'driverno', 'ungroupedonly', 'driveruid', 'driver_keys'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.3 insertDriverExtern
	 *
	 * This action creates a driver.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertDriverExtern(array $params):WebfleetResponse;

	const insertDriverExtern = [
		'required' => ['driverno', 'name'],
		'optional' => [
			'name2', 'name3', 'company', 'code', 'description', 'addrno',
			'country', 'zip', 'city', 'street', 'telmobile', 'telprivate', 'pin', 'email',
			'dt_cardid', 'dt_cardcountry', 'rll_buttonid', 'driver_key',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.4 updateDriverExtern
	 *
	 * This action updates driver details.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateDriverExtern(array $params):WebfleetResponse;

	const updateDriverExtern = [
		'required' => ['driveruid'],
		'optional' => [
			'driverno', 'name', 'name2', 'name3', 'company', 'code', 'description', 'addrno',
			'country', 'zip', 'city', 'street', 'telmobile', 'telprivate', 'pin', 'email',
			'dt_cardid', 'dt_cardcountry', 'rll_buttonid', 'driverno_old', 'driver_key',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.5 deleteDriverExtern
	 *
	 * This action deletes the indicated driver.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteDriverExtern(array $params):WebfleetResponse;

	const deleteDriverExtern = [
		'required' => ['driveruid'],
		'optional' => ['driverno'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.6 showOptiDriveIndicator
	 *
	 * showOptiDriveIndicator shows the OptiDrive indicator per driver, the values of all its
	 * influencing variables and the factors each of them is calculated from for a defined period.
	 * The start and end of this period can be adjusted up to a maximum time frame of seven days within the last three
	 * months. The OptiDrive indicator for the defined period delivered by showOptiDriveIndicator is calculated from
	 * pre-aggregated values per calendar day. The aggregated results produced by showOptiDriveIndicator are based on
	 * information for each driver across multiple vehicles.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showOptiDriveIndicator(array $params = []):WebfleetResponse;

	const showOptiDriveIndicator = [
		'required' => [],
		'optional' => ['driverno', 'drivergroupname', 'driveruid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.7 showDriverGroups
	 *
	 * This action retrieves a list of all driver groups.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showDriverGroups(array $params = []):WebfleetResponse;

	const showDriverGroups = [
		'required' => [],
		'optional' => ['drivergroupname'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.8 showDriverGroupDrivers
	 *
	 * This action lists the assignment of drivers to driver groups. Each driver can be in no,
	 * one or more than one group.
	 *
	 * Using either or both parameters driverno and drivergroupname only according matches are returned.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showDriverGroupDrivers(array $params = []):WebfleetResponse;

	const showDriverGroupDrivers = [
			'required' => [],
			'optional' => ['driverno', 'drivergroupname', 'driveruid'],
			'limits'   => [10, 60],
		];

	/**
	 * 4.5.9 attachDriverToGroup
	 *
	 * This action assigns a driver to a specific group.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function attachDriverToGroup(array $params):WebfleetResponse;

	const attachDriverToGroup = [
		'required' => ['drivergroupname', 'driveruid'],
		'optional' => ['driverno'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.10 detachDriverFromGroup
	 *
	 * This action detaches a driver from a specific driver group.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function detachDriverFromGroup(array $params):WebfleetResponse;

	const detachDriverFromGroup = [
		'required' => ['drivergroupname', 'driveruid'],
		'optional' => ['driverno'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.11 insertDriverGroup
	 *
	 * This action creates a driver group.
	 *
	 * The group name must not start with "sys$".
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertDriverGroup(array $params):WebfleetResponse;

	const insertDriverGroup = [
		'required' => ['drivergroupname'],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.12 deleteDriverGroup
	 *
	 * This action deletes a driver group and the assignments of all drivers to that group.
	 * The drivers detached through this action are not being deleted.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteDriverGroup(array $params):WebfleetResponse;

	const deleteDriverGroup = [
		'required' => ['drivergroupname'],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.13 updateDriverGroup
	 *
	 * This action allows to update the name of a driver group while retaining the
	 * assignment of drivers to that group.
	 *
	 * The group name must not start with "sys$".
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateDriverGroup(array $params):WebfleetResponse;

	const updateDriverGroup = [
		'required' => ['drivergroupname', 'drivergroupname_old'],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.14 attachDriverToVehicle
	 *
	 * Using attachDriverToVehicle you can manually assign a driver to a specific vehicle.
	 * If the driver was previously assigned to another vehicle, they will be automatically detached from that vehicle
	 * .
	 * This action cannot be executed when the driver is not manually assigned to another vehicle -
	 * that means by not using attachDriverToVehicle.
	 * Additionally, this action cannot be executed when a different driver is not manually assigned to
	 * the respective vehicle. This can be the case if the driver for example logs on to a vehicle
	 * by using a TomTom navigation device or a digital tachograph.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function attachDriverToVehicle(array $params):WebfleetResponse;

	const attachDriverToVehicle = [
		'required' => ['driveruid', 'objectuid'],
		'optional' => ['driverno', 'objectno'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.5.15 detachDriverFromVehicle
	 *
	 * Using detachDriverFromVehicle you can remove the manual assignment of a driver from a vehicle.
	 * This action cannot be executed if the driver was not manually assigned by using attachDriverToVehicle.
	 * This can be the case when the driver for example logged on to the vehicle using a TomTom navigation
	 * device or the digital tachograph.
	 *
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function detachDriverFromVehicle(array $params):WebfleetResponse;

	const detachDriverFromVehicle = [
		'required' => ['driveruid', 'objectuid'],
		'optional' => ['driverno', 'objectno'],
		'limits'   => [10, 60],
	];

}
