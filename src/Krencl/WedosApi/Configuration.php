<?php

namespace Krencl\WedosApi;

class Configuration
{
	/**
	 * @var string API username
	 */
	protected $user;

	/**
	 * @var string API password
	 */
	protected $password;
	/**
	 * @var bool
	 */
	protected $testingMode;

	/**
	 * @var string API url endpoint
	 */
	protected $url = 'https://api.wedos.com/wapi/json';

	/**
	 * Configuration constructor.
	 * @param string $user
	 * @param string $password
	 * @param bool $testingMode
	 */
	public function __construct(string $user, string $password, bool $testingMode = false)
	{
		$this->user = $user;
		$this->password = $password;
		$this->testingMode = $testingMode;
	}

	/**
	 * @return string
	 */
	public function getUser(): string
	{
		return $this->user;
	}

	/**
	 * @return string
	 */
	public function getAuth(): string
	{
		return sha1($this->user . sha1($this->password) . date('H'));
	}

	/**
	 * @return bool
	 */
	public function isTestingMode(): bool
	{
		return $this->testingMode;
	}

	/**
	 * @param bool $testingMode
	 */
	public function setTestingMode(bool $testingMode): void
	{
		$this->testingMode = $testingMode;
	}

	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}
}