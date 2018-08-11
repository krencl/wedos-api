<?php

namespace Krencl\WedosApi\Command;

class DnsRowsList extends Base
{
	/**
	 * @var string
	 */
	protected $command = 'dns-rows-list';

	/**
	 * @param string $domain
	 * @param null|string $clTRID
	 */
	public function __construct(string $domain, ?string $clTRID = null)
	{
		parent::__construct($clTRID);

		$this->setFilteredData([
			'domain' => $domain,
		]);
	}
}