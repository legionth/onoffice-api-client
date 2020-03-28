<?php

namespace Legionth\OnOffice\Client;

use Legionth\OnOffice\Client\Http\Adapter;
use Legionth\OnOffice\Client\Http\CurlAdapter;
use Legionth\OnOffice\Client\Http\Io\Request;
use Legionth\OnOffice\Client\Http\Io\Response;

class Client
{
    /**
     * @var Adapter
     */
    private $adapter;

    public function __construct(Adapter $adapter = null)
    {
        if (null === $adapter) {
            $adapter = new CurlAdapter();
        }
        $this->adapter = $adapter;
    }

    public function send(Request $request) : Response
    {
        return $this->adapter->send($request);
    }
}