<?php
namespace Nahid\EnvatoPHP\Facades;
use Illuminate\Support\Facades\Facade;

class Envato extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'envato';
    }
}
