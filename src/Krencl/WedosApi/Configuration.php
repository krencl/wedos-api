<?php

namespace Krencl\WedosApi;

class Configuration
{
	/**
	 * @var string API username
	 */
	private $user;

	/**
	 * @var string API password
	 */
	private $password;

	/**
	 * @var string API url endpoint
	 */
	private $url = 'https://api.wedos.com/wapi/json';

	/**
	 * Configuration constructor.
	 * @param string $user
	 * @param string $password
	 */
	public function __construct(string $user, string $password)
	{
		$this->user = $user;
		$this->password = $password;
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
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}
}