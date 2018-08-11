<?php

use Krencl\WedosApi;
use PHPUnit\Framework\TestCase;

final class DomainsListTest extends TestCase
{
	public function testDomainListRequest(): void
	{
		$configuration = WedosApi\Configuration::createFromFile(__DIR__ . '/../config.json');
		$client = new WedosApi\Client($configuration);

//		$command = new Krencl\WedosApi\Command\DnsRowAdd('krencl.cz','www', WedosApi\Constants\DNSType::TXT, 'test');
//		$command = new Krencl\WedosApi\Command\DnsRowUpdate('krencl.cz', 48262, 'test update',3600);
//		$command = new Krencl\WedosApi\Command\DnsRowsList('krencl.cz');
		$command = new Krencl\WedosApi\Command\DnsRowDelete('krencl.cz', 48262);
		$response = $client->sendRequest($command);

		$this->assertInstanceOf(WedosApi\Response::class, $response);
		$this->assertEquals($response->getStatusCode(), 1000);

		var_dump($response->getData());
	}
}