<?php

use Krencl\WedosApi;
use PHPUnit\Framework\TestCase;

final class ConfigurationTest extends TestCase
{
	public function testNonExistingFile(): void
	{
		$this->expectException(WedosApi\Exception\ConfigurationFileNotFoundException::class);
		WedosApi\Configuration::createFromFile(__DIR__ . '/configNonExisting.json');
	}

	public function testBadFormat(): void
	{
		$this->expectException(WedosApi\Exception\ConfigurationFileBadFormatException::class);
		WedosApi\Configuration::createFromFile(__DIR__ . '/configBadFormat.json');
	}

	public function testCorrectFormat(): void
	{
		$configuration = WedosApi\Configuration::createFromFile(__DIR__ . '/configCorrectFormat.json');

		$this->assertEquals($configuration->getUser(), 'field-user');
		$this->assertEquals(strlen($configuration->getAuth()), 40);
	}
}