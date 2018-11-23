<?php

namespace Krencl\WedosApi\Command;

class DomainCheck extends Base
{
	/**
	 * @var string
	 */
	protected $command = 'domain-check';

	/**
	 * @param string $domain
	 * @param null|string $clTRID
	 */
	public function __construct(string $domain, ?string $clTRID = null)
	{
		parent::__construct($clTRID);

		$this->setFilteredData([
			'name' => $domain,
		]);
	}
}