<?php

declare(strict_types=1);

namespace UwPsych\UwWebservices\Laravel;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use UwPsych\UwWebservices\Client;

class UwWsServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/../config/uwws.php');

        if (!$source) {
            throw new \UnexpectedValueException('Could not locate config');
        }

        $this->publishes([$source => config_path('uwws.php')]);

        $this->mergeConfigFrom($source, 'uwws');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
    }

    /**
     * Register the factory class.
     *
     * @return void
     */
    protected function registerFactory()
    {
        $this->app->singleton('uwws.factory', function (): UwWsFactory {
            return new UwWsFactory();
        });

        $this->app->alias('uwws.factory', UwWsFactory::class);
    }

    /**
     * Register the manager class.
     *
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton('uwws', function (Container $app): UwWsManager {
            /** @var \Illuminate\Contracts\Config\Repository */
            $config = $app['config'];
            /** @var UwWsFactory */
            $factory = $app['uwws.factory'];

            return new UwWsManager($config, $factory);
        });

        $this->app->alias('uwws', UwWsManager::class);
    }

    /**
     * Register the bindings.
     *
     * @return void
     */
    protected function registerBindings()
    {
        $this->app->bind('uwws.connection', function (Container $app): Client {
            /** @var UwWsManager */
            $manager = $app['uwws'];

            /** @var Client */
            return $manager->connection();
        });

        $this->app->alias('uwws.connection', Client::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides(): array
    {
        return ['uwws', 'uwws.factory', 'uwws.connection'];
    }
}
