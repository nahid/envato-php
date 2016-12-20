<?php 

namespace Nahid\EnvatoPHP\Api;

use Nahid\EnvatoPHP\HttpManager\RequestHandler;

class User extends AbstractApi
{
    protected $username = null;

    function __construct($username = null) 
    {
        parent::__construct();
        $this->username = $username;
    }

    public function accounts()
    {
        if (!is_null($this->username)) {
            return $this->get('/v1/market/user:'. $this->username . '.json');
        }
        
        
    } 
}