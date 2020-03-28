<?php

require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Legionth\OnOffice\Client\Client();
$request = new \Legionth\OnOffice\Client\Http\Io\ApiRequest(
    'GET',
    new \Legionth\OnOffice\Client\ApiVersion(\Legionth\OnOffice\Client\ApiVersion::LATEST),
    '',
    ''
);

$response = $client->send($request);