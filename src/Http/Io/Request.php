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

    public function withActionId(string $actionId);
    public function getActionId() : string;

    public function withResourceId(string $resourceId);
    public function getResourceId() : string;

    public function withResourceType(string $resourceType);
    public function getResourceType() : string;

    public function withIdentifier(string $identifier);
    public function getIdentifier() : string;

    public function withParameters(array $parameters);
    public function getParameters();

    public function withTimestamp(int $timestamp);
    public function getTimestamp() : int;
}