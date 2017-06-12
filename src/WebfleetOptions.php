<?php
/**
 * Class WebfleetOptions
 *
 * @filesource   WebfleetOptions.php
 * @created      14.03.2017
 * @package      TomTom\Telematics
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics;

/**
 * @property string $cacert
 * @property string $user_agent
 * @property string $account
 * @property string $username
 * @property string $password
 * @property string $apikey
 * @property string $sessiontoken
 * @property string $lang
 * @property bool   $useISO8601
 * @property bool   $useUTF8
 * @property string $outputformat
 */
class WebfleetOptions extends Container{

	/**
	 * A valid account name
	 *
	 * @var string
	 */
	protected $account;

	/**
	 * User name within the account that is allowed to access the service
	 *
	 * @var string
	 */
	protected $username;

	/**
	 * Password for the user name
	 *
	 * @var string
	 */
	protected $password;

	/**
	 * This value is optional
	 *
	 * @var string
	 */
	protected $apikey;

	/**
	 * A session identifier, that has been fetched from the server using createSession.
	 * sessiontoken can be used as an alternative to account, username or password
	 * to authorise further requests for a limited time (see session lifetime).
	 *
	 * @var string (32)
	 */
	protected $sessiontoken;

	/**
	 * Language to be used for output formatting. Expressed as a two-letter language code.
	 * The list of available languages is subject to change.
	 *
	 * @var string [de, en, nl]
	 */
	protected $lang = 'en';

	/**
	 * If set to true, all date/time-relevant parameters are expected to be IS8601-formatted
	 * and all date/time result fields will be IS8601-formatted.
	 *
	 * The preferred ISO 8601 compliant notation for strings that represent dates which are to be passed
	 * to WEBFLEET.connect is the compact full notation with dashes and colons, optional milliseconds and time zone.
	 *
	 * If set to true the result will return date time values in UTC.
	 * If set to false the result returns the time zone configured in the specific WEBFLEET account.
	 *
	 * @var bool
	 */
	protected $useISO8601 = true;

	/**
	 * Controls how WF.connect interprets the character encoding of URL request parameters.
	 * If set to true all parameters are expected to be UTF-8 encoded.
	 * If set to false all parameters are interpreted as ISO-8859-1.
	 *
	 * Default is false.
	 *
	 * @var bool
	 */
	protected $useUTF8 = true;

	/**
	 * Defines the response format to be used by WEBFLEET.connect. Possible values are:
	 *
	 * csv (default)
	 * json
	 *
	 * @var string
	 */
	protected $outputformat = 'json';

	/**
	 * A delimiter character identifier that indicates the
	 * delimiter to be used for the output columns:
	 *
	 *   1 - a tab character
	 *   2 - a space character
	 *   3 - a comma character
	 *
	 * If no value is specified, a semicolon used to as
	 * the delimiter for the output columns.
	 *
	 * This parameter is optional.
	 *
	 * @var string
	 */
	protected $separator;

}
