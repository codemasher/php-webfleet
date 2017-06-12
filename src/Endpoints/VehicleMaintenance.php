<?php
/**
 * Interface VehicleMaintenance
 *
 * @filesource   VehicleMaintenance.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.13 Vehicle Maintenance
 *
 * @method array getMethods():array
 */
interface VehicleMaintenance{

	/**
	 * 4.13.1 insertMaintenanceSchedule
	 *
	 * This action creates a new maintenance schedule and task for a specific object. When
	 * you have created a new maintenance schedule an ID for it will be returned.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertMaintenanceSchedule(array $params):WebfleetResponse;

	const insertMaintenanceSchedule = [
		'required' => ['objectuid', 'schedulename', 'scheduletype', 'ruletype'],
		'optional' => [
			'objectno', 'scheduledescription', 'intervaltime', 'intervalodometer', 'remindingtime',
			'remindingodometer', 'plannedexectime', 'plannedexecodometer', 'intervaltimetype',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.13.2 updateMaintenanceSchedule
	 *
	 * When using updateMaintenanceSchedule, you only need to include the
	 * parameters for which you want to change or delete the values. If you include a
	 * parameter and do not indicate a value, the existing value will be deleted.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateMaintenanceSchedule(array $params):WebfleetResponse;

	const updateMaintenanceSchedule = [
		'required' => ['scheduleid'],
		'optional' => [
			'schedulename', 'scheduledescription', 'scheduletype', 'ruletype', 'intervaltime', 'intervalodometer',
			'remindingtime', 'remindingodometer', 'plannedexectime', 'plannedexecodometer', 'intervaltimetype',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.13.3 deleteMaintenanceSchedule
	 *
	 * This action deletes an existing maintenance schedule and all related tasks. Tasks
	 * that have already been read or completed are not being deleted.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteMaintenanceSchedule(array $params):WebfleetResponse;

	const deleteMaintenanceSchedule = [
		'required' => ['scheduleid'],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.13.4 showMaintenanceSchedules
	 *
	 * This action retrieves a list of maintenance schedules.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showMaintenanceSchedules(array $params = []):WebfleetResponse;

	const showMaintenanceSchedules = [
		'required' => [],
		'optional' => ['objectno', 'objectgroupname', 'scheduleid', 'objectuid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.13.5 showMaintenanceTasks
	 *
	 * This action retrieves a list of maintenance tasks.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showMaintenanceTasks(array $params = []):WebfleetResponse;

	const showMaintenanceTasks = [
		'required' => [],
		'optional' => [
			'objectno', 'objectgroupname', 'scheduleid', 'taskid', 'status', 'objectuid', 'duetype', 'scheduletype',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.13.6 resolveMaintenanceTask
	 *
	 * This action resolves a maintenance task depending on the specified status.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function resolveMaintenanceTask(array $params):WebfleetResponse;

	const resolveMaintenanceTask = [
		'required' => ['taskid', 'status'],
		'optional' => [],
		'limits'   => [10, 60],
	];

}
