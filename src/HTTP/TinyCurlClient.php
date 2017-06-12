<?php
/**
 * Class TinyCurlClient
 *
 * @filesource   TinyCurlClient.php
 * @created      14.03.2017
 * @package      TomTom\Telematics\HTTP
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\HTTP;

use TomTom\Telematics\{WebfleetException, WebfleetResponse};
use chillerlan\TinyCurl\{Request, RequestOptions, URL, URLException};

/**
 *
 */
class TinyCurlClient extends HTTPClientAbstract{

	/**
	 * @var \chillerlan\TinyCurl\Request
	 */
	protected $request;

	/**
	 * TinyCurlClient constructor.
	 *
	 * @param \chillerlan\TinyCurl\RequestOptions $requestOptions
	 */
	public function __construct(RequestOptions $requestOptions){
		$this->request = new Request($requestOptions);
	}

	/**
	 * @param array  $params
	 * @param string $method
	 * @param mixed  $body
	 * @param array  $headers
	 *
	 * @return \TomTom\Telematics\WebfleetResponse
	 * @throws \TomTom\Telematics\WebfleetException
	 */
	public function request(array $params = [], string $method = 'GET', $body = null, array $headers = []):WebfleetResponse{

		try{
			$url = new URL(self::API_BASE, $params, $method, $body, $this->normalizeHeaders($headers));
		}
		catch(URLException $e){
			throw new WebfleetException('invalid URL: '.$e->getMessage());
		}

		$response = $this->request->fetch($url);

		return new WebfleetResponse([
			'headers' => $response->headers,
			'body'    => $response->body->content,
		]);
	}
}
