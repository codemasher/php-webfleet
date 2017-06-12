<?php
/**
 * Interface UserManagement
 *
 * @filesource   UserManagement.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\Endpoints
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

use TomTom\Telematics\WebfleetResponse;

/**
 * 4.12 User management
 *
 * @method array getMethods():array
 */
interface UserManagement{

	/**
	 * 4.12.1 showUsers
	 *
	 * This actions returns a list of all existing users within the account along with the last recorded login time.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function showUsers(array $params = []):WebfleetResponse;

	const showUsers = [
		'required' => [],
		'optional' => ['username_filter', 'realname_filter', 'company_filter'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.12.2 changePassword
	 *
	 * Using changePassword you can change the password of your own user account.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function changePassword(array $params):WebfleetResponse;

	const changePassword = [
		'required' => ['oldpassword', 'newpassword'],
		'optional' => [],
		'limits'   => [10, 3600],
	];

	/**
	 * 4.12.3 insertUser
	 *
	 * Using insertUser you can create a new WEBFLEET user within the current account.
	 *
	 * Note: This action can only be executed by users, that have the "Administrator" profile.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function insertUser(array $params):WebfleetResponse;

	const insertUser = [
		'required' => ['new_username', 'realname', 'email', 'profile'],
		'optional' => [
			'new_password', 'require_password_change', 'info', 'company', 'validfrom', 'validto', 'interfacestyle',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.12.4 updateUser
	 *
	 * Using updateUser you can update the details of a WEBFLEET user within the current account.
	 *
	 * Note: This action can only be executed by users, that have the "Administrator" profile.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function updateUser(array $params):WebfleetResponse;

	const updateUser = [
		'required' => ['target_useruid'],
		'optional' => [
			'target_username', 'new_username', 'new_password', 'generate_password', 'require_password_change',
			'realname', 'info', 'company', 'email', 'validfrom', 'validto', 'profile', 'interfacestyle',
		],
		'limits'   => [10, 60],
	];

	/**
	 * 4.12.5 deleteUser
	 *
	 * Using deleteUser you can delete a WEBFLEET user within the current account.
	 *
	 * Note: This action can only be executed by users, that have the "Administrator" profile.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function deleteUser(array $params):WebfleetResponse;

	const deleteUser = [
		'required' => ['target_useruid'],
		'optional' => ['target_username'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.12.6 getUserRights
	 *
	 * This action returns the currently configured access right levels for a specified user.
	 * The result contains profile default rights and individually configured rights.
	 *
	 * Note: This action can only be executed by users, that have the "Administrator" profile.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function getUserRights(array $params):WebfleetResponse;

	const getUserRights = [
		'required' => ['target_useruid'],
		'optional' => ['target_username'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.12.7 setUserRight
	 *
	 * This action adds a right level to an individual user. Right levels can only be changed
	 * for users with the standard or bigmap interface style (interfacestyle). For
	 * users with the bigmap interface style only the right levels address_read_access
	 * and object_tracking can be set/removed in combination with an entityuid.
	 *
	 * Note: This action can only be executed by users, that have the "Administrator" profile.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function setUserRight(array $params):WebfleetResponse;

	const setUserRight = [
		'required' => ['target_useruid', 'rightlevel'],
		'optional' => ['target_username', 'entityuid'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.12.8 resetUserRights
	 *
	 * Using resetUserRights you can reset the user access right levels to the profile
	 * defaults. All individual configured rights will be lost after executing this function.
	 *
	 * Note: This action can only be executed by users, that have the "Administrator" profile.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function resetUserRights(array $params):WebfleetResponse;

	const resetUserRights = [
		'required' => ['target_useruid'],
		'optional' => ['target_username'],
		'limits'   => [10, 60],
	];

	/**
	 * 4.12.9 removeUserRight
	 *
	 * This action removes a right level from an individual user. Right levels can only be
	 * removed from users with the standard or bigmap interface style
	 * (interfacestyle). For users with the bigmap interface style only the right levels
	 * address_read_access and object_tracking can be removed in combination with an entityuid.
	 *
	 * Note: This action can only be executed by users, that have the "Administrator" profile.
	 *
	 * @param array $params
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 */
	public function removeUserRight(array $params):WebfleetResponse;

	const removeUserRight = [
		'required' => ['target_useruid', 'rightlevel'],
		'optional' => ['target_username', 'entityuid'],
		'limits'   => [10, 60],
	];

}
