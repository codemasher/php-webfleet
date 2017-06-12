<?php
/**
 * Interface Reporting
 *
 * @filesource   Reporting.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.14 Reporting
 *
 * @method array getMethods():array
 */
interface Reporting{

	/**
	 * 4.14.1 getArchivedReportList
	 *
	 * getArchivedReportList lists information about the reports stored in the
	 * WEBFLEET Reports Archive of a specific user. It returns meta information of the
	 * reports such as ID, name, file size, creation time, etc.
	 *
	 * It does not fetch the report data (PDF or CSV). Use getArchivedReport to retrieve
	 * the actual PDF or CSV files.
	 *
	 *
	 * @param array $params
	 * @param array $dateRangeFilter
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getArchivedReportList(array $params = [], $dateRangeFilter):WebfleetResponse;

	const getArchivedReportList = [
		'required' => [],
		'optional' => ['reportid', 'reportname', 'format', 'creationtime', 'expirytime', 'size'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.14.2 getArchivedReport
	 *
	 * Using getArchivedReport you can retrieve a PDF or CSV report that is stored in
	 * the WEBFLEET Reports Archive of a specific user.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getArchivedReport(array $params):WebfleetResponse;

	const getArchivedReport = [
		'required' => ['reportid'],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.14.3 deleteArchivedReport
	 *
	 * Using deleteArchivedReport you can delete an archived report file from the
	 * WEBFLEET Reports Archive of a specific user.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteArchivedReport(array $params):WebfleetResponse;

	const deleteArchivedReport = [
		'required' => ['reportid'],
		'optional' => [],
		'limits'   => [10, 60],
	];

	/**
	 * 4.14.4 getReportList
	 *
	 * getReportList returns a list of reports, that can be created on demand and that
	 * are assigned to the current WEBFLEET user. Reports can be created on demand
	 * using sendReportViaMail or createReport.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getReportList(array $params = []):WebfleetResponse;

	const getReportList = [
		'required' => [],
		'optional' => ['reporttype'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.14.5 createReport
	 *
	 * Using createReport you can create a new PDF or CSV report on demand.
	 *
	 * @param array $params
	 * @param array $dateRangeFilter
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function createReport(array $params, $dateRangeFilter):WebfleetResponse;

	const createReport = [
		'required' => ['reportname'],
		'optional' => [
			'format', 'objectno', 'objectuid', 'objectgroupname', 'driverno', 'drivergroupname', 'orderno',
		],
		'limits'   => [5, 600],
	];

	/**
	 * 4.14.6 sendReportViaMail
	 *
	 * Using sendReportViaMail you can create a new PDF or CSV report on demand
	 * and send it to an indicated email address.
	 *
	 * @param array $params
	 * @param array $dateRangeFilter
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function sendReportViaMail(array $params, $dateRangeFilter):WebfleetResponse;

	const sendReportViaMail = [
		'required' => ['reportname', 'email'],
		'optional' => [
			'format', 'objectno', 'objectuid', 'objectgroupname', 'driverno', 'drivergroupname', 'orderno',
		],
		'limits'   => [5, 600],
	];

}
