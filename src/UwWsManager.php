<?php

declare(strict_types=1);

namespace UwPsych\UwWebservices\Laravel;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use UwPsych\UwWebservices\Client;

class UwWsManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \UwPsych\UwWebservices\Laravel\UwWsFactory
     */
    private $factory;

    /**
     * Create a new UW web services manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \UwPsych\UwWebservices\Laravel\UwWsFactory $factory
     *
     * @return void
     */
    public function __construct(Repository $config, UwWsFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return \UwPsych\UwWebservices\Client
     */
    protected function createConnection(array $config): UwWs
    {
        /** @var string[] $config */
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName(): string
    {
        return 'uwws';
    }

    /**
     * Get the factory instance.
     *
     * @return \UwPsych\UwWebservices\Laravel\UwWsFactory
     */
    public function getFactory(): UwWsFactory
    {
        return $this->factory;
    }
}
