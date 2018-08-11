<?php

namespace Krencl\WedosApi\Command;

class DnsRowAdd extends Base
{
	/**
	 * @var string
	 */
	protected $command = 'dns-row-add';

	/**
	 * @param string $domain
	 * @param string $name
	 * @param string $type
	 * @param string $content
	 * @param int $ttl
	 * @param null|string $comment
	 * @param null|string $clTRID
	 */
	public function __construct(string $domain, string $name, string $type, string $content, int $ttl = 3600, ?string $comment = null, ?string $clTRID = null)
	{
		parent::__construct($clTRID);

		$this->setFilteredData([
			'domain' => $domain,
			'name' => $name,
			'type' => $type,
			'rdata' => $content,
			'ttl' => $ttl,
			'comment' => $comment,
		]);
	}
}