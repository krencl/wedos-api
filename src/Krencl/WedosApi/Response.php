<?php

namespace Krencl\WedosApi;

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

	public function __construct(string $curlResult, array $curlInfo)
	{
		$this->curlResult = $curlResult;
		$this->curlInfo = $curlInfo;
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
}