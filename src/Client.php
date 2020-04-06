<?php

namespace Legionth\OnOffice\Client;

use Legionth\OnOffice\Client\Authentication\Encrypter;
use Legionth\OnOffice\Client\Http\Adapter;
use Legionth\OnOffice\Client\Http\CurlAdapter;
use Legionth\OnOffice\Client\Http\Io\Request;
use Legionth\OnOffice\Client\Http\Io\Response;
use function GuzzleHttp\Psr7\copy_to_stream;
use function GuzzleHttp\Psr7\stream_for;

class Client
{
    /**
     * @var Adapter
     */
    private $adapter;
    /**
     * @var Encrypter
     */
    private $encrypter;

    public function __construct(Adapter $adapter = null, Encrypter $encrypter = null)
    {
        if (null === $adapter) {
            $adapter = new CurlAdapter();
        }
        $this->adapter = $adapter;

        if (null === $encrypter) {
            $encrypter = new Encrypter();
        }
        $this->encrypter = $encrypter;
    }

    public function send(Request $request) : Response
    {
        $hmac = $this->encrypter->createHmac($request);

        $bodyArray = [
            'token' => $request->getApiToken(),
            'request' => [
                'actions' => [
                    "actionid" => $request->getActionId(),
                    "resourceid" => $request->getResourceId(),
                    "resourcetype" => $request->getResourceType(),
                    "identifier" => $request->getIdentifier(),
                    "timestamp" => $request->getTimestamp(),
                    "hmac"     => $hmac,
                    "parameters" => $request->getParameters()
                ]
            ]
        ];

        $stream = stream_for(http_build_query($bodyArray));
        $request->withBody($stream);

        return $this->adapter->send($request);
    }
}