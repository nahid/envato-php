<?php

namespace Nahid\EnvatoPHP\Tests\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use Nahid\EnvatoPHP\Tests\TestCase;

/**
 * This is the Talk facade test class.
 */
class Envato extends TestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'envato';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return \Nahid\EnvatoPHP\Facades\Envato::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return \Nahid\EnvatoPHP\Envato::class;
    }
}
