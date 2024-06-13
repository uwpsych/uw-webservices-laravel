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
     * @return string
     */
    protected static function getServiceProviderClass(): string
    {
        return UwWsServiceProvider::class;
    }
}
