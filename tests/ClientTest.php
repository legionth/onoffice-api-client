<?php


use GuzzleHttp\Psr7\Response;
use Legionth\OnOffice\Client\Http\Adapter;
use Legionth\OnOffice\Client\Http\Io\ApiRequest;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function testSend()
    {
        $adapter = $this->getMockBuilder(Adapter::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->getMock();

        $adapter->method('send')
            ->willReturn(new Response());

        $client = new Legionth\OnOffice\Client\Client($adapter);

        $request = new ApiRequest(
            'GET',
            new \Legionth\OnOffice\Client\ApiVersion(\Legionth\OnOffice\Client\ApiVersion::LATEST),
            '',
            '',
            'urn:onoffice-de-ns:smart:2.5:smartml:action:get',
            'estate',
            '',
            '',
            []
        );

        $response = $client->send($request);

        $this->assertEquals(200, $response->getStatusCode());
    }
}