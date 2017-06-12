<?php
/**
 * Interface Areas
 *
 * @filesource   Areas.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.15 Areas
 *
 * @method array getMethods():array
 */
interface Areas{

	/**
	 * 4.15.1 getAreas
	 *
	 * This actions returns a list of all areas that are currently configured within the account.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getAreas(array $params = []):WebfleetResponse;

	const getAreas = [
		'required' => [],
		'optional' => ['areano', 'areauid', 'active'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.15.2 insertArea
	 *
	 * insertArea creates a new geographic area.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertArea(array $params):WebfleetResponse;

	const insertArea = [
		'required' => ['areano', 'areaname', 'type'],
		'optional' => [
			'active', 'validfrom', 'validto', 'notificationmode', 'eventlevel_inside', 'eventlevel_outside',
			'eventlevel_enter', 'eventlevel_leave', 'latitude', 'longitude', 'radius', 'width', 'height',
			'point', 'color',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.15.3 deleteArea
	 *
	 * deleteArea deletes an area. All possibly existing vehicle assignments and
	 * schedules for this area will be deleted too.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteArea(array $params):WebfleetResponse;

	const deleteArea = [
		'required' => ['areauid'],
		'optional' => ['areano'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.15.4 updateArea
	 *
	 * updateArea updates the details of an existing geographic area.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateArea(array $params):WebfleetResponse;

	const updateArea = [
		'required' => ['areauid'],
		'optional' => ['areaname', 'type', 'active', 'validfrom', 'validto', 'notificationmode',
			'eventlevel_inside', 'eventlevel_outside', 'eventlevel_enter', 'eventlevel_leave',
			'latitude', 'longitude', 'radius', 'width', 'height', 'point', 'color',
			],
		'limits'   => [10, 60],
	];

	/**
	 * 4.15.5 getAreaPoints
	 *
	 * This action returns a list of coordinates describing the geometric form and location
	 * of an area. getAreasPoints is only useful for areas in the shape of polygons or corridors.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getAreaPoints(array $params):WebfleetResponse;

	const getAreaPoints = [
		'required' => ['areauid'],
		'optional' => ['areano', 'active'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.15.6 getAreaAssignments
	 *
	 * getAreaAssignments returns a list of vehicles and object groups, that are
	 * assigned to an area. Assignments can be used to limit the validity of the area to
	 * specific vehicles or object groups.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getAreaAssignments(array $params):WebfleetResponse;

	const getAreaAssignments = [
		'required' => ['areauid'],
		'optional' => ['areano', 'objectno', 'objectuid', 'objectgroupname'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.15.7 insertAreaAssignment
	 *
	 * insertAreaAssignment adds a new assignment of a vehicle or object group to a
	 * specified area. Assignments can be used to limit the validity of the area to individual
	 * vehicles or object groups.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertAreaAssignment(array $params):WebfleetResponse;

	const insertAreaAssignment = [
		'required' => ['areauid'],
		'optional' => ['areano', 'objectno', 'objectuid', 'objectgroupname'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.15.8 deleteAreaAssignment
	 *
	 * deleteAreaAssignment deletes one or more vehicle or objectgroup assignments of an area.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteAreaAssignment(array $params):WebfleetResponse;

	const deleteAreaAssignment = [
		'required' => ['areauid', 'assignmentuid'],
		'optional' => ['areano'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.15.9 getAreaSchedules
	 *
	 * getAreaSchedules returns a list of days and times for which the area shall be
	 * effective. Schedules can be used to limit the validity of areas to specific days or time periods.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getAreaSchedules(array $params):WebfleetResponse;

	const getAreaSchedules = [
		'required' => ['areauid'],
		'optional' => ['areano'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.15.10 insertAreaSchedule
	 *
	 * insertAdreaSchedule adds a list of weekdays and times for which the area shall
	 * be effective. Schedules can be used to limit the validity of areas in a temporal way.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertAreaSchedule(array $params):WebfleetResponse;

	const insertAreaSchedule = [
		'required' => ['areauid'],
		'optional' => ['areano', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun', 'start_time', 'end_time'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.15.11 deleteAreaSchedule
	 *
	 * deteleAreaSchedule deletes one or more schedules of an area.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteAreaSchedule(array $params):WebfleetResponse;

	const deleteAreaSchedule = [
		'required' => ['areauid', 'scheduleuid'],
		'optional' => ['areano'],
		'limits'   => [10, 60],
	];

}
