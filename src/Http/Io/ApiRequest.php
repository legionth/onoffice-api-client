<?php

namespace Legionth\OnOffice\Client\Http\Io;

use GuzzleHttp\Psr7\ServerRequest;
use Legionth\OnOffice\Client\ApiVersion;

class ApiRequest extends ServerRequest implements Request
{
    /**
     * @var ApiVersion
     */
    private $apiVersion;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $secret;
    /**
     * @var string
     */
    private $actionId;
    /**
     * @var string
     */
    private $resourceId;
    /**
     * @var string
     */
    private $resourceType;
    /**
     * @var string
     */
    private $identifier;
    /**
     * @var array
     */
    private $parameters;
    /**
     * @var int
     */
    private $timestamp;

    public function __construct(
        $method,
        ApiVersion $apiVersion,
        string $token,
        string $secret,
        string $actionId,
        string $resourceId,
        string $resourceType,
        string $identifier,
        array $parameters,
        $uri = 'https://api.onoffice.de/api/',
        array $headers = [],
        $body = null,
        $version = '1.1',
        array $serverParams = []
    ) {
        $this->apiVersion = $apiVersion;
        $this->token = $token;
        $this->secret = $secret;

        $this->actionId = $actionId;
        $this->resourceId = $resourceId;
        $this->resourceType = $resourceType;
        $this->identifier = $identifier;
        $this->parameters = $parameters;
        $this->timestamp = time();

        parent::__construct($method, $uri, $headers, $body, $version, $serverParams);
    }

    public function withApiVersion(ApiVersion $apiVersion)
    {
        $clone = clone $this;
        $clone->apiVersion = $apiVersion;

        return $clone;
    }

    public function getApiVersion(): ApiVersion
    {
        return $this->apiVersion;
    }

    public function withApiToken(string $token)
    {
        $clone = clone $this;
        $clone->token = $token;

        return $clone;
    }

    public function getApiToken(): string
    {
        return $this->token;
    }

    public function withApiSecret(string $secret)
    {
        $clone = clone $this;
        $clone->secret = $secret;

        return $clone;
    }

    public function getApiSecret(): string
    {
        return $this->secret;
    }

    public function withActionId(string $actionId)
    {
        $clone = clone $this;
        $clone->actionId = $actionId;

        return $clone;
    }

    public function getActionId(): string
    {
        return $this->actionId;
    }

    public function withResourceId(string $resourceId)
    {
        $clone = clone $this;
        $clone->resourceId = $resourceId;

        return $clone;
    }

    public function getResourceId(): string
    {
        return $this->resourceId;
    }

    public function withResourceType(string $resourceType)
    {
        $clone = clone $this;
        $clone->resourceType = $resourceType;

        return $clone;
    }

    public function getResourceType(): string
    {
        return $this->resourceType;
    }

    public function withIdentifier(string $identifier)
    {
        $clone = clone $this;
        $clone->identifier = $identifier;

        return $clone;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function withParameters(array $parameters)
    {
        $clone = clone $this;
        $clone->parameters = $parameters;

        return $clone;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function withTimestamp(int $timestamp)
    {
        $clone = clone $this;
        $clone->timestamp = $timestamp;

        return $clone;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
}