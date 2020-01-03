<?php

declare(strict_types=1);

namespace UwPsych\UwWebservices\Laravel\Tests;

use UwPsych\UwWebservices\Laravel\UwWsFactory;
use UwPsych\UwWebservices\Client;

class UwWsFactoryTest extends AbstractTestCase
{
    public function testMakeStandard()
    {
        $factory = $this->getUwWsFactory();

        $return = $factory->make([
            'cert' => '/path/to/cert',
            'ssl_key' => '/path/to/key'
        ]);

        $this->assertInstanceOf(Client::class, $return);
    }

    public function testMakeWithoutKey()
    {
        $this->expectException(\InvalidArgumentException::class);

        $factory = $this->getUwWsFactory();

        $factory->make([
            'cert' => '/path/to/cert'
        ]);
    }

    public function testMakeWithoutCert()
    {
        $this->expectException(\InvalidArgumentException::class);

        $factory = $this->getUwWsFactory();

        $factory->make([
            'ssl_key' => '/path/to/key'
        ]);
    }

    protected function getUwWsFactory()
    {
        return new UwWsFactory();
    }
}
