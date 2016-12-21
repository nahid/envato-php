<?php

namespace Nahid\EnvatoPHP\Tests;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Nahid\EnvatoPHP\Envato;

/**
 * This is the service provider test class.
 */
class EnvatoServiceProviderTest extends TestCase
{
    use ServiceProviderTrait;

    public function testEnvatoIsInjectable()
    {
        $this->assertIsInjectable(Envato::class);
    }
}
