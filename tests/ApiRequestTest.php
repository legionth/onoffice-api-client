<?php


use Legionth\OnOffice\Client\ApiVersion;
use Legionth\OnOffice\Client\Http\Io\ApiRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class ApiRequestTest extends TestCase
{
    public function testCreation()
    {
        $request = new ApiRequest(
            'GET',
            new ApiVersion(ApiVersion::LATEST),
            '555shoe',
            '555nase',
            'urn:onoffice-de-ns:smart:2.5:smartml:action:get',
            '700',
            'estate',
            'testId',
            [1,2,3]
        );

        $this->assertInstanceOf(RequestInterface::class, $request);
        $this->assertEquals('GET', $request->getMethod());
        $this->assertInstanceOf(ApiVersion::class, $request->getApiVersion());
        $this->assertEquals('555shoe', $request->getApiToken());
        $this->assertEquals('555nase', $request->getApiSecret());
        $this->assertEquals('urn:onoffice-de-ns:smart:2.5:smartml:action:get', $request->getActionId());
        $this->assertEquals('700', $request->getResourceId());
        $this->assertEquals('estate', $request->getResourceType());
        $this->assertEquals('testId', $request->getIdentifier());
        $this->assertEquals([1,2,3], $request->getParameters());
    }
}