<?php

namespace Krencl\WedosApi\Command;

class DnsRowDetail extends Base
{
	/**
	 * @var string
	 */
	protected $command = 'dns-row-detail';

	/**
	 * @param string $domain
	 * @param int $rowId
	 * @param null|string $clTRID
	 */
	public function __construct(string $domain, int $rowId, ?string $clTRID = null)
	{
		parent::__construct($clTRID);

		$this->setFilteredData([
			'domain' => $domain,
			'row_id' => $rowId,
		]);
	}
}