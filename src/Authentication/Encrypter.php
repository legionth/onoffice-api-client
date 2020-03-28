<?php


use Legionth\OnOffice\Client\Http\Io\Request;

class Encrypter
{
    public function createHmac(Request $request)
    {
        $body = $request->getBody();
        $decodedBody = json_decode($body);
        // in alphabetical order
        $fields['accesstoken'] = $request->getApiToken();
        $fields['actionid'] = $decodedBody['actionId'];
        $fields['identifier'] = $decodedBody['identifier'];
        $fields['resourceid'] = $decodedBody['resourceId'];
        $fields['secret'] = $request->getApiSecret();
        $fields['timestamp'] = $decodedBody['timestamp'];
        $fields['type'] = $decodedBody['type'];

        ksort($parameters);

        $parametersBundled = json_encode($parameters);
        $fieldsBundled = implode(',', $fields);
        $allParams = $parametersBundled . ',' . $fieldsBundled;
        $hmac = md5($request->getApiSecret() . md5($allParams));

        return $hmac;    }
}