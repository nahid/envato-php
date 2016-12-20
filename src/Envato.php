<?php 

namespace Nahid\EnvatoPHP;

use Nahid\EnvatoPHP\Api\Authentication;
use Nahid\EnvatoPHP\Api\User;
use Nahid\EnvatoPHP\Api\Me;

class Envato
{
    protected $config;
    
    function __construct($config)
    {
        $this->config = $config;
        $auth = new Authentication($this->config);
        $auth->authenticate();
    }

    function __call($method, $args)
    {
        $arguments = array_merge([$method], $args);

        return call_user_func_array([$this, 'api'], $arguments);  
    }


    public function api()
    {
        $args = func_get_args();
        $api = '';
        if (count($args)>0) {
            $api = array_shift($args);
        }

        if (count($args)==0) {
            $args = null;
        }

        $api = strtolower($api);

        switch ($api) {
            case 'users':
            case 'user':
                return new User($args[0]);
            case 'me':
                return new Me($this->config);

        }
    }
}