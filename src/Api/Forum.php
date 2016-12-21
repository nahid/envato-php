<?php 

namespace Nahid\EnvatoPHP\Api;

use Nahid\EnvatoPHP\HttpManager\RequestHandler;

class Forum extends AbstractApi
{

    function __construct($config) 
    {
        $this->config = $config;
        parent::__construct();
    }

   
    public function activeThreads($site = 'themeforest')
    {
        return $this->get('/v1/market/active-threads:' . $site . '.json');
    }

   
    public function latestPostOfUser($username)
    {
        return $this->get('/v1/market/forum_posts:' . $username . '.json');
    }
   
   
    public function statusOfThread($id)
    {
        return $this->get('/v1/market/thread-status:' . $id . '.json');
    }
   

}