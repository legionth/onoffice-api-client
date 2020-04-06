<?php


require_once __DIR__ . '/../vendor/autoload.php';

use Legionth\OnOffice\Client\Http\Io\ApiRequest;

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
    '',
    '',
    'urn:onoffice-de-ns:smart:2.5:smartml:action:get',
    'estate',
    '',
    '',
    $parameters
);

$response = $client->send($request);

var_dump($response);