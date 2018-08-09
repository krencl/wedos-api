<?php

namespace Krencl\WedosApi\Exception;

use Krencl\WedosApi\Constants\Status;

class ResultStatusCodeException extends \Exception
{
	public function __construct(int $statusCode, int $code = 0, \Throwable $previous = null)
	{
		$message = sprintf('API server responded with error: %d (%s)', $statusCode, Status::$codes[$statusCode]);
		parent::__construct($message, $code, $previous);
	}
}