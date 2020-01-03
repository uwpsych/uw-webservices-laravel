<?php

declare(strict_types=1);

namespace UwPsych\UwWebservices\Laravel\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use UwPsych\UwWebservices\Laravel\UwWsServiceProvider;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return UwWsServiceProvider::class;
    }
}
