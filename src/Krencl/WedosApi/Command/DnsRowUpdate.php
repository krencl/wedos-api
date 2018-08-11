<?php

namespace Krencl\WedosApi\Command;

class DnsRowUpdate extends Base
{
	/**
	 * @var string
	 */
	protected $command = 'dns-row-update';

	/**
	 * @param string $domain
	 * @param int $rowId
	 * @param string $content
	 * @param int $ttl
	 * @param null|string $clTRID
	 */
	public function __construct(string $domain, int $rowId, string $content, int $ttl, ?string $clTRID = null)
	{
		parent::__construct($clTRID);

		$this->setFilteredData([
			'domain' => $domain,
			'row_id' => $rowId,
			'rdata' => $content,
			'ttl' => $ttl,
		]);
	}
}