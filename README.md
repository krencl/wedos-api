# Wedos API (WAPI) client

API client for communication with Wedos API.

# Installation

`composer require krencl/wedos-api:dev-master`

# Usage

## Configuration

From file, in root path is sample file `config.json.dist`:
```php
<?php

use Krencl\WedosApi;

$configuration = WedosApi\Configuration::createFromFile(__DIR__ . '/config.json');
```

Or hardcoded:

```php
<?php

use Krencl\WedosApi;

$configuration = new WedosApi\Configuration('user', 'password');

// optional
$configuration->setTestingMode(true);
$configuration->setUrl('https://...');
```

## Sending request

```php
<?php

use Krencl\WedosApi;

$configuration = WedosApi\Configuration::createFromFile(__DIR__ . '/../config.json');
$client = new WedosApi\Client($configuration);

$request = new WedosApi\Request('domains-list', [
	'status' => WedosApi\Constants\DomainStatus::ACTIVE,
]);

try {
	$response = $client->sendRequest($request);
} catch (WedosApi\Exception\ResponseException $e) {
	echo (string) $e;
	var_dump($e->getResponse()->getCurlResult());
}
```

# Wedos API documentation

https://kb.wedos.com/cs/wapi.html