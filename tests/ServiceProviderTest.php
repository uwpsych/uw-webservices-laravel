<?php

declare(strict_types=1);

namespace UwPsych\UwWebservices\Laravel\Tests;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use UwPsych\UwWebservices\Laravel\UwWsFactory;
use UwPsych\UwWebservices\Laravel\UwWsManager;
use UwPsych\UwWebservices\Client;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testUwWsFactoryIsInjectable()
    {
        $this->assertIsInjectable(UwWsFactory::class);
    }

    public function testUwWsManagerIsInjectable()
    {
        $this->assertIsInjectable(UwWsManager::class);
    }

    public function testBindings()
    {
        $this->assertIsInjectable(Client::class);

        $original = $this->app['uwws.connection'];
        $this->app['uwws']->reconnect();
        $new = $this->app['uwws.connection'];

        $this->assertNotSame($original, $new);
        $this->assertEquals($original, $new);
    }
}
