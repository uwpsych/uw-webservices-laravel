<?php

declare(strict_types=1);

namespace UwPsych\UwWebservices\Laravel;

use InvalidArgumentException;
use UwPsych\UwWebservices\Client;
use Illuminate\Support\Arr;

class UwWsFactory
{
    /**
     * Make a new UW web services client.
     *
     * @param string[] $config
     *
     * @return \UwPsych\UwWebservices\Client;
     */
    public function make(array $config): Client
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @throws \InvalidArgumentException
     *
     * @return string[]
     */
    protected function getConfig(array $config): array
    {
        $keys = ['cert', 'ssl_key'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }

        return Arr::only($config, ['cert', 'ssl_key']);
    }

    /**
     * Get the UW web services client.
     *
     * @param string[] $auth
     *
     * @return \UwPsych\UwWebservices\Client;
     */
    protected function getClient(array $auth): Client
    {
        return new Client($auth['cert'], $auth['ssl_key']);
    }
}
