<?php

use Krencl\WedosApi;
use PHPUnit\Framework\TestCase;

final class DomainTldPeriodCheckTest extends TestCase
{

	public function testValidPeriod(): void
	{
		$configuration = WedosApi\Configuration::createFromFile(__DIR__ . '/../config.json');
		$client = new WedosApi\Client($configuration);

		$command = new Krencl\WedosApi\Command\DomainTldPeriodCheck('cz', 5);
		$response = $client->sendRequest($command);

		$this->assertInstanceOf(WedosApi\Response::class, $response);
		$this->assertEquals($response->getStatusCode(), 1000);
	}

	public function testInvalidPeriod(): void
	{
		$configuration = WedosApi\Configuration::createFromFile(__DIR__ . '/../config.json');
		$client = new WedosApi\Client($configuration);

		$this->expectException(WedosApi\Exception\ResponseStatusCodeException::class);

		$command = new Krencl\WedosApi\Command\DomainTldPeriodCheck('cz', 100);
		$client->sendRequest($command);
	}

}
