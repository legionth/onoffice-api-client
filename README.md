# OnOffice API Client

Simple client to communicate with the [onOffice API](https://apidoc.onoffice.de/)
This library focus on a simple code architecture and understandable code by using (PSRs)[https://www.php-fig.org/psr/]. 
 
This library is **not** an offical client.
The official client is supported in [onOffice SDK](https://github.com/onOfficeGmbH/sdk). 

## Quickstart

```php
$client = new \Legionth\OnOffice\Client\Client();
$parameters = [
    'data' => [
        'Id',
        'kaufpreis',
        'lage',
    ],
    'listlimit' => 10,
    'sortby' => [
        'kaufpreis' => 'ASC',
        'warmmiete' => 'ASC',
    ],
    'filter' => [
        'kaufpreis' => [
            ['op' => '>', 'val' => 300000],
        ],
        'status' => [
            ['op' => '=', 'val' => 1],
        ],
    ],
];

$request = new ApiRequest(
    'GET',
    new \Legionth\OnOffice\Client\ApiVersion(\Legionth\OnOffice\Client\ApiVersion::LATEST),
    'token-12356789abce',
    'secret-12356789abce',
    'urn:onoffice-de-ns:smart:2.5:smartml:action:get',
    'estate',
    '',
    '',
    $parameters
);

$response = $client->send($request);
```

## Official Documentation

Checkout the [official onOffice API documentation](https://apidoc.onoffice.de/)

## License

This project is licensed under the MIT License. See [LICENSE document](/LICENSE).