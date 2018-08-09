<?php

namespace Krencl\WedosApi\Exception;

use Krencl\WedosApi\Response;

abstract class ResponseException extends \Exception
{
	/**
	 * @var Response
	 */
	protected $response;

	/**
	 * @return Response
	 */
	public function getResponse(): Response
	{
		return $this->response;
	}

	/**
	 * @param Response $response
	 */
	public function setResponse(Response $response): void
	{
		$this->response = $response;
	}
}
