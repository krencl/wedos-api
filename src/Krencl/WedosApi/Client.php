<?php

namespace Krencl\WedosApi;

use Krencl\WedosApi\Exception\ResultHTTPCodeException;
use Krencl\WedosApi\Exception\ResultStatusCodeException;
use Krencl\WedosApi\Constants\HTTPCode;

class Client
{
	/**
	 * @var Configuration
	 */
	protected $configuration;

	/**
	 * @param Configuration $configuration
	 */
	public function __construct(Configuration $configuration)
	{
		$this->configuration = $configuration;
	}

	/**
	 * @param Request $request
	 * @return Response
	 * @throws ResultHTTPCodeException
	 * @throws ResultStatusCodeException
	 */
	public function sendRequest(Request $request): Response
	{
		$body = $this->createBody($request);

		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => $this->configuration->getUrl(),
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => [
				'request' => json_encode($body),
			],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 100,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
		]);

		$result = curl_exec($curl);
		$info = curl_getinfo($curl);

		curl_close($curl);

		$response = new Response($result, $info);
		$this->checkResponse($response);

		return $response;
	}

	/**
	 * @param Request $request
	 * @return array
	 */
	protected function createBody(Request $request)
	{
		$body = [
			'request' => [
				'user' => $this->configuration->getUser(),
				'auth' => $this->configuration->getAuth(),
				'command' => $request->getCommand(),
				'clTRID' => $request->getClTRID(),
				'data' => $request->getData(),
			]
		];

		if ($this->configuration->isTestingMode()) {
			$body['request']['test'] = 1;
		}

		return $body;
	}

	/**
	 * @param Response $response
	 * @throws ResultHTTPCodeException
	 * @throws ResultStatusCodeException
	 */
	protected function checkResponse(Response $response): void
	{
		if (!$response->isHttpCodeOk()) {
			throw new ResultHTTPCodeException($response->getHttpCode());
		}

		if (!$response->isStatusCodeOk()) {
			throw new ResultStatusCodeException($response->getStatusCode());
		}
	}
}