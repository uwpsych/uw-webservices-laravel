<?php

declare(strict_types=1);

namespace UwPsych\UwWebservices\Laravel;

use Illuminate\Support\Facades\Facade;

/**
 * This is the UW web services facade class.
 *
 * @author Shawn Heide <psych@uw.edu>
 */
class UwWs extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'uwws';
    }
}
