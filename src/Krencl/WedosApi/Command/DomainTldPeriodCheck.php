<?php

namespace Krencl\WedosApi\Command;

class DomainTldPeriodCheck extends Base
{
	/**
	 * @var string
	 */
	protected $command = 'domain-tld-period-check';

	/**
	 * @param string $tld
	 * @param int $period
	 * @param null|string $clTRID
	 */
	public function __construct(string $tld, int $period, ?string $clTRID = null)
	{
		parent::__construct($clTRID);

		$this->setFilteredData([
			'tld' => $tld,
			'period' => $period,
		]);
	}
}
