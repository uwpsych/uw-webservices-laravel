<?php

declare(strict_types=1);

namespace UwPsych\UwWebservices\Laravel\Tests;

use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;
use Illuminate\Contracts\Config\Repository;
use Mockery;
use UwPsych\UwWebservices\Laravel\UwWsFactory;
use UwPsych\UwWebservices\Laravel\UwWsManager;
use UwPsych\UwWebservices\Client;

/**
 * This is the Client manager test class.
 */
class UwWsManagerTest extends AbstractTestBenchTestCase
{
    public function testCreateConnection(): void
    {
        $config = ['path' => __DIR__];

        $manager = $this->getManager($config);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('uwws.default')->andReturn('uwws');

        $this->assertSame([], $manager->getConnections());

        $return = $manager->connection();

        $this->assertInstanceOf(Client::class, $return);

        $this->assertArrayHasKey('uwws', $manager->getConnections());
    }

    protected static function getManager(array $config): UwWsManager
    {
        $repository = Mockery::mock(Repository::class);
        $factory = Mockery::mock(UwWsFactory::class);

        $manager = new UwWsManager($repository, $factory);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('uwws.connections')->andReturn(['uwws' => $config]);

        $config['name'] = 'uwws';

        $manager->getFactory()->shouldReceive('make')->once()
            ->with($config)->andReturn(Mockery::mock(Client::class));

        return $manager;
    }
}
