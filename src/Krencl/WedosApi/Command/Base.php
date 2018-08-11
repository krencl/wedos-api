<?php

namespace Krencl\WedosApi\Command;

use Krencl\WedosApi\Request;

abstract class Base extends Request
{
	/**
	 * @param null|string $clTRID
	 */
	public function __construct(?string $clTRID = null)
	{
		parent::__construct($this->command, [], $clTRID);
	}

	/**
	 * @param array $data
	 */
	public function setFilteredData(array $data) {
		$this->setData(array_filter($data));
	}
}