<?php

namespace Krencl\WedosApi\Exception;

class ConfigurationFileNotFoundException extends \Exception
{
	public function __construct(string $filename, int $code = 0, \Throwable $previous = null)
	{
		$message = sprintf('Configuration file not found: %s', $filename);
		parent::__construct($message, $code, $previous);
	}
}