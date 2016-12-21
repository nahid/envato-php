<?php 

namespace Nahid\EnvatoPHP\Api;

class User extends AbstractApi
{
    protected $username = null;

    function __construct($username = null, $config) 
    {
        $this->config = $config;
        parent::__construct();
        $this->username = $username;
    }

    public function accounts()
    {

        if (!is_null($this->username)) {
            return $this->get('/v1/market/user:'. $this->username . '.json');
        }
        
        return false;   
    }

    public function badges()
    {
        if (!is_null($this->username)) {
            return $this->get('/v1/market/user-badges:'. $this->username . '.json');
        }
        
        return false;   
    }

    public function itemsBySite()
    {
        if (!is_null($this->username)) {
            return $this->get('/v1/market/user-items-by-site:'. $this->username . '.json');
        }
        
        return false;   
    }

    public function newItems($site = 'themeforest')
    {
        if (!is_null($this->username)) {
            return $this->get('/v1/market/new-files-from-user:' . $this->username . ',' . $site . '.json');
        }
        
        return false;   
    }

}
