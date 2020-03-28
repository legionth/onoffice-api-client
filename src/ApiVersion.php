<?php


namespace Legionth\OnOffice\Client;


class ApiVersion
{
    const LATEST = 'latest';

    const STABLE = 'stable';

    /**
     * @var string
     */
    private $version;

    public function __construct(string $version = self::LATEST)
    {
        if (self::LATEST !== $version && self::STABLE !== $version) {
            $message = sprintf('"%s" is not supported as version', $version);
            throw new \Exception($message);
        }
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }
}