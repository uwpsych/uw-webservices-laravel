<?php

declare(strict_types=1);

namespace UwPsych\UwWebservices\Laravel\Tests;

use GrahamCampbell\Analyzer\AnalysisTrait;
use Laravel\Lumen\Application;
use PHPUnit\Framework\TestCase;

class AnalysisTest extends TestCase
{
    use AnalysisTrait;

    /**
     * Get the code paths to analyze.
     *
     * @return string[]
     */
    protected static function getPaths(): array
    {
        return [
            realpath(__DIR__ . '/../config'),
            realpath(__DIR__ . '/../src'),
            realpath(__DIR__),
        ];
    }

    /**
     * Get the classes to ignore not existing.
     *
     * @return string[]
     */
    protected static function getIgnored(): array
    {
        return [Application::class];
    }
}
