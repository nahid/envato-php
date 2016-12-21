<?php 

namespace Nahid\EnvatoPHP;

use Nahid\EnvatoPHP\Api\Authentication;
use Nahid\EnvatoPHP\Api\Market;
use Nahid\EnvatoPHP\Api\User;
use Nahid\EnvatoPHP\Api\Me;
use Nahid\EnvatoPHP\Api\Forum;

class Envato
{
    protected $config;
    protected $auth;
    
    function __construct($config)
    {
        $this->config = $config;
        $this->auth = new Authentication($this->config);
        $this->auth->authenticate();
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
                return new User($args[0], $this->config);
            case 'me':
                return new Me($this->config);
            case 'market':
            case 'markets':
                return new Market($this->config);
            case 'forum':
            case 'forums':
                return new Forum($this->config);

        }
    }

    public function getAuthUrl()
    {
        return $this->auth->getAuthUrl();
    }

    public function clearCache()
    {
        $this->auth->clearCache();
    }
}
