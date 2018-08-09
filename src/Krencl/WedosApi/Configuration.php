<?php

namespace Krencl\WedosApi;

use Krencl\WedosApi\Exception\ConfigurationFileBadFormatException;
use Krencl\WedosApi\Exception\ConfigurationFileNotFoundException;

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
	 * @param string $url
	 */
	public function setUrl(string $url): void
	{
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * @param string $filePath
	 * @return Configuration
	 * @throws ConfigurationFileBadFormatException
	 * @throws ConfigurationFileNotFoundException
	 */
	public static function createFromFile(string $filePath): self
	{
		if (!file_exists($filePath)) {
			throw new ConfigurationFileNotFoundException($filePath);
		}

		$content = file_get_contents($filePath);
		$config = json_decode($content, true);

		if ($config === null) {
			throw new ConfigurationFileBadFormatException('Invalid JSON format of config file.');
		}

		if (!isset($config['user'], $config['password'], $config['testingMode'])) {
			throw new ConfigurationFileBadFormatException('Missing one of parameter: user, password or testingMode');
		}

		$configuration = new self($config['user'], $config['password'], $config['testingMode']);
		if (isset($config['url']) && $config['url'] !== null) {
			$configuration->setUrl($config['url']);
		}

		return $configuration;
	}
}