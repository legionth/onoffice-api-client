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

    public function __construct(
        $method,
        ApiVersion $apiVersion,
        string $token,
        string $secret,
        $uri = 'https://api.onoffice.de/api/',
        array $headers = [],
        $body = null,
        $version = '1.1',
        array $serverParams = []
    ) {
        $this->apiVersion = $apiVersion;
        $this->token = $token;
        $this->secret = $secret;

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
}