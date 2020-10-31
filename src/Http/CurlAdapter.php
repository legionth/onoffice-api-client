<?php

namespace Legionth\OnOffice\Client\Http;

use Legionth\OnOffice\Client\Http\Io\Request;
use Psr\Http\Message\ResponseInterface;

class CurlAdapter implements Adapter
{
    /**
     * @var array
     */
    private $curlOptions;

    public function __construct(array $curlOptions = [])
    {
        $this->curlOptions = $curlOptions;
    }

    public function send(Request $request): ResponseInterface
    {
        $curlVersionInfo = curl_version();
        $curlVersionNumber = $curlVersionInfo['version_number'];

        $url = $request->getUri();
        $curlResource = curl_init($url);

        curl_setopt($curlResource, CURLOPT_POST, true);

        $version_compare = version_compare(PHP_VERSION, '5.5.0', '>=');
        if ($version_compare && $curlVersionNumber >= 0x072106)
        {
            // empty string = all supported compressions
            curl_setopt($curlResource, CURLOPT_ACCEPT_ENCODING, '');
        }
        elseif ($version_compare && $curlVersionNumber >= 0x071506) // 7.15.06
        {
            curl_setopt($curlResource, CURLOPT_ENCODING, '');
        }

        curl_setopt($curlResource, CURLOPT_POSTFIELDS, $request->getBody());
        curl_setopt($curlResource, CURLOPT_RETURNTRANSFER, true);

        foreach ($this->curlOptions as $option => $value) {
            curl_setopt($curlResource, $option, $value);
        }

        $result = curl_exec($curlResource);
        curl_close($curlResource);

        if (!$result)
        {
            $info = curl_error($curlResource);
            $pException = new \Exception($info);
            throw $pException;
        }

        return $result;
    }
}