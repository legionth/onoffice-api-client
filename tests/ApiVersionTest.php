<?php


use Legionth\OnOffice\Client\ApiVersion;
use PHPUnit\Framework\TestCase;

class ApiVersionTest extends TestCase
{
    public function testValidApiVersionLatest()
    {
        $apiVersion = new ApiVersion('latest');
        $result = $apiVersion->getVersion();

        $this->assertEquals('latest', $result);
    }

    public function testValidApiVersionStable()
    {
        $apiVersion = new ApiVersion('stable');
        $result = $apiVersion->getVersion();

        $this->assertEquals('stable', $result);
    }

    public function testInvalidApiVersion()
    {
        $this->expectExceptionMessage('"invalid" is not supported as version');
        $apiVersion = new ApiVersion('invalid');
    }
}