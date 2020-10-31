<?php

namespace Legionth\OnOffice\Client\Http;

use Legionth\OnOffice\Client\Http\Io\Request;
use Psr\Http\Message\ResponseInterface;

interface Adapter
{
    public function send(Request $request) : ResponseInterface;
}