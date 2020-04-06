<?php


namespace Legionth\OnOffice\Client\Authentication;

use Legionth\OnOffice\Client\Http\Io\Request;

class Encrypter
{
    public function createHmac(Request $request)
    {
        $fields['accesstoken'] = $request->getApiToken();
        $fields['actionid'] = $request->getActionId();
        $fields['identifier'] = $request->getIdentifier();
        $fields['resourceid'] = $request->getResourceId();
        $fields['secret'] = $request->getApiSecret();
        $fields['timestamp'] = $request->getTimestamp();
        $fields['type'] = $request->getResourceType();

        ksort($fields);

        $parametersBundled = json_encode($fields);
        $fieldsBundled = implode(',', $fields);
        $allParams = $parametersBundled . ',' . $fieldsBundled;
        $hmac = md5($request->getApiSecret() . md5($allParams));

        return $hmac;
    }
}