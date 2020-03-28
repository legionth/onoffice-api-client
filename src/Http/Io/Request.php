<?php

namespace Legionth\OnOffice\Client\Http\Io;

use Legionth\OnOffice\Client\ApiVersion;

interface Request extends \Psr\Http\Message\ServerRequestInterface
{
    public function withApiVersion(ApiVersion $apiVersion);
    public function getApiVersion() : ApiVersion;

    public function withApiToken(string $token);
    public function getApiToken() : string;

    public function withApiSecret(string $secret);
    public function getApiSecret() : string;
}