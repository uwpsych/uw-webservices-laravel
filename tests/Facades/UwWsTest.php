<?php

declare(strict_types=1);

namespace UwPsych\UwWebservices\Laravel\Tests\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use UwPsych\UwWebservices\Laravel\Facades\UwWs;
use UwPsych\UwWebservices\Laravel\UwWsManager;
use UwPsych\UwWebservices\Laravel\Tests\AbstractTestCase;

/**
 * This is the UwWs facade test class.
 */
class UwWsTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'uwws';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected static function getFacadeClass(): string
    {
        return UwWs::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected static function getFacadeRoot(): string
    {
        return UwWsManager::class;
    }
}
