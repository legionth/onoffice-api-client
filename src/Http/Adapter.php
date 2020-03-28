<?php

namespace Legionth\OnOffice\Client\Http;

use Legionth\OnOffice\Client\Http\Io\Request;
use Legionth\OnOffice\Client\Http\Io\Response;

interface Adapter
{
    public function send(Request $request) : Response;
}