<?php

namespace Krencl\WedosApi;

use Krencl\WedosApi\Constants\HTTPCode;

class Response
{
	/**
	 * @var string
	 */
	protected $curlResult;

	/**
	 * @var array
	 */
	protected $curlInfo;

	/**
	 * @var array
	 */
	protected $result;

	/**
	 * @var int
	 */
	protected $httpCode;

	/**
	 * @var int
	 */
	private $statusCode;

	/**
	 * @param string $curlResult
	 * @param array $curlInfo
	 */
	public function __construct(string $curlResult, array $curlInfo)
	{
		$this->curlResult = $curlResult;
		$this->curlInfo = $curlInfo;

		$this->parseResult();
	}

	protected function parseResult(): void
	{
		$this->httpCode = $this->curlInfo['http_code'];
		$this->result = json_decode($this->getCurlResult(), true)['response'];
		$this->statusCode = $this->result['code'];
	}

	/**
	 * @return string
	 */
	public function getCurlResult(): string
	{
		return $this->curlResult;
	}

	/**
	 * @return array
	 */
	public function getCurlInfo(): array
	{
		return $this->curlInfo;
	}

	/**
	 * @return int
	 */
	public function getHttpCode(): int
	{
		return $this->httpCode;
	}

	/**
	 * @return bool
	 */
	public function isHttpCodeOk(): bool
	{
		return $this->httpCode === HTTPCode::HTTP_OK;
	}

	/**
	 * @return int
	 */
	public function getStatusCode(): int
	{
		return $this->statusCode;
	}

	/**
	 * @return bool
	 */
	public function isStatusCodeOk(): bool
	{
		return $this->statusCode < 2000;
	}

	/**
	 * @return array
	 */
	public function getResult(): array
	{
		return $this->result;
	}

	/**
	 * @return array
	 */
	public function getData(): array
	{
		return $this->result['data'];
	}

	/**
	 * @return string
	 */
	public function getClTRID(): string
	{
		return $this->result['clTRID'];
	}

	/**
	 * @return string
	 */
	public function getSvTRID(): string
	{
		return $this->result['svTRID'];
	}
}