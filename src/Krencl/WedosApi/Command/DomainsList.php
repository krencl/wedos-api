<?php

namespace Krencl\WedosApi\Command;

class DomainsList extends Base
{
	/**
	 * @var string
	 */
	protected $command = 'domains-list';

	public function __construct(string $domainStatus = null, ?string $clTRID = null)
	{
		parent::__construct($clTRID);

		if ($domainStatus !== null) {
			$this->setData([
				'status' => $domainStatus,
			]);
		}
	}
}