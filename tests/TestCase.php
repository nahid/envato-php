<?php

namespace Nahid\EnvatoPHP\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Nahid\EnvatoPHP\EnvatoServiceProvider;

/**
 * This is the abstract test case class.
 */
abstract class TestCase extends AbstractPackageTestCase
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
        return EnvatoServiceProvider::class;
    }
}
