<?php

namespace Krencl\WedosApi;

class Request
{
	/**
	 * @var string
	 */
	protected $command;

	/**
	 * @var array
	 */
	protected $data;

	/**
	 * @var null|string
	 */
	protected $clTRID;

	/**
	 * Request constructor.
	 * @param string $command
	 * @param array $data
	 * @param null|string $clTRID
	 */
	public function __construct(string $command, array $data = [], ?string $clTRID = null)
	{
		$this->command = $command;
		$this->data = $data;
		$this->clTRID = $clTRID;
	}

	/**
	 * @return string
	 */
	public function getCommand(): string
	{
		return $this->command;
	}

	/**
	 * @param string $command
	 */
	public function setCommand(string $command): void
	{
		$this->command = $command;
	}

	/**
	 * @return array
	 */
	public function getData(): array
	{
		return $this->data;
	}

	/**
	 * @param array $data
	 */
	public function setData(array $data): void
	{
		$this->data = $data;
	}

	/**
	 * @return null|string
	 */
	public function getClTRID(): ?string
	{
		return $this->clTRID;
	}

	/**
	 * @param null|string $clTRID
	 */
	public function setClTRID(?string $clTRID): void
	{
		$this->clTRID = $clTRID;
	}
}