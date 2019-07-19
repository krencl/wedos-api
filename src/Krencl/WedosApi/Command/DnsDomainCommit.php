<?php

namespace Krencl\WedosApi\Command;

class DnsDomainCommit extends Base
{
	/**
	 * @var string
	 */
	protected $command = 'dns-domain-commit';

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