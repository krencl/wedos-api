# Wedos API (WAPI) client for PHP

PHP API client for communication with Wedos API.

# Installation

`composer require krencl/wedos-api`

# Usage

## Configuration

From JSON file, in root path is sample file `config.json.dist`:
```php
<?php

use Krencl\WedosApi\Configuration;

$configuration = Configuration::createFromFile(__DIR__ . '/config.json');
```

Or hardcoded:

```php
<?php

use Krencl\WedosApi\Configuration;

$configuration = new Configuration('user', 'password');

// optional
$configuration->setTestingMode(true);
$configuration->setUrl('https://...');
```

## Request

Using built-in command:

```php
<?php

use Krencl\WedosApi\Command;
use Krencl\WedosApi\Constants;

/** @var \Krencl\WedosApi\Request $command */
$command = new Command\DomainsList(Constants\DomainStatus::ACTIVE);
```

Or create custom request:

```php
<?php

use Krencl\WedosApi\Request;
use Krencl\WedosApi\Constants;

$request = new Request('domains-list', [
	'status' => Constants\DomainStatus::ACTIVE,
]);
```

## Example

```php
<?php

use Krencl\WedosApi\Client;
use Krencl\WedosApi\Configuration;
use Krencl\WedosApi\Command;
use Krencl\WedosApi\Constants;
use Krencl\WedosApi\Exception\ResponseException;

$configuration = Configuration::createFromFile(__DIR__ . '/../config.json.dist');
$client = new Client($configuration);

$clTRID = 'myCustomId-1';
$command = new Command\DomainsList(Constants\DomainStatus::ACTIVE, $clTRID);

try {
	$response = $client->sendRequest($command);
} catch (ResponseException $e) {
	echo (string) $e;
	var_dump($e->getResponse()->getCurlResult());
}
```

# Wedos API documentation

https://kb.wedos.com/cs/wapi.html